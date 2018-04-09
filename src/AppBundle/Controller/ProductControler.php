<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Produit;
use AppBundle\Form\ProduitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductControler extends Controller
{
    /**
     * @Route("/add", name="addproduct")
     */
    public function addProduit(Request $request)
    {
        //creer un produit
        $produit=new Produit();
        //on recupere le formulaire
        $form=$this->createform(ProduitType::class,$produit);
        //on relie l'objet géré par le formulaire à la requéte envoyé lorsqu'on soumet le formulaire 
        $form->handleRequest($request);
        //si le formulaire a été soumis
        if($form->isSubmitted()){
            //on enregistre le produit dans la base de données
            $en=$this->getDoctrine()->getManager();
            //préparer l'object pour l'insérer dans la base de données
            $en->persist($produit);
            $en->flush();
            return new Response('produit ajouté !');
        }
        //on genére le HTML formulaire
        $formview=$form->createview();
        //on rend la vue
        return $this->render('productAdd.html.twig',array('form'=>$formview));

    }
    //public function affichArticle($id){
        
        //$article=$this->getDoctrine()
        //getrepository un dépot qui contient les réquétes sql
        //appel à la methode getrepository
        //->getrepository("AppBundleProduit")->find($id);
        //if(!$article){
            //throw $this->createNotfoundexception("aucun produit ne correspond à l'id".$id);}
        //return new Response($article->getNom());}
    /**
    * @Route("/list",name="product_list")
    */
    public function prlisterAction(){
        //doctrine gére les interactions avec la base de données
        //on récupére l'object doctrine
         $repository=$this->getDoctrine()->getrepository("AppBundle:Produit");
         $products=$repository->findAll();
         return $this->render('produitlist.html.twig',array('products'=>$products));
    }
    /**
    * @return Response
    *
    * @Route("/edit/{id}",name="product_edit")
    */
    public function edit(Request $request,Produit $produit){
        $form=$this->createform(ProduitType::class,$produit);
        //on relie l'objet géré par le formulaire à la requéte envoyé lorsqu'on soumet le formulaire 
        $form->handleRequest($request);
        //si le formulaire a été soumis
        if($form->isSubmitted()){

            $en=$this->getDoctrine()->getManager();
            //inutile puisque provient de la base de données
            //$en->persist($produit);
            $en->flush();
            return new Response('produit modifié !');
        }
        //on genére le HTML formulaire
        $formview=$form->createview();
        //on rend la vue
        return $this->render('productAdd.html.twig',array('form'=>$formview));

    }
}
