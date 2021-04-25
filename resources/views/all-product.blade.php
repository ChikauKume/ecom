@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('more.product') }}" class="d-flex" method="GET">
            <div class="form-row col-md-4">
                <input type="text" name="search" class="form-control" placeholder="search..">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </form>
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
        {{ $products->links() }}
    </div>
@endsection