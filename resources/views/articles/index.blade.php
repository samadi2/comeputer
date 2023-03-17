@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-10 mt-3">
            <h2 class="titre">Blog</h2>
        </div>
    </div>

<hr>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



<div class="container mt-3">
    <div class="row">
        @foreach ($article as $index => $article)
        <div class="col-md-4">
            <div class="card card-body">
                <h2>
                    {{ $article->title }}
                </h2>
            <p>Ecrit par: {{ Auth::user()->name }}| date: {{ $article->created_at }}</p>
            <a href="{{ url('articles/'. $article->id) }}" class="btn btn-outline-primary">En savoir plus</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection