<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieFormType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository, EntityManagerInterface $em)
    {
        $this->movieRepository = $movieRepository;
        $this->em = $em;
        
    }

    #[Route('/movies', name: 'movies_index', methods: ['GET'])]
    public function index(): Response
    {   
        return $this->render('movies/index.html.twig', [
            'movies' => $this->movieRepository->findAll()
        ]);
    }

    #[Route('/movies/show/{id}', name: 'movie_show', methods: ['GET'])]
    public function show($id): Response
    {   
        $movie = $this->movieRepository->find($id);
        
        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }

    #[Route('movies/create', name:'movie_create')]
    public function create(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieFormType::class, $movie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $newMovie = $form->getData();

            $imagePath = $form->get('imagePath')->getData();

            if ($imagePath) {
                $newFileName = uniqid().'.'.$imagePath->guessExtension();

                try {
                    $imagePath->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads',
                        $newFileName
                    );
                    
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $newMovie->setImagePath('/uploads/'.$newFileName);
            } 

            $this->em->persist($newMovie);
            $this->em->flush();

            return $this->redirectToRoute('movies_index');
        }

        return $this->render('movies/create.html.twig', [
            'form' => $form->createView()
        ]);
        
    }

    
    
    
    
}