@extends('app')

@section('content')
    <div class="bg-secondary p-3 text-center text-white mb-3">
        <span class="h3">Wines</span>
    </div>

    @if (session()->has('message'))
        <div class="bg-success text-white h3 text-center py-3">
            {{ session('message') }}
        </div>
    @endif
    <div><a class="fs-5 text-decoration-none" href="/Beer,Wind&Tabacco"><- Back</a></div>

    
    <div class="container-lg">
        <div class="row g-5">
            <div class="col-4 d-md-block d-none">
                <form action="{{ URL::current() }}" method="get" class="border rounded mt-3">
                    <div class="py-2 px-3 d-flex justify-content-between align-items-center">
                        <span>Filter</span>
                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    </div>
                    <div class="px-3 py-2">
                        {{-- optional --}}
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item w-60">
                                <h2 class="accordion-header" id="headingtwo">
                                    <button class="accordion-button shadow-none py-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                        Optional
                                    </button>
                                </h2>
                                <div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        optional
                                        {{-- @if ($beerBrands->count())
                                            @foreach ($beerBrands as $brand)
                                                @php
                                                    $checked = [];
                                                    if(isset($_GET['brandType'])) {
                                                        $checked = $_GET['brandType']; 
                                                    }
                                                @endphp
                                                <div>
                                                    <input class="me-1" name="brandType[]" type="checkbox" value="{{ $brand->brand_name }}" 
                                                    @if (in_array($brand->brand_name, $checked)) checked @endif>
                                                    {{ $brand->brand_name }}
                                                </div>
                                            @endforeach     --}}
                                        {{-- @else
                                            <span>No Brand</span>
                                        @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <button class="d-md-none bg-dark text-white text-center fixed-bottom py-2 w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <div>Filter</div>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 20em">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div>
                        <form action="{{ URL::current() }}" method="get" class="border rounded mt-3">
                            <div class="py-2 px-3 d-flex justify-content-between align-items-center">
                                <span>Filter</span>
                                <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                            </div>
                            <div class="px-3 py-2">
                                {{-- optional --}}
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item w-60">
                                        <h2 class="accordion-header" id="headingtwo">
                                            <button class="accordion-button shadow-none py-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                                Optional
                                            </button>
                                        </h2>
                                        <div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                optional
                                                {{-- @if ($beerBrands->count())
                                                    @foreach ($beerBrands as $brand)
                                                        @php
                                                            $checked = [];
                                                            if(isset($_GET['brandType'])) {
                                                                $checked = $_GET['brandType']; 
                                                            }
                                                        @endphp
                                                        <div>
                                                            <input class="me-1" name="brandType[]" type="checkbox" value="{{ $brand->brand_name }}" 
                                                            @if (in_array($brand->brand_name, $checked)) checked @endif>
                                                            {{ $brand->brand_name }}
                                                        </div>
                                                    @endforeach    
                                                @else
                                                    <span>No Brand</span>
                                                @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
              
            
            <div class="col-md-8">
                <h3 class="mb-3 text-danger">{{ $wineProducts->count() }} {{ Str::plural('Result', $wineProducts->count()) }} Founded</h3>

                {{-- individual beer products --}}
                <div class="row text-center justify-content-md-start justify-content-center g-2">
                    @foreach ($wineProducts as $product)
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
