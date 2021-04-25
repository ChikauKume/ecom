<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Qty</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($cart->items as $prod)
            <tr>
                <th scope="col">{{ $i++ }}</th>
                <th>{{ $prod['name'] }}</th>
                <th>{{ $prod['price'] }}</th>
                <th>{{ $prod['qty'] }}</th>
            </tr>
        @endforeach
        <br>
        Total Price: {{ $cart->totalPrice }}
        Please click the link to view your order.
        <a href="{{ url('/order') }}">Click here</a>
    </tbody>
</table>