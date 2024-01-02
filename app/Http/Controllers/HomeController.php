<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Design;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only('custom_logout', 'profile', 'save_profile', 'edit_password', 'update_password', 'custom_design', 'save_design');
    }

    public function index()
    {
        $products = Product::filter()->paginate(15);
        return view('index', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function shop()
    {
        $categories = Category::select('id', 'name')->where('active', true)->get();
        $products = Product::where('quantity', '!=', 0)->filter()->get();

        $data = compact('categories', 'products');
        return view('shop', $data);
    }

    public function custom_logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        return view('profile');
    }

    public function save_profile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
        ]);

        $user = User::find(auth()->user()->id);

        $user->update(
            $request->all()
        );

        return redirect()->back()->with('success', 'Profile updated successfully...');
    }

    public function edit_password()
    {
        return view('edit_password');
    }

    public function update_password(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with("danger", "Old Password Doesn't match!");
        }

        if ($request->new_password == $request->confirm_password) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Your password has been changed");
        } else {
            return redirect()->back()->with('danger', "Passwords do not match!");
        }
    }

    public function custom_design()
    {
        $products = Product::select('id', 'name', 'image_front', 'image_back')->get();
        $designs = auth()->user()->designs;

        $data = compact('products', 'designs');
        return view('custom-design', $data);
    }

    public function save_design(Request $request)
    {
        $designData = $request->input('design');
        $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $designData));

        $filename = 'design_' . time() . '.png';
        $path = public_path('/uploads/designs/' . $filename);

        file_put_contents($path, $decodedImage);

        Design::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->input('product_id'),
            'image_front' => '/uploads/designs/' . $filename,
            'image_back' => '/uploads/designs/' . $filename,
        ]);

        Session::flash('success', 'Design saved successfully');

        return response()->json(['message' => 'design saved successfully']);
    }
}
