<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Mail\OrderMailer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['order', 'checkout']);
    }

    public function cart()
    {
        $sub_total = 0;
        try {
            $cart_items = json_decode($_COOKIE['cart'], true);
        } catch (\Throwable $th) {
            $cart_items = [];
        }

        if ($cart_items != []) {
            foreach ($cart_items as $productID => $cart_item) {
                $item = Product::find($productID);
                $sub_total += $item->price * $cart_item['quantity'];
            }
        }

        $data = compact('cart_items', 'sub_total');
        return view('cart', $data);
    }

    public function checkout()
    {
        $sub_total = 0;
        $shipping = Helper::get_shipping_cost();
        $total = 0;

        try {
            $cart_items = json_decode($_COOKIE['cart'], true);
        } catch (\Throwable $th) {
            $cart_items = [];
        }

        if ($cart_items != []) {
            foreach ($cart_items as $productID => $cart_item) {
                $item = Product::find($productID);
                $sub_total += $item->price * $cart_item['quantity'];
            }
        }

        $total = $sub_total + $shipping;
        $data = compact('cart_items', 'sub_total', 'total', 'shipping');
        return view('checkout', $data);
    }

    public function order(Request $request)
    {
        $discount = 0;
        $shipping = Helper::get_shipping_cost();
        $total_price = 0;

        try {
            $cart_items = json_decode($_COOKIE['cart'], true) ?? [];
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No Items in your Cart!');
        }

        if ($request->promo != null) {
            $promo = Promo::where('name', 'LIKE', $request->promo)->firstOrFail();
            $discount = $promo->value / 100;
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'new',
            'total_price' => 0,
        ]);

        foreach ($cart_items as $productID => $cart_item) {
            $product = Product::find($productID);

            $order->products()->attach($product, [
                'quantity' => $cart_item['quantity'],
                'size' => $cart_item['size'],
                'design_id' => $cart_item['designId'] ?? null,
            ]);

            $total_price += $product->price * $cart_item['quantity'];
        }

        $total_price += $shipping;
        $order->shipping = $shipping;

        if ($discount != 0) {
            $total_price -= ($total_price * $discount);
        }

        $order->update([
            'total_price' => $total_price
        ]);

        $cookie = cookie()->forget('cart');

        Mail::to(env('MAIL_USERNAME'))->send(new OrderMailer($order));

        return redirect()->route('cart')->with('success', 'Order Submitted, Thank You For Choosing Us!')->cookie($cookie);
    }
}
