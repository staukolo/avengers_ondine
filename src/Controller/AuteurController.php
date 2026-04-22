<?php
namespace App\Controller;

use App\Entity\Auteur;
use App\Form\Type\AuteurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/auteur', name: 'app_auteur_')]
class AuteurController extends AbstractController
{
    #[Route('/ajout', name: 'ajout')]
    public function ajout(Request $request, EntityManagerInterface $entityManager): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('app_auteur_ajout_succes');
        }

        return $this->render('auteur/ajout.html.twig', [
            'mon_formulaire' => $form,
        ]);
    }

    #[Route('/ajout/succes', name: 'ajout_succes')]
    public function ajoutSucces(): Response
    {
        return $this->render('auteur/ajout_succes.html.twig');
    }
}