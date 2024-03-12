<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public static function getHistoryOrder($idUser) {
        return Order::join('order_items','orders.id','=','order_items.order_id')
            ->join('products','products.id','=','order_items.product_id')
            ->where('orders.user_id','=',$idUser)
            ->get(["payment_method","title","order_items.price","quantity"]);
    }
}
