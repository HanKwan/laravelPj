@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h2>Phone product_CRUD</h2>
        <a href="/phones/create" class="btn btn-secondary mt-4">Create new Product</a>
        <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Prize</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($phones as $i => $phone)
                    <tr>
                        <th scope="row">{{ $i+1 }}</th>
                        <td>{{$phone->name}}</td>
                        <td>{{ $phone->description }}</td>
                        <td>{{ $phone->prize }}</td>
                        <td class="d-flex">
                          <a href="/phones/{{$phone->id}}/edit" class="me-1 btn btn-success btn-sm">Edit</a>
                          <form action="/phones/{{$phone->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection