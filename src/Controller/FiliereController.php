<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Filiere;

class FiliereController extends AbstractController
{
    /**
     * @Route("/filiere", name="filiere")
     */
    public function index()
    {
        return $this->render('filiere/index.html.twig', [
            'controller_name' => 'FiliereController',
        ]);
    }

    /**
     * @Route("/new/filiere", name="new_filiere")
     */
    public function newFiliere(Request $request)
        
    {
        $objetF = new Filiere();
        $Form = $this->createForm(FiliereType::class, $objetF);
        return $this->render('filiere/editFiliere.html.twig', [
            'controller_name' => 'FiliereController', 'FormFiliere' => $Form->createView();
        ]);
    }
}
