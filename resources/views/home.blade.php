@extends('layouts.app')

@section('content')


<div class="container">
    @if(Session::has('flash_error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('flash_error') }}
    </div>
@endif


@if(Session::has('flash_success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('flash_success') }}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Feeds') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" style="padding: 10px">
                        @forelse ($posts as $post )
                            <?php


                            ?>
                            <div class="card col-md-12">
                                <img src="{{ asset('images/avatar.jpg') }}" class="card-img-top" alt="..." style="width: 100px; height:100px">
                                <div class="card-body">
                                    <h5 class="card-title">{{@$post->user->name}}</h5>
                                    <p class="card-text">{{$post->description}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <span data-id="{{$post->id}}" class="post-like" id="post_like_{{$post->id}}"> <i class="{{(array_search(Auth::user()->id, array_column($post->postliked->toArray(), 'user_id')) !== FALSE)?  'fa-solid': 'fa-regular'}} fa-heart icon_{{$post->id}}"> {{ $post->postliked->count() }} </i>  </span>
                                    </div>


                                    <div class="col-md-10">

                                        <div class="panel-group" id="accordion_{{$post->id}}">
                                            <div class="panel" id="panel_{{$post->id}}">
                                                    <span data-toggle="collapse" data-target="#collapseOne_{{$post->id}}" href="#collapseOne_{{$post->id}}" class="comment">
                                                    <i class="fa-regular fa-comment"> {{$post->postcomment->count()}}</i>
                                                    </span>

                                                        <div id="collapseOne_{{$post->id}}" class="collapse" data-parent="accordion_{{$post->id}}">
                                                            @foreach ($post->postcomment as $comment )
                                                            <p> <span><b>{{@$comment->user->name}}</b></span> {{$comment->comments}}</p>
                                                            @endforeach

                                                             <form method="POST" action="{{ route('commentpost') }}">
                                                                @csrf
                                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                                <div class="row mb-3">

                                                                    <div class="col-md-6">
                                                                       <textarea name="comments" class="form-control" required></textarea>
                                                                        @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-0">
                                                                    <div class="col-md-8">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            {{ __('Send') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                            </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="card col-md-4">
                                <p>No Feeds</p>
                            </div>
                         @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
