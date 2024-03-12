@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $productDetail->image_url }}" class="card-img-top" alt="{{ $productDetail->title }}" style="height: 15rem;">
        </div>
        <div class="col-md-6">
            <div class="card m-2" style="height: 14rem;">
                <div class="card-body">
                    <h3 class="card-title">{{ $productDetail->title }}</h3>
                    @if($productDetail->stock == 1)
                    <span class="badge badge-primary">In stock</span>
                    @else
                    <span class="badge badge-danger">Out of stock</span>
                    @endif
                    <p class="card-text">{{ $productDetail->description }}</p>
                    @if($productDetail->stock == 1)
                    <a href="{{ route('addToCart', ['idProduct'=> $productDetail->id]) }}" class="btn btn-primary add-to-card" data-add-to-cart="{{ route('addToCart', ['idProduct'=> $productDetail->id]) }}">Add to Card</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
