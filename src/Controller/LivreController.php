<?php
namespace App\Controller;

use App\Entity\Livre;
use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/livre', name: 'app_livre_')]
class LivreController extends AbstractController
{
    #[Route('', name: 'liste')]
    public function liste(EntityManagerInterface $entityManager): Response
    {
        $livres = $entityManager
            ->getRepository(Livre::class)
            ->findAll();

        return $this->render('livre/index.html.twig', [
            'livres' => $livres,
        ]);
    }

    #[Route('/detail/{id<\d+>}', name: 'detail')]
    public function detail(int $id, EntityManagerInterface $entityManager): Response
    {
        $livre = $entityManager
            ->getRepository(Livre::class)
            ->find($id);

        if (!$livre) {
            throw $this->createNotFoundException("Aucun livre avec l'id " . $id);
        }

        return $this->render('livre/detail.html.twig', [
            'livre' => $livre,
        ]);
    }

    #[Route('/ajouter', name: 'ajouter')]
    public function ajouter(EntityManagerInterface $entityManager): Response
    {
        $auteur1 = new Auteur();
        $auteur1->setNom('Oda');
        $auteur1->setPrenom('Eiichirō');

        $auteur2 = new Auteur();
        $auteur2->setNom('Rowling');
        $auteur2->setPrenom('J.K.');

        $livre1 = new Livre();
        $livre1->setTitre('One Piece');
        $livre1->setAnnee(1997);
        $livre1->setAuteur($auteur1);

        $livre2 = new Livre();
        $livre2->setTitre('Harry Potter à l\'école des sorciers');
        $livre2->setAnnee(1997);
        $livre2->setAuteur($auteur2);

        $livre3 = new Livre();
        $livre3->setTitre('Harry Potter et la chambre des secrets');
        $livre3->setAnnee(2002);
        $livre3->setAuteur($auteur2);

        $entityManager->persist($auteur1);
        $entityManager->persist($auteur2);
        $entityManager->persist($livre1);
        $entityManager->persist($livre2);
        $entityManager->persist($livre3);
        $entityManager->flush();

        return new Response('Les livres ont été ajoutés !');
    }
}