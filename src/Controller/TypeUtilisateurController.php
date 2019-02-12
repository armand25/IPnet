<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypeUtilisateurController extends AbstractController
{
    /**
     * @Route("/type/utilisateur", name="type_utilisateur")
     */
    public function index()
    {
        return $this->render('type_utilisateur/index.html.twig', [
            'controller_name' => 'TypeUtilisateurController',
        ]);
    }
}
