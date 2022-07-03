<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>City Mall (clone)</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-light">
        <div class="container-lg justify-content-between">
            <a class="navbar-brand me-md-5 me-0" href="#">CityMall</a>

            <form class="d-flex ms-md-5 d-none d-md-flex" role="search">
                <input class="form-control w-80 me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
            </form>

            <button class="d-md-none d-block border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                <i class="bg-light bi bi-search"></i>
            </button>

            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <div class="offcanvas-body" id="offcanvasTopLabel">
                        <form class="d-flex ms-md-5" role="search">
                            <input class="form-control w-60 me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            </div>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/register&login" class="nav-link">Login/Sign up</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a href="#" class="nav-link"><span><i class="bi bi-basket"></i></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="navbar navbar-expand bg-light">
        <div class="container-lg">
                <div class="navbar-nav">
                    <a class="nav-link" href="#">Categories</a>
                    <a class="nav-link" href="#">Stores</a>
                    <a class="nav-link" href="#">Dalivery Method</a>
                </div>
        </div>
    </div>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>