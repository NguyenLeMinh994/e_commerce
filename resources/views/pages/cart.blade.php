@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @guest
        <div class="col-md-12">
            <h3> Please Login First </h3>
            <a href="{{ route('login') }}">Login here</a>
        </div>
        @else
        @if (session()->has('cart'))
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($cartList as $idProduct => $cart)
                    <tr>
                        <th scope="row">{{ $cart['title'] }}</th>
                        <td>{{ $cart['quantity'] }}</td>
                        <td>{{ $cart['price'] }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('removeToCart',['idProduct' => $idProduct]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title">Information</h3>
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            {{ session('error') }}
                        </div>
                    @endif
                    <p class="card-text">
                        <p>Total: {{ $total }} USD</p>
                    </p>

                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="radio1" value="cash" checked>
                            <label class="form-check-label" for="radio1">
                              Cash
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="radio2" value="balance"
                                @if (Auth::user()->balance <= $total)
                                    disabled
                                @endif
                            >
                            <label class="form-check-label" for="radio2">
                              Balance: {{ Auth::user()->balance }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="radio3" value="credit_card">
                            <label class="form-check-label" for="radio2">
                                Credit card
                            </label>
                        </div>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" name="shipping_address" placeholder="Address" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Place order</button>
                    </form>
                </div>
            </div>
        </div>
        @else
            <h3>Please choose a product</h3>
        @endif

        @endguest
    </div>



</div>

@endsection
