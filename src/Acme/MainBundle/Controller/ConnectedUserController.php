<?php

namespace Acme\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MainBundle\Entity\ConnectedUser;
use Acme\MainBundle\Form\ConnectedUserType;

/**
 * ConnectedUser controller.
 *
 */
class ConnectedUserController extends Controller
{

    /**
     * Lists all ConnectedUser entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMainBundle:ConnectedUser')->findAll();

        return $this->render('AcmeMainBundle:ConnectedUser:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ConnectedUser entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ConnectedUser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('connecteduser_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMainBundle:ConnectedUser:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ConnectedUser entity.
     *
     * @param ConnectedUser $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ConnectedUser $entity)
    {
        $form = $this->createForm(new ConnectedUserType(), $entity, array(
            'action' => $this->generateUrl('connecteduser_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ConnectedUser entity.
     *
     */
    public function newAction()
    {
        $entity = new ConnectedUser();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMainBundle:ConnectedUser:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConnectedUser entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ConnectedUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConnectedUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:ConnectedUser:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConnectedUser entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ConnectedUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConnectedUser entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:ConnectedUser:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ConnectedUser entity.
    *
    * @param ConnectedUser $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConnectedUser $entity)
    {
        $form = $this->createForm(new ConnectedUserType(), $entity, array(
            'action' => $this->generateUrl('connecteduser_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ConnectedUser entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ConnectedUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConnectedUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('connecteduser_edit', array('id' => $id)));
        }

        return $this->render('AcmeMainBundle:ConnectedUser:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ConnectedUser entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMainBundle:ConnectedUser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConnectedUser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('connecteduser'));
    }

    /**
     * Creates a form to delete a ConnectedUser entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('connecteduser_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
