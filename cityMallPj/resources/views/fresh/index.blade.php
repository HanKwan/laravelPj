@extends('app')

@section('content')
    <div class="bg-secondary p-2 text-center text-white">
        <h3>Fresh product, Meat, Dairy & Eggs</h3>
    </div>

    <div class="container-lg">
        <div class="mt-3 row g-5">
            <div class="col-4 d-md-block d-none">
                <x-filter /> 
            </div>
            <div class="col-md-8">
                <div>
                    <img class="img-fluid" src="/images/categories/fresh/freshPoster.jpg">
                </div>

                <h3 class="my-3 text-danger">Fresh product, Meat, Dairy & Eggs</h3>

                <div class="row text-center justify-content-start g-4">
                    <a href="/Fresh/Produce" class="text-decoration-none text-dark col-md-3 d-flex justify-content-center col-sm-4 col-7">
                        <div class="card" style="width: 13rem;">
                            <img class="card-img-top" src="/images/categories/fresh/green.jpg" alt="Card image cap">
                            <div class="card-body justify-content-center p-0 align-items-center d-flex">
                                <span class="card-text">Produce</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="text-decoration-none text-dark col-md-3 col-sm-4 col-7 d-flex justify-content-center">
                        <div class="card" style="width: 13rem;">
                            <img class="card-img-top" src="/images/categories/fresh/meat.jpg" alt="Card image cap">
                            <div class="card-body justify-content-center p-0 align-items-center d-flex">
                                <span class="card-text">Meat, Poultry & Fishery</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection