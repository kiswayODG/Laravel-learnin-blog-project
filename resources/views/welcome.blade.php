@extends('layouts.front')
@section('title', 'Accueil du blog')
@section('content')
    <h1 class="text-3xl text-blue-700 my-8">Bienvenue sur mon super blog</h1>
    <p>Retrouvez des articles de qualité sur des sujets variés qui embelliront vos journées !</p>
    <h2 class="text-2xl my-6">Le dernier article</h2>
    <div class="bg-white shadow w-full sm:w-1/2">
        <h3 class="text-xl text-blue-500">{{ $post->title }}</h3>
        <p>{{ Str::limit($post->content, 10) }}</p>
        <a href="{{ route('posts.show', $post) }}">Lire l'article</a>
    </div>
@endsection
