@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        @if ($cart)
            <tbody>
                @foreach ($cart->items as $key => $prod)
                    <tr>
                        <th>{{ $prod['name'] }}</th>
                        <td><img src="{{ Storage::url($prod['image']) }}" width="50"></td>
                        <td>$ {{ $prod['price'] }}</td>
                        <td>
                            <form action="{{route('update.cart',$prod['id'])}}" method="post">@csrf
                                <input type="text" name="qty" value="{{$prod['qty']}}">
                                <button class="btn btn-secondary btn-sm">
                                    <i class="fas fa-sync"></i>Update
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('remove.cart', $prod['id']) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <tbody>
                <td>No item in cart</td>
            </tbody>
        @endif            
      </table>
      <hr>
    @if ($cart)
        <div class="card-footer">
            <button class="btn btn-info text-white">Continue shopping</button>
            <span class="ml-3">Total Price : ${{ $cart->totalPrice }}</span>
            <a href="{{ route('checkout.cart', $cart->totalPrice) }}">
                <button class="btn btn-info float-right">Checkout</button>
            </a>
        </div>
    @endif
</div>

@endsection
