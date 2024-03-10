@extends('products.layout')

@section('content')
    <br>
    @auth
        <div class="row">
            <div class="col align-self-start">
                <a class="btn btn-primary"href="{{ route('products.create') }}">CREATE</a>
                <a class="btn btn-primary"href="{{ route('products.trash') }}">TRASH</a>
            </div>
        </div>
    @endauth
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
    <br>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Image </th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    @auth
                    <th>Action</th>
                    @endauth
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
                            @auth
                            <td>
                                <a class="btn btn-success"href="{{ route('products.show', $item->id) }}">SHOW</a>
                                <a class="btn btn-primary" href="{{ route('products.edit', $item->id) }}">EDIT</a>
                                {{-- <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button> --}}
                                    <a class="btn btn-warning" href="{{ route('soft.delete', $item->id) }}">SOFTDELETE</a>
                                </form>
                        </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{!! $product->links('pagination::bootstrap-5') !!}</div>
    </div>
@endsection
