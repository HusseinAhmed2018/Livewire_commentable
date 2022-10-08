@extends('layouts.app')

@section('content')

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>

    @livewire('comments',['post'=>$post])

@endsection

