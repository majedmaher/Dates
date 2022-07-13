
@extends('layouts.app')
{{-- @extends('dashboard.include') --}}

@php
    $count = 0;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-12">
          <div class="card-header"> 
            <h3> Slider </h3>
            <a href="{{route('slider.create')}}">Add Slider</a>
          </div>
          <br> --}}
          

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col"> Date</th>
                    <th scope="col">Events</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                      <th scope="row">{{++$count}}</th>
                      <td><img width="150px" src="{{URL::asset($slider->photo)}}" alt="{{$slider->photo}}"></td>
                      <td>{{$slider->created_at->diffForhumans() }}</td>
                      <td>
                        <a  class="text-success" href="{{route('slider.show',['id'=> $slider->id])}}"> <i class="fas  fa-2x fa-eye"></i> </a>
                        @if ($slider->user_id == Auth::id() || Auth::user()->is_admin == 1)
                        &nbsp;&nbsp;
                        <a href="{{route('slider.edit',['id'=> $slider->id])}}"> <i class="fas fa-2x fa-edit"></i>  </a>&nbsp;&nbsp;
                        <a class="text-danger" href="{{route('slider.destroy',['id'=> $slider->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>
                        @endif

                      </td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
              
              
        </div>
    </div>
</div>

@endsection