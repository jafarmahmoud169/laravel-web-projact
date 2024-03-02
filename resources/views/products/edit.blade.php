@extends('products.layout')
@section('content')
<br>
<div class="row">
    <div class="col align-self-start">
        <a class="btn btn-primary"href="{{ route('products.index') }}">ALL PRODUCTS</a>
    </div>

<div class="containet  p-5">
<form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label" value="">Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
    </div>
<div class="mb-3">
    <label for="" class="form-label">description</label>
    <textarea class="form-control" name="description"  rows="3">{{$product->description}}</textarea>
</div>
<img src="images/{{$product->image}}" alt="no">
<p>{{$product->image}}</p>
<input type="file" class="form-control" name="image"/>
<br>
<button type="submit"class="btn btn-primary">Submit</button>
</form>
</div>
<br>
</div>
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $item )
            <li>{{$item}}
            </li>
            @endforeach
        </ul>
</div>

@endif

@endsection
