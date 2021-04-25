@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <aside class="col-sm-5 border-right">
                <section class="gallery-wrap">
                    <div class="img-big-wrap">
                        <a href="#">
                            <img src="{{ Storage::url($product->image) }}" width="400">
                        </a>
                    </div>
                </section>
            </aside>
            <aside class="class-sm-7">
                <section class="card-body p-5">
                    <h3 class="title-mb-3">{{ $product->name }}</h3>
                    <p class="price-detail-wrap">
                        <span class="price h3 text-danger">
                            <div class="currency">US $ {{ $product->price }}</div>
                        </span>
                    </p>
                    <h3>Description</h3>
                    <p>{!! $product->description !!}</p>

                    <h3>Additional Inforamtion</h3>
                    <p>{!! $product->additional_info !!}</p>

                    <hr>

                    <div class="row">
                        <div class="form-inline">
                            <h3>Quantity:</h3>
                            <input type="text" name="qty" class="form-control ml-2">
                            <input type="submit" class="btn btn-primary ml-2" value="Submit">
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('add.cart',[$product->id]) }}" class="btn btn-lg btn-outline-primary text-uppercase">
                        Add to cart
                    </a>
                </section>
            </aside>
        </div>
    </div>
    @if (count($productFromSameCategories)>0)
        <div class="jumbotron mt-2">
            <h4>You may like</h4>
            <div class="row">
                @foreach ($productFromSameCategories as $prod)
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
                                    <a href="{{ route('add.cart',[$product->id]) }}">
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
    @endif
</div>
@endsection
