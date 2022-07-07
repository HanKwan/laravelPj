@extends('app')

@section('content')
    @if (session()->has('message'))
        <div class="bg-success text-white h2 text-center py-3">
            {{ session('message') }}
        </div>
    @endif

    {{-- table --}}
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
                        @forelse ($carts as $cart)
                            <tr>
                                <td>{{ $cart->name }}</td>
                                <td>
                                    <form action="/cart/quantity/update/{{ $cart->rowId }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input style="width: 50px;" name="quantity" type="number" min="1" value="@php echo $cart->qty @endphp">  {{-- dont forget name --}}
                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                    </form>
                                </td>
                                <td>{{ $cart->price * $cart->qty }}</td>
                                <td>
                                    <form action="/cart/remove/{{ $cart->rowId }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm text-white">Remove</button>
                                    </form>
                                </td>
                            </tr>                            
                        @empty
                            <tr class="text-center">
                                <td>Your cart is empty. Start buying now!!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- the amounts --}}
                <div class="mt-2">
                    <div class="text-end me-3">
                        <div>
                            <small>Total Amount :</small>
                            <span>{{ $totalAmount }}</span><br>

                            <small>Tax :</small>
                            <span>{{ $tax }}</span><br>
                            
                            <small class="text-sm">Total Price :</small>
                            <span>{{ $totalPrice }}</span>
                        </div>
                        <button class="btn mt-2 btn-sm btn-primary">
                            <a class="text-white text-decoration-none" href="/purchase">Purchase Now</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection