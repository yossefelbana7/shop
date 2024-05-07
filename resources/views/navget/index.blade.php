@extends('navget.layout.app')

@section('content')
    @if (Session::has('done'))
        <div class="alert alert-success">
            {{ Session::get('done') }}
        </div>
    @endif
    <div class="container col-6 my-5">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emp as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->image }}</td>
                                <td>
                                    <a href="{{ route('emp.edit', $data->id) }}" class="btn btn-info"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('emp.show', $data->id) }}" class="btn btn-warning"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <form action="{{ route('emp.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
