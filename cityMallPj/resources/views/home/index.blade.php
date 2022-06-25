@extends('app')

@section('content')
    {{-- slide show --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/images/slideshow/slide01.jpg" alt="First slide">
            </div>
            <div class="carousel-item" id="slideshow02">
                <img class="d-block w-100" src="/images/slideshow/slide02.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/slideshow/slide03.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>

    {{-- categories --}}
    <div class="container-lg mt-5">
        <h4>Categories</h4>
        <div class="row text-center justify-content-center g-4">
            @foreach ($categories as $category)
                <a href="/{{ $category->type }}" class="text-decoration-none text-dark col-md-3 d-flex justify-content-center col-sm-5 col-9">
                    <div class="card" style="width: 13rem;">
                        <img class="card-img-top" src="{{ $category->cate_image }}" alt="Card image cap">
                        <div class="card-body justify-content-center p-0 align-items-center d-flex">
                            <h4 class="card-text">{{ $category->type }}</h4>
                        </div>
                    </div>
                </a>    
            @endforeach            
        </div>
    </div>
@endsection