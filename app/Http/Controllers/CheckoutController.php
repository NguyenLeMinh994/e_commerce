<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        if(empty($request->shipping_address)){
            return redirect("/cart")->with('error','Address not empty');
        }

        $carts = session()->get('cart', []);
        $userId = auth()->id();

        $order = new Order();
        $order->user_id = $userId;
        $order->total_amount = Product::totalProductPrice($carts);
        $order->shipping_address = $request->shipping_address;
        $order->payment_method = $request->payment_method;
        $order->save();

        $idOrder = $order->id;
        $arrOrderItem = [];
        foreach ($carts as $idProduct => $cart) {
            $arrOrderItem[] = [
                'order_id' => $idOrder,
                'product_id' => $idProduct,
                'quantity' => $cart['quantity'],
                'price' => $cart['price'],
            ];
        }
        OrderItem::insert($arrOrderItem);
        Product::forgotCart();

        return redirect("/product");
    }

    public function getListHistoryOrder() {
        $idUser = auth()->id();
        $historyOrder = Order::getHistoryOrder($idUser);
        return view("pages.history-order",["historyOrder" => $historyOrder]);
    }
}
