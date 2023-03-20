@extends('layouts.app')
@section('content')
    <div class="bg-black flex justify-center">
        <img class="h-screen " src="{{url('/img/bg-image.jpg')}}" alt="Pc">
        <div class="">
            <h1 class="text-white text-3xl font-bold mb-24 mt-10">Bienvenue chez Come'puters !</h1>
            <p class="text-white text-xl text-justify mr-3">
                Si vous cherchez un ordinateur puissant pour pouvoir profiter pleinement
                de tous les derniers jeux, sachez que vous êtes au bon endroit.<br/>
                Nous avons pensés à tous les budgets possibles, nos prix varient
                entre 300€ et 1500€ donc nous sommes persuadés que vous trouverez votre
                bonheur ici.
            </p>
        </div>
    </div>
    <div>
        <div>
            <div>
                <img class="w-40" src="{{url('/img/bg-image.jpg')}}" alt="Pc">
            </div>
            <div>
                {{-- @foreach ($article as $article)
                    <a href="">{{ $article->title }}</a>
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection