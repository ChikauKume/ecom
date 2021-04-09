@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">SubCategory</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
            </ol>
    </div>

    <div class="row justify-content-center">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>

        @endif

        <div class="col-lg-10">
            <form action="{{route('subcategory.update',[$subcategory->id])}}" method="POST" enctype="multipart/form-data">@csrf
                {{ method_field('PUT') }}
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Subcategory</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group"> 
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $subcategory->name }}" class="form-control @error('name') is-invalid @enderror " id="" aria-describedby=""
                            placeholder="Enter name of subcategory">
                            @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <label>Choose Category</label>
                                <select name="category" id="category" 
                                class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Select category</option>    
                                    @foreach (App\Category::get() as $cat)
                                        <option value="{{ $cat->id }}"
                                            @if ($subcategory->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>    
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection