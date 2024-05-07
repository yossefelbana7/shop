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
            <div class="card-body">
                <h1>Show Page : {{ $emp->name }}</h1>
                <div class="form-group">
                    <label> Image</label>
                    <img src="{{ asset('storage/' . $emp->image) }}" class="img-fluid" alt="Employee Image"
                        style="max-width: 100%; height: auto;">
                </div>

                <div class="form-group">
                    <label> Name</label>
                    <input type="text" value="{{ $emp->name }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label> Price</label>
                    <input type="text" value="{{ $emp->price }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label> Quantity</label>
                    <input type="text" value="{{ $emp->quantity }}" class="form-control" readonly>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
