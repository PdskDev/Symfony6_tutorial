<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
        
    }

    #[Route('/movies', name: 'movies_index', methods: ['GET'])]
    public function index(): Response
    {   
        return $this->render('movies/index.html.twig', [
            'movies' => $this->movieRepository->findAll()
        ]);
    }

    #[Route('/movies/{id}', name: 'movie_show', methods: ['GET'])]
    public function show($id): Response
    {   
        $movie = $this->movieRepository->find($id);
        
        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }
    
    
    
}