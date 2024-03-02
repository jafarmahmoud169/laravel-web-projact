@extends('products.layout')
@section('content')
<br>
<div class="row">
    <div class="col align-self-start">
        <a class="btn btn-primary"href="{{ route('products.index') }}">ALL PRODUCTS</a>
    </div>

<div class="containet  p-5">
<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name"/>
    </div>
<div class="mb-3">
    <label for="" class="form-label">description</label>
    <textarea class="form-control" name="description"  rows="3"></textarea>
</div>
    <div class="mb-3">
        <label for="" class="form-label">IMAGE</label>
        <input type="file" class="form-control" name="image"/>
    </div>
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
