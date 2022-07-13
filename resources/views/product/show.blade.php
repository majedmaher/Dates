@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"  >
                <img src="{{URL::asset($product->photo)}}" class="card-img-top" alt="{{$product->photo}}">
                <div class="card-body">
                  <h5 class="card-title">{{$product->title}}</h5>
                  <p class="card-text"> {!! $product->description !!}</p>
                <p> Created at:   {{$product->created_at->diffForhumans() }}</p>
                <p>  Updated at:    {{$product->updated_at->diffForhumans() }}</p>
                <a href="{{route('product.edit',['id'=> $product->id])}}"> <i class="fas fa-2x fa-edit"></i>  </a>&nbsp;&nbsp;
                    
    
                    </div>
              </div>
        </div>
    </div>
</div>
@endsection
