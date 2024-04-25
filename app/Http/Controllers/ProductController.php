<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function new()
    {
        $categories = Category::select('id', 'name')->get();

        return view('products.new', compact('categories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'numeric', 'min:0'],
            'image_front' => 'required',
            'image_back' => 'required',
        ]);

        if ($request->hasFile('image_front')) {
            $file = $request->file('image_front');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $path1 = '/uploads/products/' . $filename;
        } else {
            $path1 = "/assets/images/no_img.png";
        }
        if ($request->hasFile('image_back')) {
            $file = $request->file('image_back');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $path2 = '/uploads/products/' . $filename;
        } else {
            $path2 = "/assets/images/no_img.png";
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'direction' => $request->direction ?? 'front',
            'image_front' => $path1,
            'image_back' => $path2,
            'can_customize' => $request->boolean('can_customize'),
            'bestseller' => $request->boolean('bestseller'),
        ]);

        $text = "Product " . $request->name . " created, datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('products')->with('success', 'Product was successfully created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();

        $data = compact('categories', 'product');
        return view('products.edit', $data);
    }

    public function update(Product $product, Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'numeric', 'min:0'],
        ]);

        if ($request->hasFile('image_front')) {
            $file = $request->file('image_front');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $path1 = '/uploads/products/' . $filename;
        } else {
            $path1 = $product->image_front;
        }
        if ($request->hasFile('image_back')) {
            $file = $request->file('image_back');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/products/' . $filename));
            $path2 = '/uploads/products/' . $filename;
        } else {
            $path2 = $product->image_back;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'direction' => $request->direction,
            'image_front' => $path1,
            'image_back' => $path2,
            'can_customize' => $request->boolean('can_customize'),
            'bestseller' => $request->boolean('bestseller'),
        ]);

        $text = "Product " . $product->name . " updated, datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->route('products')->with('success', 'Product was successfully updated.');
    }

    public function destroy(Product $product)
    {
        $text = "Product " . $product->name . " deleted, datetime: " . now();

        if ($product->image_back != '/assets/images/no_img.png') {
            $path = public_path($product->image_back);
            File::delete($path);
        }
        if ($product->image_back != '/assets/images/no_img.png') {
            $path = public_path($product->image_back);
            File::delete($path);
        }

        $product->delete();

        Log::create(['text' => $text]);

        return redirect()->back()->with('danger', 'Product was successfully deleted');
    }
}
