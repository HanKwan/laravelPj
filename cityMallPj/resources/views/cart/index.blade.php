@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                      <tr class="text-muted">
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Prize</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-muted">
                        @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->name }}</td>
                                {{-- <td><img src="{{ $cart->product_img }}" alt=""></td> --}}
                                <td>
                                    <form action="/cart/quantity/update/{{ $cart->rowId }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input style="width: 50px;" name="quantity" type="number" min="1" value="@php echo $cart->qty @endphp">  {{-- dont forget name --}}
                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                    </form>
                                </td>
                                <td>{{ $cart->price }}</td>
                                <td>
                                    <form action="/cart/remove/{{ $cart->rowId }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm text-white">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    <div class="text-end me-3">
                        <div>
                            <small class="text-sm">Total Prize</small><br>
                            <span>amount</span>
                        </div>
                        <button class="btn mt-2 btn-sm btn-primary text-white">Purchase Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection