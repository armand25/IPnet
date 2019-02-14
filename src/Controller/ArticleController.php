<?php
namespace App\Controller;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Article;
// use App\Form\ArticleType;
class ArticleController extends AbstractController
{
	/**
	 * @Route("/article", name="article")
	 */
	public function index(ArticleRepository $repo){
    	$articles = $repo->findAll();

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles,
        ]);
    }
	/**
     * @Route("/article/new", name="create_new")
     * @Route("/article/{id}/edit", name="modifier")
     */
    public function form_art(Article $article=null, Request $request, ObjectManager $manager)
    {
        if(!$article){
    	   $article = new Article();
        }
    	$form = $this->createFormBuilder($article)
    				 ->add('titre')
                     ->add('contenu')
    				 ->getForm();
    	$form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) 
        {
            if(!$article->getId()){
                $article->setCreateAt(new \DateTime());
            }

            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('vue_article', ['id' => $article->getId()]);
        }

    	return $this-> render('article/edit.html.twig', [
            'formArticle'=>$form->createView(),
            'controller_name' => 'ArticleController',
            'editMode' => $article->getId() !== null
        ]);
    }
	/**
	 * @Route("/article/add", name="add_article")
	 */
	public function edit(Request $request, ObjectManager $manager)
	{
		// echo($request); 
		$article = new Article();
		$article->setTitre($request->$request->$get("titre"));
		$article->setContenu($request->$request->$get("contenu"));
		$article->setEtat($request->$request->$get("etat"));
		$manager->persist($article);
		$manager->flush($article);
		
		return $this->render('article/edit.html.twig', [
			'controller_name' => 'ArticleController',
		]);
	}
	/**
	 * @Route("/article/add2", name="add_article2")
	 */
	public function edit_with_make_form(Request $request, ObjectManager $manager, ArticleRepository $repArticle)
	{ 
		// $article = new Article();
		$article = $repArticle->find(1);
		$form = $this->createForm(ArticleType::class, $article);//['key' => value]
		$form->handleRequest($request);
		if($form->isSubmitted()){
			$manager->persist($article);
			$manager->flush($article);
			$this->redirectToRoute('article');
		}
		
		
		return $this->render('article/edit2.html.twig', [
			'controller_name' => 'ArticleController', 'formArticle' => $form->createView(),
		]);
	}
	/**
	 * @Route("/article/ajax", name="article_ajax")
	 */
	public function test_ajax(Request $request, ObjectManager $manager)
	{
		if(($request->isXmlHttpRequest()) && ($request->getMethod() == 'POST'))
		{
			return new Response(json_encode(["OK"]));
		}
		return $this->render('article/test.html.twig', [
			'controller_name' => 'ArticleController',
		]);
	}
	/**
     * @Route("/article/{id}", name="vue_article")
     */
    public function rendu(Article $article)
    {
    	return $this->render('article/rendu.html.twig', ['article'=>$article]);
    }
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
    	return $this->render('article/add.html.twig');
    }
}