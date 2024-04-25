<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only('custom_logout', 'profile', 'save_profile', 'edit_password', 'update_password', 'custom_design', 'save_design');
    }

    public function index()
    {
        $bestsellers = Product::where('bestseller', true)->get();
        return view('index', compact('bestsellers'));
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
        $categories = Helper::get_active_categories();
        $products = Product::filter()->orderBy('created_at', 'DESC')->paginate(12);

        $data = compact('categories', 'products');
        return view('shop', $data);
    }

    public function custom_logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
