<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypeArticleController extends AbstractController
{
    /**
     * @Route("/type/article", name="type_article")
     */
    public function index()
    {
        return $this->render('type_article/index.html.twig', [
            'controller_name' => 'TypeArticleController',
        ]);
    }
}
?>