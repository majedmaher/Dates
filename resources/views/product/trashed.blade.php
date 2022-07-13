
@extends('layouts.app')

@php
    $count = 0;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Title</th>
                    <th scope="col"> Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                    <tr>
                      <th scope="row">{{++$count}}</th>
                      <td><img width="150px" src="{{URL::asset($product->photo)}}" alt="{{$product->photo}}"></td>
                      <td>{{$product->title}}</td>
                      <td>{{$product->created_at->diffForhumans() }}</td>
                      <td>
                        <a  class="text-success" href="{{route('product.restore',['id'=> $product->id])}}"> <i class="fas fa-2x fa-undo"></i> </a> &nbsp;&nbsp;
                        <a class="text-danger" href="{{route('product.hdelete',['id'=> $product->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>

                      </td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
              
              
        </div>
    </div>
</div>

@endsection