@extends('layouts.app')

@section('content')
<div class="jumbotron container">
  <h1>All Questions</h1>
  <p>Q & A</p>
</div>

@if ($posts->count()>0)
<div class="container">
    <div class="row">
@foreach ($posts as $item)

        <div class="card col-lg-4 col-md-6 col-12" >
            <img class="card-img-top" src="uploads/posts/{{$item->photo}}" alt="Card image" style="width:100%">
            <div class="card-body">
            <h4 class="card-title">{{$item->user->name}}</h4>
            <p class="card-text">{{$item->body}}</p>
            <a href="{{route('post.show',['id'=>$item->id])}}" class="btn btn-primary">open</a>
            <a href="{{route('post.destroy',['id'=>$item->id])}}" class="btn btn-primary">delete</a>
            <a href="{{route('post.edit',['id'=>$item->id])}}" class="btn btn-primary">edit</a>
            </div>
        </div>


@endforeach
    </div>

 </div>
@else
<div class="container">
    <div class="alert alert-danger text-center"><h3>No Questions</h3></div>
</div>
@endif

@endsection
