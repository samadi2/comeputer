@extends("layouts.app")
@section("content")

<section class="flex flex-col  rounded-lg p-4">
<h1>Modifier le article</h1>

<!-- Si nous avons un Post $article -->
@if (isset($article))

<!-- Le formulaire est géré par la route "article.update" -->
<form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data" >

	<!-- <input type="hidden" name="_method" value="PUT"> -->
	@method('PUT')

@else

<!-- Le formulaire est géré par la route "article.store" -->
<form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" >

@endif

	<!-- Le token CSRF -->
	@csrf
	
	<p>
		<label for="title" >Titre</label><br/>

		<!-- S'il y a un $article->title, on complète la valeur de l'input -->
		<input type="text" name="title" value="{{ isset($article->title) ? $article->title : old('title') }}"  id="title" placeholder="Le titre du article" >

		<!-- Le message d'erreur pour "title" -->
		@error("title")
		<div>{{ $message }}</div>
		@enderror
	</p>

	<!-- S'il y a une image $article->picture, on l'affiche -->
	@if(isset($article->picture))
	<p>
		<span>Couverture actuelle</span><br/>
		<img src="{{ asset('storage/'.$article->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
	</p>
	@endif

	<p>
		<label for="picture" >Image</label><br/>
		<input type="file" name="picture" id="picture" >

		<!-- Le message d'erreur pour "picture" -->
		@error("picture")
		<div>{{ $message }}</div>
		@enderror
	</p>
	<p>
		<label for="content" >Contenu</label><br/>

		<!-- S'il y a un $article->content, on complète la valeur du textarea -->
		<textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du article" >{{ isset($article->content) ? $article->content : old('content') }}</textarea>

		<!-- Le message d'erreur pour "content" -->
		@error("content")
		<div>{{ $message }}</div>
		@enderror
	</p>

	<input type="submit" name="valider" value="Valider" >

</form>
</section>


@endsection