@extends('layouts.app')
@section('title', 'Contact')

@section('content')
<div class="flex flex-col items-center">
    <div>
        <div class="mt-5 mb-1">
            <input class="border-2 border-noir rounded" type="text" name="" id="" placeholder="Nom">
            <input class="border-2 border-noir rounded" type="text" name="" id="" placeholder="Prénom">
        </div>
        <div class="mb-1">
            <input class="w-full border-2 border-noir rounded" type="email" name="" id="" placeholder="E-mail">
        </div>
        <div>
            <textarea class="w-full border-2 border-noir rounded" name="" id="" cols="30" rows="10" placeholder="Votre message..."></textarea>
        </div>
    </div>
    <div class="ml-96 mr-7 mt-1">
        <button class="bg-noir mb-0 text-white px-2 py-0.5 rounded" type="submit">Envoyer</button>
    </div>
</div>
@endsection