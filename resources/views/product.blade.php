@extends('layouts.app')

@section('content')
<div class="container">
    <main> 
        <section class="jumbotron text-center">
            <div class="container">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <center>
                                    <img src="{{ Storage::url($slider->image) }}" width="30%">
                                </center>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
        <h2>Category</h2>
        @foreach (App\Category::all() as $cat)
            <a href="{{ route('product.list',[$cat->slug]) }}">
                <button class="btn btn-secondary">{{ $cat->name }}</button>
            </a>
        @endforeach
        <div class="album py-5 bg-light">
            <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $prod)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ Storage::url($prod->image) }}" height="200">
                            <div class="card-body">
                            <p><b>{{ $prod->name }}</b></p>
                            <p class="card-text">
                                {!! Str::limit($prod->description, 120) !!}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/product/{{ $prod->id }}">
                                        <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                    </a>
                                    <a href="{{ route('add.cart',[$prod->id]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                    </a> 
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <center>
            <button class="my-3 btn btn-success">More Product</button>
        </center>
        <div class="jumbotron">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($randomActiveProducts as $prod)
                                <div class="col-4">
                                    <div class="card shadow-sm">
                                        <img src="{{ Storage::url($prod->image) }}" height="200">
                                        <div class="card-body">
                                        <p><b>{{ $prod->name }}</b></p>
                                        <p class="card-text">
                                            {!! Str::limit($prod->description, 120) !!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="/product/{{ $prod->id }}">
                                                    <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                                </a>
                                                <a href="{{ route('add.cart',[$prod->id]) }}">
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                                </a> 
                                            </div>
                                            <small class="text-muted">9 mins</small>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($randomItemProducts as $prod)
                                <div class="col-4">
                                    <div class="card shadow-sm">
                                        <img src="{{ Storage::url($prod->image) }}" height="200">
                                        <div class="card-body">
                                        <p><b>{{ $prod->name }}</b></p>
                                        <p class="card-text">
                                            {{ Str::limit($prod->description, 120) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="/product/{{ $prod->id }}">
                                                    <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                                </a>
                                                <a href="{{ route('add.cart',[$prod->id]) }}">
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                                </a>                                            </div>
                                            <small class="text-muted">9 mins</small>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
              </div>
        </div>
    </main>

    <footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
        <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
    </div>
    </footer>
</div>
@endsection
