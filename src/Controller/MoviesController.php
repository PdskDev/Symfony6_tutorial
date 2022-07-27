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
    public function index(): Response
    {
       $repository = $this->em->getRepository(Movie::class);
       //$movies = $repository->findAll();
       //$movie = $repository->find(7);
       //$movie = $repository->findBy([], ['id' => 'DESC']);
       //$movies = $repository->findOneBy(['id' => 7, 'title'=>'Batman'], ['id' => 'DESC']);
       //$movies = $repository->count(['id' => 7]);
       $movies = $repository->getClassName();
       
       //dd($movies);

       return $this->render('movies/index.html.twig');
    }
    
    
    
}