<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Mail\Sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class CartController extends Controller
{
    public function addToCart(Product $product,Request $request){
    	//return $product;

        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = new Cart();
    	}
    	$cart->add($product);


    	session()->put('cart',$cart);
    	 notify()->success('Product added to cart!');
        return redirect()->back();

    }

	public function showCart(){
		if(session()->has('cart')){
			$cart = new Cart(session()->get('cart'));
		} 
		else{
			$cart = null;
		}
		return view('cart',compact('cart'));
	}

    public function updateCart(Request $request, Product $product){
		$request->validate([
			'qty' => 'required|numeric|min:1'
		]);

		$cart = new Cart(session()->get('cart'));
		$cart->updateQty($product->id, $request->qty);
		session()->put('cart', $cart);
		notify()->success('Cart updated!');
	   return redirect()->back();
	}

	public function removeCart(Product $product){
		$cart = new Cart(session()->get('cart'));
		$cart->remove($product->id);
		if($cart->totalQty<=0){
			session()->forget('cart');
		}
		else{
			session()->put('cart',$cart);
		}
		notify()->success('Cart updated!');
		return redirect()->back();
	}

	public function checkout($amount){
		if(session()->has('cart')){
			$cart = new Cart(session()->get('cart'));
		} 
		else{
			$cart = null;
		}
		return view('checkout',compact('amount','cart'));
	}

	public function charge(Request $request){
		$charge = Stripe::charges()->create([
			'currency' => 'USD',
			'source' => $request->stripeToken,
			'amount' => $request->amount,
			'description' => 'Test',
		]);

		$chargeId = $charge['id'];

		if(session()->has('cart')){
			$cart = new Cart(session()->get('cart'));
		} 
		else{
			$cart = null;
		}

		Mail::to(auth()->user()->email)->send(new Sendmail($cart));

		if($chargeId){
			auth()->user()->orders()->create([
				'cart' => serialize(session()->get('cart'))
			]);

			session()->forget('cart');
			notify()->success('Payment completed!');
			return redirect()->to('/');
		}
		else{
			return redirec()->back();
		}
	}

	public function order(){
		$orders = auth()->user()->orders; 
		$carts = $orders->transform(function($cart, $key){
			return unserialize($cart->cart);
		});
		return view('order',compact('orders','carts'));
	}



}
