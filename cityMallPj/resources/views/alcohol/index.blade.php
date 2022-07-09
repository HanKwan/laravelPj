@extends('app')

@section('content')
    <div class="bg-secondary p-3 text-center text-white mb-3">
        <span class="h3">Beer, Wind & Tabacco</span>
    </div>
    <div><a class="fs-5 text-decoration-none" href="/"><- Back</a></div>

    <div class="container-lg mt-3">
        <div class="row g-5">
            {{-- filter --}}
            <div class="col-4 d-md-block d-none">
                <form class="border rounded">
                    <div class="py-2 px-3 d-flex justify-content-between align-items-center">
                        <span>Filter</span>
                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    </div>
                    <div class="px-3 py-2">
                        <div>
                            <input class="me-1" type="checkbox" value="">Optional
                        </div>
                    </div>
                </form>
            </div>
            
            {{-- poster and products --}}
            <div class="col-md-8">
                <div>
                    <img style="height: 300px; width: 550px;" class="img-fluid" src="/images/categories/alcohols/alcoholPoster.jpg">
                </div>

                <h3 class="my-3 text-danger">Beer, Wind & Tabacco</h3>

                <div class="row text-center justify-content-start g-4">
                    <a href="/Fresh/Produce" class="text-decoration-none text-dark col-md-3 d-flex justify-content-center col-sm-4 col-7">
                        <div class="card" style="width: 13rem;">
                            <img class="card-img-top" src="/images/categories/fresh/green.jpg" alt="Card image cap">
                            <div class="card-body justify-content-center p-0 align-items-center d-flex">
                                <span class="card-text">Produce</span>
                            </div>
                        </div>
                    </a>
                    <a href="/Fresh/Meat" class="text-decoration-none text-dark col-md-3 col-sm-4 col-7 d-flex justify-content-center">
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