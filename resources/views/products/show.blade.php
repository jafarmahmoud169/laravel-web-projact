@extends('products.layout')
@section('content')
    <br>
    <div class="row">
        <div class="col align-self-start">
            <a class="btn btn-primary"href="{{ route('products.index') }}">ALL PRODUCTS</a>
        </div>
        <br>
        <div class="containet  p-5">
            @csrf
            <div class="mb-3">
                <h3>name:{{ $product->name }}</h3>
            </div>
            <div class="mb-3">
                <h3>price:{{ $product->price }}</h3>
            </div>
            <div class="mb-3">
                <p>
                <h5>description:</h5>{{ $product->description }}</p>
            </div>
            <br>
            <div class="mb-3">
                <img src="/images/{{$product->image}}" width="300px">
                </div>        @endsection
