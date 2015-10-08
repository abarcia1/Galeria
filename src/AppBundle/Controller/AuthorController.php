<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 08/10/2015
 * Time: 18:17
 */
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Recipe;
use AppBundle\Entity\Author;
use AppBundle\Entity\Ingredient;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\Type\AuthorType;

class AuthorController extends Controller
{
    /**
     * @Route("/authors/create", name="create_author")
     */
    public function createAction(Request $request)
    {
        $author = new Author;

        $form = $this->createForm(new AuthorType, $author);

        $form->handleRequest($request);

        if ($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();
        }

        // replace this example code with whatever you need
        return $this->render('author.html.twig', array('form' => $form->createView()));
    }
}