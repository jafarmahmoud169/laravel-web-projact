@extends('products.layout')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Image </th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($product as $item)
                    <tr class="table-primary">
                        <td>{{ $item->id }}</td>
                        <td><div class="mb-3"><img src="/images/{{$item->image}}" width="200px"></div></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            @auth
                            <a class="btn btn-warning"href="{{ route('soft.back', $item->id) }}">back</a>
                            <a class="btn btn-danger"href="{{ route('hard.delete', $item->id) }}">Hdelete</a>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{!! $product->links() !!}</div>
    </div>
@endsection
