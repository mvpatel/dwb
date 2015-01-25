<?php

namespace Acme\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MainBundle\Entity\Pallbearers;
use Acme\MainBundle\Form\PallbearersType;

/**
 * Pallbearers controller.
 *
 */
class PallbearersController extends Controller
{

    /**
     * Lists all Pallbearers entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMainBundle:Pallbearers')->findAll();

        return $this->render('AcmeMainBundle:Pallbearers:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Pallbearers entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pallbearers();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pallbearers_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMainBundle:Pallbearers:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pallbearers entity.
     *
     * @param Pallbearers $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pallbearers $entity)
    {
        $form = $this->createForm(new PallbearersType(), $entity, array(
            'action' => $this->generateUrl('pallbearers_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pallbearers entity.
     *
     */
    public function newAction()
    {
        $entity = new Pallbearers();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMainBundle:Pallbearers:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pallbearers entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:Pallbearers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pallbearers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:Pallbearers:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pallbearers entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:Pallbearers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pallbearers entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:Pallbearers:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pallbearers entity.
    *
    * @param Pallbearers $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pallbearers $entity)
    {
        $form = $this->createForm(new PallbearersType(), $entity, array(
            'action' => $this->generateUrl('pallbearers_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pallbearers entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:Pallbearers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pallbearers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pallbearers_edit', array('id' => $id)));
        }

        return $this->render('AcmeMainBundle:Pallbearers:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pallbearers entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMainBundle:Pallbearers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pallbearers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pallbearers'));
    }

    /**
     * Creates a form to delete a Pallbearers entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pallbearers_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
