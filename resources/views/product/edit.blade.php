
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
        
        <form action="{{route('product.update',['id'=> $product->id])}}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">Title  </label>
                <input type="text" name="title" class="form-control" value="{{$product->title}}"  >
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlTextarea1">description  </label>
                <textarea name="description" id="summernote">{!! $product->description !!}</textarea>
              </div>
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

@section('styles')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('scripts')
<script>
  $('#summernote').summernote({
    placeholder: 'ادخل محتوى المقالة',
    tabsize: 10,
    height: 100
  });
</script>
  @endsection