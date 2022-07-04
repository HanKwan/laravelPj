@extends('app')

@section('content')
    <div class="bg-secondary p-3 text-center text-white">
        <span class="h3">Produce</span>
    </div>

    <div class="container-lg">
        <div class="mt-3 row g-5">
            <div class="col-4 d-md-block d-none">
                <form action="{{ URL::current() }}" method="get" class="border rounded">
                    <div class="py-2 px-3 d-flex justify-content-between align-items-center">
                        <span>Filter</span>
                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    </div>
                    <div class="px-3 py-2">
                        {{-- type filter --}}
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item w-60">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button shadow-none py-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Type
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @if ($freshGreens->count())
                                            @foreach ($freshGreens as $fresh)
                                                @php
                                                    $checked = [];
                                                    if(isset($_GET['produceType'])) {
                                                        $checked = $_GET['produceType']; 
                                                    }
                                                @endphp
                                                <div>
                                                    <input class="me-1" name="produceType[]" type="checkbox" value="{{ $fresh->id }}" 
                                                    @if (in_array($fresh->id, $checked)) checked @endif>
                                                    {{ $fresh->type }}
                                                </div>
                                            @endforeach    
                                        @else
                                            <span>No Type</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- brand filter --}}
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item w-60">
                                <h2 class="accordion-header" id="headingtwo">
                                    <button class="accordion-button shadow-none py-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                        Brand
                                    </button>
                                </h2>
                                <div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{-- @if ($greenBrands->count())
                                            @foreach ($greenBrands as $brand)
                                                @php
                                                    $checked = [];
                                                    if(isset($_GET['brandType'])) {
                                                        $checked = $_GET['brandType']; 
                                                    }
                                                @endphp
                                                <div>
                                                    <input class="me-1" name="brandType[]" type="checkbox" value="{{ $brand->id }}" 
                                                    @if (in_array($brand->id, $checked)) checked @endif>
                                                    {{ $brand->brand_name }}
                                                </div>
                                            @endforeach    
                                        @else --}}
                                        <span>No Brand</span>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <h3 class="mb-3 text-danger">{{ $freshGreenProducts->count() }} Results Founded</h3>

                {{-- individual green products --}}
                <div class="row text-center justify-content-md-start justify-content-center g-2">
                        @foreach ($freshGreenProducts as $product)
                            <div class="text-decoration-none text-dark col-md-4 d-flex justify-content-center col-sm-4 col-9">
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="{{ $product->product_img }}" alt="Card image cap">
                                    <div class="card-body px-1 py-2">
                                        <div class="card-text h-100 d-flex justify-content-between flex-column">
                                            <div class="text-start ps-2">
                                                <div class="fw-bold">
                                                    <span>{{ $product->product_name }}</span>
                                                </div>
                                                <div class="text-sm text-muted">
                                                    <span>{{ $product->weight }} Grams</span>
                                                </div>
                                                <div class="text-primary text-sm">
                                                    <span>{{ $product->prize }} Ks</span>
                                                </div>
                                            </div>
                                            <form class="text-start px-2" action="/cart/{{ $product->id }}" method="post">
                                                @csrf
                                                <input class="shadow-none border my-2 w-50" type="number" name="quantity" min="1" value="1">
                                                <button class="bg-primary border-0 w-100 text-white rounded border-primary py-2" type="submit">Add To Cart</button>
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
