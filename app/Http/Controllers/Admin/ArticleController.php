<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::all();

        return view('admin.articles.index', compact('article'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.articles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. La validation
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            "picture" => 'bail|required|image|max:1024',
            "content" => 'bail|required',
            "price" => 'bail|required|int|max:1000',
            "qte" => 'bail|required|int|max:10',
        ]);
        
        // 2. On upload l'image dans "/storage/app/public/posts"
        $chemin_image = $request->picture->store("articles");
        
        // 3. On enregistre les informations du Post
        Article::create([
            "title" => $request->title,
            "picture" => $chemin_image,
            "content" => $request->content,
            "price" => $request->price,
            "qte" => $request->qte,
        ]);
        
        // 4. On retourne vers tous les posts : route("posts.index")

        return redirect(route("articles.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view("articles.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view("admin.articles.edit", compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // 1. La validation

        // Les règles de validation pour "title" et "content"
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required'
        ];

        // Si une nouvelle image est envoyée
        if ($request->has("picture")) {
            // On ajoute la règle de validation pour "picture"
            $rules["picture"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        // 2. On upload l'image dans "/storage/app/public/articles"
        if ($request->has("picture")) {

            //On supprime l'ancienne image
            Storage::delete($article->picture);

            $chemin_image = $request->picture->store("articles");
        }

        // 3. On met à jour les informations du Post
        $article->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $article->picture,
            "content" => $request->content,
            "price" => $request->price,
            "qte" => $request->qte,

        ]);

        // 4. On affiche le Post modifié : route("articles.show")
        return redirect(route("articles.show", $article));

        return redirect()->route('admin.articles.index')->with('success', 'L\'article a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Storage::delete($article->picture);

        
        $article->delete();
        
        
        return redirect()->route('admin.articles.index')->with('success', 'L\'article a été supprimé');
    }
}
