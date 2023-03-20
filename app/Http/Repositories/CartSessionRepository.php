<?php

namespace App\Http\Repositories;

use App\Models\Article;
use App\Models\Cart;

class CartSessionRepository implements CartInterfaceRepository  {

	# Afficher le panier
	public function show () {
		return view("cart.show"); // resources\views\cart\show.blade.php
	}

	# Ajouter/Mettre à jour un produit du panier
	public function add (Article $article) {		
		$cart = session()->get("cart"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$article_details = [
			'name' => $article->name,
			'price' => $article->price,
		];
		
		$cart[$article->id] = $article_details; // On ajoute ou on met à jour le produit au panier
		session()->put("cart", $cart); // On enregistre le panier
	}

	# Retirer un produit du panier
	public function remove (Article $article) {
		$cart = session()->get("cart"); // On récupère le panier en session
		unset($cart[$article->id]); // On supprime le produit du tableau $cart
		session()->put("cart", $cart); // On enregistre le panier
	}

	# Vider le panier
	public function empty () {
		session()->forget("cart"); // On supprime le panier en session
	}

}

?>