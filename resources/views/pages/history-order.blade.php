@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Payment method</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($historyOrder as $order)
                    <tr>
                        <th scope="row">{{ $order->title }}</th>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

</div>

@endsection
