<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DesignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $designs = Design::all();
        return view('designs.index', compact('designs'));
    }

    public function show(Design $design)
    {
        return view('designs.show', compact('design'));
    }

    public function new()
    {
        $products = Product::select('id', 'name', 'image_front', 'image_back')->where('can_customize', true)->get();

        $data = compact('products');
        return view('designs.new', $data);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'design' => 'required',
            'product_id' => 'required|exists:products,id',
            'direction' => 'required|in:front,back',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $designData = $request->input('design');
        $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $designData));

        $filename = 'design_' . time() . '.png';
        $path = public_path('/uploads/designs/' . $filename);

        file_put_contents($path, $decodedImage);

        $direction = $request->input('direction');

        Design::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->input('product_id'),
            'direction' => $direction,
            'image_path' => '/uploads/designs/' . $filename,
        ]);

        Session::flash('success', 'Design saved successfully');

        return response()->json(['message' => 'design saved successfully']);
    }

    public function destroy(Design $design)
    {
        $design->delete();
        return redirect()->back()->with('danger', 'Design successfully removed');
    }
}
