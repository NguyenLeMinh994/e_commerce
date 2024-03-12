@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($productList as $product)
        <div class="card m-2" style="width: 18rem;">
            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->title }}" style="height: 15rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $product->title }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <a href="{{ route('addToCart', ['idProduct'=> $product->id]) }}" class="btn btn-primary add-to-card" data-add-to-cart="{{ route('addToCart', ['idProduct'=> $product->id]) }}">Add to Card</a>
              <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn btn-primary">Detail</a>
            </div>
        </div>
        @endforeach



    </div>
</div>

@endsection
