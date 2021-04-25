<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index(){
        $sliders = Slider::get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }
    public function store(Request $reqeust){
        $this->validate($reqeust,[
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
        $image = $reqeust->file('image')->store('public/slider');
        Slider::create([
            'image' => $image,
        ]);
        notify()->success('Slider uploaded successfully');
        return redirect()->route('slider.index');
    }

    public function destroy($id){
        Slider::find($id)->delete();
        notify()->success('Slider deleted successfully');
        return redirect()->route('slider.index');
    }
}
