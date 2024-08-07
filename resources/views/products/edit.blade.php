@extends('layouts.app')

@section('main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 p-3 m-4">
                <form method="POST" action="/products/{{$product->id}}/update">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" 
                        value="{{old('name', $product->name)}}"
                        />
                        @if ($errors->has('name'))
                            <span class="text-danger">
                            {{ $errors->first('name')}}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{old('description', $product->description)}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">
                            {{ $errors->first('description')}}
                        </span>
                        @endif
                    </div>
                    <button class="btn btn-dark">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
