<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public static function totalProductPrice($carts) {
        $total = 0;
        if(empty($carts)) return $total;

        foreach ($carts as $cart) {
            $total += ($cart['price'] * $cart['quantity']);
        }

        return $total;
    }

    public static function forgotCart(){
        Session::forget('cart');
    }
}
