@extends("layouts.app")
@section("content")

<h1 class="text-center text-3xl font-bold">Créer un article</h1>
<section class="ml-10">

	<!-- Le formulaire est géré par la route "admin.articles.store" -->
	<form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" >
	
		<!-- Le token CSRF -->
		@csrf
		
        <div class="">
            <label class="text-lg font-medium" for="picture" >Image</label><br/>
			<input class="bg-noir text-white rounded p-2" type="file" name="picture" id="picture" >
            
			<!-- Le message d'erreur pour "picture" -->
			@error("picture")
			<div>{{ $message }}</div>
			@enderror
        </div>
        <div>
            <label class="text-lg font-medium" for="title" >Titre</label><br/>
            <input class="border-2 border-noir rounded" type="text" name="title" value="{{ old('title') }}"  id="title" placeholder="Le titre de l'article" >

            <!-- Le message d'erreur pour "title" -->
            @error("title")
            <div>{{ $message }}</div>
            @enderror
        </div>
		<div>
			<label class="text-lg font-medium" for="content" >Contenu</label><br/>
			<textarea class="border-2 border-noir rounded" name="content" id="content" lang="fr" rows="3" cols="50" placeholder="Le contenu de l'article" >{{ old('content') }}</textarea>

			<!-- Le message d'erreur pour "content" -->
			@error("content")
			<div>{{ $message }}</div>
			@enderror
        </div>
        <div>
            <label class="text-lg font-medium" for="price" >Prix</label><br/>
            <input class="border-2 border-noir rounded mb-1" type="number" name="price" id="price">

            <!-- Le message d'erreur pour le "prix" -->
            @error("price")
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="text-lg font-medium" for="qte">Quantité</label>
            <select class="border-2 border-noir rounded" id="qte" name="qte" >
                <!-- Les options -->
                <option value="1" >1</option>
                <option value="2" >2</option>
                <option value="3" >3</option>
                <option value="4" >4</option>
                <option value="5" >5</option>
                <option value="6" >6</option>
                <option value="7" >7</option>
                <option value="8" >8</option>
                <option value="9" >9</option>
                <option value="10" >10</option>
            </select>

            <!-- Le message d'erreur pour le "prix" -->
            @error("qte")
            <div>{{ $message }}</div>
            @enderror
        </div>

		<input class="bg-noir mb-0 text-white px-2 py-0.5 rounded" type="submit" name="valider" value="Valider" >

	</form>
</section>


@endsection