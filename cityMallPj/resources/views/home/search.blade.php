@extends('app')

@section('content')
    <div class="bg-secondary p-3 text-center text-white mb-3">
        <span class="h3">Search Products</span>
    </div>

    @if (session()->has('message'))
        <div class="bg-success text-white h3 text-center py-3">
            {{ session('message') }}
        </div>
    @endif
    <div><a class="fs-5 text-decoration-none" href="/"><- Back</a></div>

    
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="mb-3 text-danger">{{ $products->count() }} {{ Str::plural('Result', $products->count()) }} Founded</h3>

                {{-- searched products --}}
                <div class="row text-center justify-content-md-start justify-content-center g-2">
                    @foreach ($products as $product)
                        <div class="text-decoration-none text-dark col-md-4 d-flex justify-content-center col-sm-4 col-9">
                            <div class="card" style="width: 15rem;">
                                <img class="card-img-top" src="{{ $product->product_img }}" alt="Card image cap">
                                <div class="card-body px-1 py-2">
                                    <div class="card-text h-100 d-flex justify-content-between flex-column">
                                        <div class="ps-2 text-start">
                                            <div class="fw-bold">
                                                <span>{{ $product->product_name }}</span>
                                            </div>
                                            <div class="h-auto text-sm text-muted">
                                                <span>{{ $product->weight }} Grams</span>
                                            </div>
                                            <div class="text-primary text-sm">
                                                <span>{{ $product->price }} Ks</span>
                                            </div>
                                        </div>
                                        @if ($cart->where('id', $product->id)->count())
                                            <div class="text-white bg-secondary py-2 border-secondary rounded">In cart</div>
                                        @else
                                            <form class="text-start px-2" action="/cart/{{ $product->id }}" method="post">
                                                @csrf
                                                <input class="shadow-none border my-2 w-50" type="number" name="quantity" min="1" value="1">
                                                <button class="bg-primary border-0 w-100 text-white rounded border-primary py-2" type="submit">Add To Cart</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
