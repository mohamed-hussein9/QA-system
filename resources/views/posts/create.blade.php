@extends('layouts.app')

@section('content')
<div class="jumbotron container">
  <h1>Create Question</h1>
  <p>Q & A</p>
</div>
<div class="container">
    <form action="{{Route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label >Title : </label>
            <input type="text" name="title" class="form-control" placeholder="Title" >
        </div>
        <div class="form-group">
            <label for="pwd">Question</label>
            <textarea name="body" class="form-control" ></textarea>
        </div>
         <div class="form-group">
            <label >Photo : </label>
            <input type="file" name="photo" class="form-control" placeholder="Title" >
        </div>

        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>



@endsection
