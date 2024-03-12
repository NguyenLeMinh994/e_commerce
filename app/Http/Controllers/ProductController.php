<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('pages.product', ["productList" => Product::get()]);
    }

    public function detailProdcut($id){
        return view('pages.product-detail', ["productDetail" => Product::find($id)]);
    }

    public function addToCart($idProduct) {
        $product = Product::find($idProduct);
        if(empty($product)) return redirect()->back()->with('fail', 'Product not found');

        $cart = session()->get('cart', []);
        if(isset($cart[$idProduct])) {
            $cart[$idProduct]['quantity']++;
        } else {
            $cart[$idProduct] = [
                "title" => $product->title,
                "quantity" => 1,
                "price" => $product->price
            ];
        }

        session()->put('cart', $cart);
        return redirect('/cart');
    }

    public function cart() {
        $cartList = session()->get('cart',[]);
        $totalAllProductPrice = Product::totalProductPrice($cartList);

        return view('pages.cart',['cartList' => $cartList, 'total' => $totalAllProductPrice]);
    }

    public function removeToCart($idProduct)
    {
        if($idProduct) {
            $cart = session()->get('cart');
            if(isset($cart[$idProduct])) {
                unset($cart[$idProduct]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect('/cart');
    }


}
