@extends('navget.layout.app')

@section('content')
    <div class="container col-6 my-5">
        @if ($errors->any())
            <div class="alert alert-danger mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="/emp/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label> Name</label>
                        <input type="text" class="form-control" name="empName">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="empImage" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="empPrice">
                    </div>
                    <div class="form-group">
                        <label> Quantity</label>
                        <input type="text" class="form-control" name="empQuantity">
                    </div>
                    <button type="submit" class="btn btn-info">Send data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
