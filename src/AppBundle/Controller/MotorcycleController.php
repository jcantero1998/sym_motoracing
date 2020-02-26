<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Motorcycle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Motorcycle controller.
 *
 * @Route("motorcycle")
 */
class MotorcycleController extends Controller
{
    /**
     * Lists all motorcycle entities.
     *
     * @Route("/", name="motorcycle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        // Get all the offers published by the logged employer
        //$loggedin_username = $request->getSession()->get(Security::LAST_USERNAME);

        $motorcycles = $em->getRepository('AppBundle:Motorcycle')->findAll();

        return $this->render('motorcycle/index.html.twig', array(
            'motorcycles' => $motorcycles,
        ));
    }

    /**
     * Creates a new motorcycle entity.
     *
     * @Route("/new", name="motorcycle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $motorcycle = new Motorcycle();
        $form = $this->createForm('AppBundle\Form\MotorcycleType', $motorcycle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($motorcycle);
            $em->flush();

            return $this->redirectToRoute('motorcycle_show', array('id' => $motorcycle->getId()));
        }

        return $this->render('motorcycle/new.html.twig', array(
            'motorcycle' => $motorcycle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a motorcycle entity.
     *
     * @Route("/{id}", name="motorcycle_show")
     * @Method("GET")
     */
    public function showAction(Motorcycle $motorcycle)
    {
        $deleteForm = $this->createDeleteForm($motorcycle);

        return $this->render('motorcycle/show.html.twig', array(
            'motorcycle' => $motorcycle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing motorcycle entity.
     *
     * @Route("/{id}/edit", name="motorcycle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Motorcycle $motorcycle)
    {
        $deleteForm = $this->createDeleteForm($motorcycle);
        $editForm = $this->createForm('AppBundle\Form\MotorcycleType', $motorcycle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('motorcycle_edit', array('id' => $motorcycle->getId()));
        }

        return $this->render('motorcycle/edit.html.twig', array(
            'motorcycle' => $motorcycle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a motorcycle entity.
     *
     * @Route("/{id}", name="motorcycle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Motorcycle $motorcycle)
    {
        $form = $this->createDeleteForm($motorcycle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($motorcycle);
            $em->flush();
        }

        return $this->redirectToRoute('motorcycle_index');
    }

    /**
     * Creates a form to delete a motorcycle entity.
     *
     * @param Motorcycle $motorcycle The motorcycle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Motorcycle $motorcycle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('motorcycle_delete', array('id' => $motorcycle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
