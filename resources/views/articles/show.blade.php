@extends("layouts.app")
@section("title", $article->title)


@section("content")
    <img src="{{ asset('storage/'.$article->picture) }}" alt="Image de couverture" style="max-width: 300px;"  class="image">
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>
    <div>{{ $article->price  }}</div>
    <div>{{ $article->qte  }}</div>
    <button type="submit" class="btn btn-dark">Ajoute au panier</button>
@endsection




