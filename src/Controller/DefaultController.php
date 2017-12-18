<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="homepage")
     */
    public function homepage()
    {
        /*
        return new Response(
            $this->get('twig')->render('homepage.html.twig', [
                'thibaud' => 'He\'s awesome anyway 😎',
            ])
        );
        */
        return $this->render('homepage.html.twig', [
            'thibaud' => 'He\'s awesome anyway 😎',
        ]);
    }
}