<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; 
use App\Repository\UtilisateurRepository;
use App\Entity\Utilisateur;
use App\Form\RegistrationType;
class UtilisateurController extends AbstractController
{
    /**
     * @Route("/utilisateur", name="utilisateur")
     *
     */
    public function index(Request $request, ObjectManager $manager, UtilisateurRepository $utilisateurRepository)
    {
        $listeUtilisateur = $utilisateurRepository->getAllUtilisateur();

        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
            'listeUtilisateur' => $listeUtilisateur,
        ]);
    }

    /**
     * @Route("/utilisateur/add", name="utilisateur_add")
     */

      /*
    public function edit(){
      
        
        $utilisateur = new Utilisateur();
        if($request->request->count()>0){
            $utilisateur->setNom($request->request->get("nom"));
            $utilisateur->setPrenom($request->request->get("prenom"));
            $utilisateur->setDateNaissance( new \DateTime());
            $utilisateur->setCreateAt( new \DateTime());
            $utilisateur->setUpdateAt( new \DateTime());
            $utilisateur->setSexe($request->request->get("genre"));
            $utilisateur->setPassword($request->request->get("motDepasse"));
            $manager->persist($utilisateur);
            $manager->flush($utilisateur);
        }
        
		 
        return $this->render('utilisateur/edit.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
        

    }
    */

    //  public function jsonSend(Request $request, ObjectManager $manager){
    //     if(($request->isXmlHttpRequest()) && $request->getMethod()=='POST'){
    //         $nom = $request->get("nom");
    //         $user = new Utilisateur();

    //         $user->setNom($request->request->get("nom"));
    //         $user->setPrenom($request->request->get("prenom"));
    //         $user->setDateNaissance( new \DateTime());
    //         $user->setCreateAt( new \DateTime());
    //         $user->setUpdateAt( new \DateTime());
    //         $user->setSexe($request->request->get("genre"));
    //         $user->setPassword($request->request->get("motDepasse"));
    //         $manager->persist($user);
    //         $manager->flush($user);
            
    //     }
    //     $rep=[];
    //     return new Response(json_encode($rep));
    // }
    public function edit1(Request $request, ObjectManager $manager){
    	$user = new Utilisateur();
        $form = $this->createForm(RegistrationType::class,  $user);
        $form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid()){
            $manager->persist($user);
            $manager->flush();
            //var_dump(1);exit;
            return $this->redirectToRoute('utilisateur');
        }

    	return $this->render('utilisateur/edit.html.twig', [
    		'formUtilisateur'=>$form->createView()
        ]);
    }
   
}
