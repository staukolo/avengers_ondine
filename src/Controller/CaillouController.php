<?php

namespace App\Controller;

use App\Entity\Caillou;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/caillou', name: 'app_caillou_')]
class CaillouController extends AbstractController
{
    #[Route('/faune', name: 'faune')]
    public function faune(EntityManagerInterface $entityManager): Response
    {
        $caillou = $entityManager
            ->getRepository(Caillou::class)
            ->findBy(['categorie' => 'faune']);

        return $this->render('caillou/liste.html.twig', [
            'caillou' => $caillou,
            'categorie' => 'Faune',
        ]);
    }

    #[Route('/flore', name: 'flore')]
    public function flore(EntityManagerInterface $entityManager): Response
    {
        $caillou = $entityManager
            ->getRepository(Caillou::class)
            ->findBy(['categorie' => 'flore']);

        return $this->render('caillou/liste.html.twig', [
            'caillou' => $caillou,
            'categorie' => 'Flore',
        ]);
    }

    #[Route('/ajouter', name: 'ajouter')]
    public function ajouter(EntityManagerInterface $entityManager): Response
    {
        // Faune
        $c1 = new Caillou();
        $c1->setNom('Caillou 1');
        $c1->setDescription('Un caillou rare qui est un peu vert');
        $c1->setPhoto('caillou1.jpg');
        $c1->setCategorie('faune');

        $c2 = new Caillou();
        $c2->setNom('Caillou 2');
        $c2->setDescription('je suis un caillou');
        $c2->setPhoto('caillou2.jpg');
        $c2->setCategorie('faune');

        // Flore
        $c3 = new Caillou();
        $c3->setNom('Caillou 3');
        $c3->setDescription('un caillou très très blanc');
        $c3->setPhoto('caillou3.jpg');
        $c3->setCategorie('flore');

        $c4 = new Caillou();
        $c4->setNom('Caillou 4');
        $c4->setDescription('je suis un caillou joliement décoré');
        $c4->setPhoto('caillou4.jpg');
        $c4->setCategorie('flore');

        $entityManager->persist($c1);
        $entityManager->persist($c2);
        $entityManager->persist($c3);
        $entityManager->persist($c4);
        $entityManager->flush();

        return new Response('Les caillou ont été ajoutés !');
    }
}