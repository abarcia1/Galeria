<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/photos/{id}", defaults={"id": 1}, requirements={
     *     "id": "\d+"
     * })
     */
    public function photosAction($id)
    {
        //Aqui va el c�digo
    }

    /**
     * @Route("/photos/{slug}")
     */
    public function photosNameAction($slug)
    {
       //Aqui va el c�digo
    }
}
