<?php
namespace App\Controller;

use App\Entity\Marquepage;
use App\Entity\MotCle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MarquepageController extends AbstractController
{
    #[Route('/marquepages', name: 'app_marquepages')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $marquepages = $entityManager
            ->getRepository(Marquepage::class)
            ->findAll();

        return $this->render('marquepage/index.html.twig', [
            'marquepages' => $marquepages,
        ]);
    }

/*   #[Route('/marquepages/ajouter', name: 'app_marquepages_ajouter')]
     public function ajouter(EntityManagerInterface $entityManager): Response
    {
        $mp1 = new Marquepage();
        $mp1->setUrl('https://symfony.com');
        $mp1->setDateCreation(new \DateTime());
        $mp1->setCommentaire('Le site officiel de Symfony');

        $mp2 = new Marquepage();
        $mp2->setUrl('https://www.qwant.com');
        $mp2->setDateCreation(new \DateTime());
        $mp2->setCommentaire('Moteur de recherche Qwant');

        $mp3 = new Marquepage();
        $mp3->setUrl('https://www.github.com');
        $mp3->setDateCreation(new \DateTime());
        $mp3->setCommentaire('GitHub');

        $entityManager->persist($mp1);
        $entityManager->persist($mp2);
        $entityManager->persist($mp3);

        $entityManager->flush();
        
        return new Response('Les 3 marque-pages ont été sauvegardés en base !');
    } */


    #[Route('/marquepages/ajouter', name: 'app_marquepages_ajouter')]
    public function ajouter(EntityManagerInterface $entityManager): Response
    {

        $mc1 = new MotCle();
        $mc1->setLibelle('Symfony');

        $mc2 = new MotCle();
        $mc2->setLibelle('MVC');

        $mc3 = new MotCle();
        $mc3->setLibelle('PHP');

        $mc4 = new MotCle();
        $mc4->setLibelle('Recherche');

        $mc5 = new MotCle();
        $mc5->setLibelle('GitHub');

        $mc6 = new MotCle();
        $mc6->setLibelle('Code');

        $mp1 = new Marquepage();
        $mp1->setUrl('https://symfony.com');
        $mp1->setDateCreation(new \DateTime());
        $mp1->setCommentaire('Le site officiel de Symfony');
        $mp1->addMotCle($mc1);
        $mp1->addMotCle($mc2);
        $mp1->addMotCle($mc3);

        $mp2 = new Marquepage();
        $mp2->setUrl('https://www.qwant.com');
        $mp2->setDateCreation(new \DateTime());
        $mp2->setCommentaire('Moteur de recherche Qwant');
        $mp2->addMotCle($mc4);

        $mp3 = new Marquepage();
        $mp3->setUrl('https://www.github.com');
        $mp3->setDateCreation(new \DateTime());
        $mp3->setCommentaire('GitHub');
        $mp3->addMotCle($mc5);
        $mp3->addMotCle($mc6);

        $entityManager->persist($mc1);
        $entityManager->persist($mc2);
        $entityManager->persist($mc3);
        $entityManager->persist($mc4);
        $entityManager->persist($mc5);
        $entityManager->persist($mc6);
        $entityManager->persist($mp1);
        $entityManager->persist($mp2);
        $entityManager->persist($mp3);
        $entityManager->flush();

        return new Response('Les marque-pages et mots-clés ont été sauvegardés !');
    }

    #[Route('marquepages/detail/{id<\d+>}', name: 'detail')]
    public function detail(int $id, EntityManagerInterface $entityManager): Response
    {
        $marquepage = $entityManager
            ->getRepository(Marquepage::class)
            ->find($id);

        if (!$marquepage) {
            throw $this->createNotFoundException("Aucun marque-page avec l'id " . $id);
        }

        return $this->render('marquepage/detail.html.twig', [
            'marquepage' => $marquepage,
        ]);
    }

}