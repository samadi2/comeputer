<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Repositories\CartInterfaceRepository;

use App\Models\Article;


class CartController extends Controller
{
    
	protected $cartRepository; // L'instance BasketSessionRepository

    public function __construct (CartInterfaceRepository $cartRepository) {
		dd('salut');
    	$this->cartRepository = $cartRepository;

    }

    # Affichage du panier
    public function show () {
		
    	return view("cart.show"); // resources\views\cart\show.blade.php
    }

    # Ajout d'un produit au panier
    public function add (Article $article, Request $request) {
    	
    	// Validation de la requête

    	// Ajout/Mise à jour du produit au panier avec sa quantité
    	$this->cartRepository->add($article, $request->quantity);

    	// Redirection vers le panier avec un message
    	return redirect()->route("cart.show")->withMessage("Article ajouté au panier");
    }

    // Suppression d'un produit du panier
    public function remove (Article $article) {

    	// Suppression du produit du panier par son identifiant
    	$this->cartRepository->remove($article);

    	// Redirection vers le panier
    	return back()->withMessage("Article retiré du panier");
    }

    // Vider la panier
    public function empty () {

    	// Suppression des informations du panier en session
    	$this->cartRepository->empty();

    	// Redirection vers le panier
    	return back()->withMessage("Panier vidé");

    }
}
