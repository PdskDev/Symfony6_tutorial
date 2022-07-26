<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie() ;
        $movie->setTitle('Batman');
        $movie->setReleaseYear(2019);
        $movie->setDescription('Le retour de Batman');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2021/06/18/11/24/batman-6345922_1280.jpg');
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        $manager->persist($movie);

        $movie2 = new Movie() ;
        $movie2->setTitle('Spiderman');
        $movie2->setReleaseYear(2020);
        $movie2->setDescription('Le superhéro sauve NY');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2020/09/11/00/06/spiderman-5561671_1280.jpg');
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);

        $movie3 = new Movie() ;
        $movie3->setTitle('Lego Superman');
        $movie3->setReleaseYear(2021);
        $movie3->setDescription('Le héro ne meurt jamais!');
        $movie3->setImagePath('https://cdn.pixabay.com/photo/2018/08/23/17/16/superman-3626231_1280.jpg');
        $movie3->addActor($this->getReference('actor_5'));
        $movie3->addActor($this->getReference('actor_6'));
        $manager->persist($movie3);

        $manager->flush();
    }
}