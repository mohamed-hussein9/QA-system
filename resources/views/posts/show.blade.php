@extends('layouts.app')

@section('content')
<div class="jumbotron container">
  <h1>Show Question</h1>
  <p>{{$post->title}}</p>
</div>
<div class="container">
        <div class="card" style="width:80%;margin:auto;">
            <img class="card-img-top" src="../../uploads/posts/{{$post->photo}}" alt="Card image" style="width:100%">
            <div class="card-body">
            <h4 class="card-title">{{$post->user->name}}</h4>
            <p class="card-text">{{$post->body}}</p>
            <hr>
            @if ($post->comments->count()>0)
            <h4 class="card-title">Comments</h4>

            @foreach ($post->comments as $item)
                <div class="alert alert-info">
                <p class="card-text">-- <strong>{{$item->user->name }} : </strong>{{ $item->body}}</p>
                @if ($item->subComments->count()>0)
                <div class="show_replys">show replys </div>
                @else
                    <div class="show_replys">Reply </div>
                @endif


                    <div class="subcomments">
                    @foreach ($item->subComments as $subcomment)

                    <div class="alert alert-warning">
                        <p class="card-text">------ <strong> {{$subcomment->user->name }} : </strong>{{ $subcomment->body }}</p>
                    </div>
                    @endforeach
                    <form action="{{route('subcomment.store',['id'=>$item->id])}}" class="reply-form" method="post" >
                        @csrf
                        <div class="form-groub">
                            <input type="text" class="form-control" name="body">&nbsp;
                            <button type="submit" class="btn btn-primary">Reply</button>
                        </div>
                    </form>
                    </div>

                {{-- @if ($item->id ==$item->subComments->comment_id)
                    {{ $item->subComments->body }}
                @endif --}}
                </div>
            @endforeach

            @else
            <h4 class="card-title alert ">No Comments</h4>
            @endif
            <div>
                <p>ADD Comment</p>
                <form action="{{route('comment.store',['id'=>$post->id])}}" method="post" class="">
                    @csrf
                        <div class="form-groub d-flex">
                            <input type="text" class="form-control" name="body">&nbsp;
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
</div>



@endsection
