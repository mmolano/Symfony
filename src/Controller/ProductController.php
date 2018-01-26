<?php

namespace App\Controller;




use App\Entity\Product;
use App\Form\produitType;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    /**
     * @Route("/Add/{id}", name="Add_Produit")
     *
     * @param Request $request
     *
     * @param Product $produit
     * @return Response
     */
    public function buyProduit(Request $request, Product $produit)
    {

        $form = $this->get('form.factory')->createBuilder(FormType::class)
            ->add('Amout', TextType::class)
            ->add('buy', SubmitType::class)
            ->getForm()
        ;

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $nbr = $form->get('achat')->getData();
            $achat_max = $produit->getAchatMax('achat');
            $stock = $produit->getStock('stock');
            $this->addFlash('success', 'Purchase done!');
            if($nbr > $achat_max)
            {
                return $this->render('produit/buy.html.twig', array('nbr' => $nbr, 'form' => $form->createView()));

            }
            if($nbr <= $stock)
            {
                $stock -= $nbr;
                $produit->setStock($stock);
                $em = $this->getDoctrine()->getManager();
                $em->persist($produit);
                $em->flush();
            }
            else
            {
                return $this->render('produit/buy.html.twig', array('stock' => 'stock', 'form' => $form->createView()));
            }
            return $this->render('produit/buy.html.twig', array('form' => $form->createView()));
        }
        return $this->render('produit/buy.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/show/{id}", name="showproduct")
     *
     * @return Response
     */
   public function showproduct($id){


       $product = $this->getDoctrine()
           ->getRepository(Product::class)
           ->find($id);

       if (!$product) {
           throw $this->createNotFoundException(
               'No product found for id '.$id
           );
       }


       dump($product);

       return $this->render('produit/show.html.twig', array('product'=>$product));

   }


}