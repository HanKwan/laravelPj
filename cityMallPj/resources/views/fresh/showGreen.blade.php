@extends('app')

@section('content')
    <div class="bg-secondary p-3 text-center text-white">
        <span class="h3">Produce</span>
    </div>

    <div class="container-lg">
        <div class="mt-3 row g-5">
            <div class="col-4 d-md-block d-none">
                <form class="border rounded">
                    <div class="py-2 px-3 d-flex justify-content-between align-items-center">
                        <span>Filter</span>
                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    </div>
                    <div class="px-3 py-2">
                        <div>
                            <input class="me-1" type="checkbox" value="">Fruit
                        </div>
                        <div>
                            <input class="me-1" type="checkbox" value="">Vegetable
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h3 class="mb-3 text-danger">{{ $freshProducts->count() }} Results Founded</h3>

                <div class="row text-center justify-content-md-start justify-content-center g-2">
                        @foreach ($freshProducts as $product)
                            <div class="text-decoration-none text-dark col-md-4 d-flex justify-content-center col-sm-4 col-9">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="{{ $product->product_img }}" alt="Card image cap">
                                    <div class="card-body text-center px-1 py-2">
                                        <div class="card-text">
                                            <div class="fw-bold">
                                                <span>{{ $product->product_name }}</span>
                                            </div>
                                            <div class="text-sm text-mute">
                                                <span>{{ $product->weight }} Grams</span>
                                            </div>
                                            <div class="text-primary text-sm">
                                                <span>{{ $product->prize }} Ks</span>
                                            </div>
                                            <form action="">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span style="font-size: 25px;"><i class="bi bi-dash-circle"></i></span>
                                                    <span>1</span>
                                                    <span style="font-size: 25px;"><i class="bi bi-plus-circle"></i></span>
                                                </div>
                                                <button class="bg-primary w-100 text-white border border-primary rounded-pill" type="submit">Add To Cart</button>
                                            </form>
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
