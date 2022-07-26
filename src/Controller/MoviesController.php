<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movies', name: 'movies_index')]
    public function index(EntityManagerInterface $em): Response
    {
       $repository = $em->getRepository(Movie::class);
       $movies = $repository->findAll();
       
       dd($movies);

       return $this->render('index.html.twig');
    }
    
    #[Route('/films', name: 'films')]
    public function listFilm(EntityManagerInterface $em): Response
    {
       $repository = $em->getRepository(Movie::class);
       $movies = $repository->findAll();
       
       dd($movies);

       return $this->render('index.html.twig');
    }
    
}