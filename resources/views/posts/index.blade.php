@extends('layouts.front')
@section('title', 'La liste des posts de mon super blog')
@section('content')
    <h1 class="text-3xl text-blue-700 my-8">Les articles</h1>
    <p>Tous les articles sont ici, profitez-en ;)</p>
    @foreach($posts as $post)
	    <div class="bg-white shadow w-full sm:w-1/2">
	        <h3 class="text-xl text-blue-500">{{ $post->title }}</h3>
	        <p>{{ Str::limit($post->content, 10) }}</p>
	        <a href="{{ route('posts.show', $post) }}">Lire l'article</a>
	    </div>
	@endforeach
@endsection
