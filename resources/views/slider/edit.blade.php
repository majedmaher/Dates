
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
        @endif
        
        <form action="{{route('slider.update',['id'=> $slider->id])}}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <label for="exampleFormControlInput1">Photo  </label>
                  <input type="file"  name="photo" class="form-control">
                </div>
  
              <div class="form-group">
  
                  <button class="btn btn-danger" type="submit">save</button>
              </div>
  
            </form>


        </div>
    </div>
</div>

@endsection