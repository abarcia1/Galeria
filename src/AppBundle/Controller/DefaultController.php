<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Recipe;
use AppBundle\Entity\Author;
use AppBundle\Entity\Ingredient;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/inicio", name="inicio")
     */
    public function inicioAction(Request $request)
    {

        return $this->render('recipes.html.twig');
    }

    /**
     * @Route("/crear", name="crear")
     */
    public function createAction()
    {
        /*
         * Version1
         $recipe = new Recipe();
        $recipe->setName('Sopa');
        $recipe->setDifficulty(1);
        $recipe->setDescription('Para comer');

        $em = $this->getDoctrine()->getManager();
        $em->persist($recipe);
        $em->flush();

        return new Response('Creada la receta con id' . $recipe->getId());
        */

        $em = $this->getDoctrine()->getManager();

        $author = new Author('Karlos', 'Arguiñano');
        $em->persist($author);

        $ingredient = new Ingredient('Pollo');
        $em->persist($ingredient);
        $recipe = new Recipe('Pollo al pil-pil',1 ,'Deliciosa y economica receta.', $author);
        $em->persist($recipe);

        $recipe->add($ingredient);

        $em->flush();

        return $this->render('recipes.html.twig', array('recipe' => $recipe));


    }


    /**
     * @Route("/photos/{id}", defaults={"id": 1}, requirements={
     *     "id": "\d+"
     * })
     */
    public function photosAction($id)
    {
        //Aqui va el código

    }

    /**
     * @Route("/photos/{slug}")
     */
    public function photosNameAction($slug)
    {
       //Aqui va el código
    }

    /**
     * @Route("/modificar/{id}", name="modificar")
     */
    public function showAction($id)
    {
        $repository =$this->getDoctrine()->getRepository('AppBundle:Recipe');
        $recipe = $repository->findOneByName('Albondigas con patatas');
        $recipe -> setName('Albondigas');
        $this->getDoctrine()->getManager()->flush();

        return new Response('hola');
    }

    /**
     * @Route("/eliminar/{id}", name="eliminar")
     */
    public function deleteAction($id)
    {
        $repository =$this->getDoctrine()->getRepository('AppBundle:Recipe');
        $recipe = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($recipe);
        $em->flush();

        return new Response ('Eliminado' . $id);
    }

    /**
     * @Route("/topchef", name="top_chef")
     */
    public function topChefsAction()
    {
        $repository =$this->getDoctrine()->getRepository('AppBundle:Author');
        $chefs = $repository->findTopChefs();

        return $this->render('topchef.html.twig', array('chefs' => $chefs));

    }

}
