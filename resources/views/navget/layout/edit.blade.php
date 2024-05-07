@extends('navget.layout.app')

@section('content')
    <div class="container col-6 my-5">
        @if ($errors->any())
            <div class="alert alert-danger mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <h4>{{ $error }}</h4>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <h1>Edit Page : {{ $emp->name }}</h1>
            <form action="{{ route('emp.update', $emp->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label> Name</label>
                    <input type="text" value="{{ $emp->name }}" class="form-control" name="empName">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" value="{{ $emp->image }}" class="form-control" name="empImage">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" value="{{ $emp->price }}" class="form-control" name="empprice">
                </div>
                <div class="form-group">
                    <label> Quantity</label>
                    <input type="text" value="{{ $emp->quantity }}" class="form-control" name="empQuantity">
                </div>
                <button class="btn btn-info">Send data</button>
            </form>
        </div>
    </div>
    </div>
@endsection
