<?php
namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Adresse;
use App\Form\Type\EmployeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/employe', name: 'app_employe_')]
class EmployeController extends AbstractController
{
    #[Route('/ajout', name: 'ajout')]
    public function ajout(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adresse = new Adresse();
        $employe = new Employe();
        $employe->setAdresse($adresse);

        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adresse);
            $entityManager->persist($employe);
            $entityManager->flush();
            return $this->redirectToRoute('app_employe_succes');
        }

        return $this->render('employe/ajout.html.twig', [
            'mon_formulaire' => $form,
        ]);
    }

    #[Route('/succes', name: 'succes')]
    public function succes(): Response
    {
        return $this->render('employe/succes.html.twig');
    }
}