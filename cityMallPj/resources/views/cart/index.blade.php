@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                      <tr class="text-muted">
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Prize</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-muted">
                        @foreach ($carts as $i => $cart)
                            <tr>
                                <th scope="row">@php echo $i + 1 @endphp</th>
                                <td>{{ $cart->product_name }}</td>
                                <td>
                                    <form action="/cart/quantity/update/{{ }}"></form>
                                    <input style="width: 50px;" type="number" min="1" value="@php echo $cart->quantity @endphp">
                                    <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                </td>
                                <td>{{ $cart->prize }}</td>
                                <td>
                                    <form action="/cart/remove/{{ $cart->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm text-white">Remove</button>
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