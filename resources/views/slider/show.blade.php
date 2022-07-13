@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"  >
                <img src="{{URL::asset($slider->photo)}}" class="card-img-top" alt="{{$slider->photo}}">
                <div class="card-body">
                <p> Created at:   {{$slider->created_at->diffForhumans() }}</p>
                <p>  Updated at:    {{$slider->updated_at->diffForhumans() }}</p>
                <a href="{{route('slider.edit',['id'=> $slider->id])}}"> <i class="fas fa-2x fa-edit"></i>  </a>&nbsp;&nbsp;
                <a class="text-danger" href="{{route('slider.destroy',['id'=> $slider->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>

    
                    </div>
              </div>
        </div>
    </div>
</div>
@endsection
