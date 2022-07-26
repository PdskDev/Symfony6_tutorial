<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'movies_index')]
    public function index(): Response
    {
        $movies = [
            "Avengers: Endgame",
            "James Bond",
            "La 7e compagnie",
            "Star War",
            "Spiderman",
            "Black Panther"

        ];

       return $this->render('index.html.twig', array('movies' => $movies));
    }
    
    
}