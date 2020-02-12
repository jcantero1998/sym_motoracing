<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Motorcycle;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $motos=[];
        $em = $this->getDoctrine()->getManager();
        $motos= $em->getRepository(Motorcycle::class)->findAllActive();
        
        
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'motos'=>$motos,
        ]);
    }
}
