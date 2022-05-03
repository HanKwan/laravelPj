@extends('layouts.app')
@section('content')
    <div class="container main my-5">
        <div class="row justify-content-center">
            <div class="col-6 col-lg-4">
                <h2>Edit Product</h2>
                <form action="/phones/{{$phone->id}}" method="POST" class="pt-5">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                    <label for="model" class="form-label">Phone model:</label>
                    <input type="text" name="name" value="{{$phone->name}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" class="form-control">{{$phone->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prize" class="form-label">Prize:</label>
                        <input type="integer" name="prize" value="{{$phone->prize}}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection