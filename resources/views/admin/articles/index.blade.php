
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<div>

    <div class="col-lg-10 mt-3">
        <h2 class="titre">Blog</h2>
    </div>

    <div class="col-lg-2 mt-3">
        <a class="btn btn-success" href="{{ url('admin/articles/create') }}">Ajouter un posts</a>
    </div>

</div>


<h1>Tous les articles</h1>

<p>
    <!-- Lien pour créer un nouvel article : "posts.create" -->
    <a href="{{ route('admin.articles.create') }}" title="Créer un article" >Créer un nouveau post</a>
</p>

<!-- Le tableau pour lister les articles/posts -->
<table border="1" >
    <thead>
        <tr>
            <th>Titre</th>
            <th colspan="2" >Opérations</th>
        </tr>
    </thead>
    <tbody>
        <!-- On parcourt la collection de Post -->
        @foreach ($article as $articles)
        <tr>
            <td>
                <!-- Lien pour afficher un Post : "posts.show" -->
                <a href="{{ route('articles.show'. $article) }}" title="Lire l'article" >{{ $articles->title }}</a>
            </td>
            <td>
                <!-- Lien pour modifier un Post : "posts.edit" -->
                <a href="{{ route('admin.articles.edit', $article) }}" title="Modifier l'article" >Modifier</a>
            </td>
            <td>
                <!-- Formulaire pour supprimer un Post : "posts.destroy" -->
                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" >
                    <!-- CSRF token -->
                    @csrf
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    @method("DELETE")
                    <input type="submit" value="x Supprimer" >
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

