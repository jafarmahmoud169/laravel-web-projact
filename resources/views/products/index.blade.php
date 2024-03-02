@extends('products.layout')

@section('content')
    <br>
    @auth
        <div class="row">
            <div class="col align-self-start">
                <a class="btn btn-primary"href="{{ route('products.create') }}">CREATE</a>
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
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($product as $item)
                    <tr class="table-primary">
                        <td>{{ $item->id }}</td>
                        <td><img src="images/{{ $item->image }}" alt="" width="200px"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            @auth
                                <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                                <a class="btn btn-primary" href="{{ route('products.edit', $item->id) }}">EDIT</a>
                                <br>
                            @endauth
                            <a class="btn btn-info"href="{{ route('products.show', $item->id) }}">SHOW</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{!! $product->links() !!}</div>
    </div>
@endsection
