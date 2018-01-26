<?php

namespace App\Controller;


use App\Entity\Product;
use App\Form\produitType;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{



    /**
     * @Route("/", name="Buy_Produit")
     *
     * @return Response
     */
    public function produit_listeAction($offset = 0){
        $Repertoire = $this->getDoctrine()->getRepository('App:Product');

        $produit = $Repertoire->findAll($offset, 2);

        return $this->render('homepage.html.twig', array(
            'produits'=>$produit

        ));

    }




}