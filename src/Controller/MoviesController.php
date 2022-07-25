<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies/{genre}', name: 'movies_index', defaults:['genre' => null], methods:['GET', 'HEAD'])]
    public function index($genre): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your '.$genre.' controller!',
            'path' => 'src/Controller/MoviesController.php',
        ]);
    }
    
    
}