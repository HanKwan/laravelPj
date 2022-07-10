@extends('app')

@section('content')
    <div class="container my-5">
        <div class="row text-center g-4 d-flex justify-content-center">
            <div class="col-9 col-md-4">
                <div class="border" style="height: 170px">
                    <div class="bg-secondary fs-5 py-2">
                        <a class="text-decoration-none text-white" href="/Fresh">Fresh</a>
                    </div>
                    <div class="d-flex flex-column my-3">
                        <span class="mt-1"><a class="text-decoration-none text-dark" href="/Fresh/Produce">Produce</a></span>
                        <span class="mt-1"><a class="text-decoration-none text-dark" href="/Fresh/Meat">Meat</a></span>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-4">
                <div class="border" style="min-height: 170px">
                    <div class="bg-secondary text-white fs-5 py-2">
                        <a class="text-decoration-none text-white" href="/Beer,Wind&Tabacco">Beer, Wine & Tabacco</a>
                    </div>
                    <div class="d-flex flex-column my-3">
                        <span class="mt-1"><a class="text-decoration-none text-dark" href="/Beer,Wind&Tabacco/beer">Beer</a></span>
                        <span class="mt-1"><a class="text-decoration-none text-dark" href="/Beer,Wind&Tabacco/wine">Wine</a></span>
                        <span class="mt-1"><a class="text-decoration-none text-dark" href="/Beer,Wind&Tabacco/cigarettes">Cigarette</a></span>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-4">
                <div class="border" style="height: 170px">
                    <div class="bg-secondary text-white fs-5 py-2">
                        <a class="text-decoration-none text-white" href="/Fashion">Fashion</a>
                    </div>
                    <div class="d-flex flex-column my-3">
                        <span class="mt-1"><a class="text-decoration-none text-dark" href="/Fashion?wearType%5B%5D=6">Men Wear</a></span>
                        <span class="mt-1"><a class="text-decoration-none text-dark" href="/Fashion?wearType%5B%5D=7">Women Wear</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection