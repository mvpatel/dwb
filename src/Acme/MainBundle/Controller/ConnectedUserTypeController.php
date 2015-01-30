<?php

namespace Acme\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MainBundle\Entity\ConnectedUserType;
use Acme\MainBundle\Form\ConnectedUserTypeType;

/**
 * ConnectedUserType controller.
 *
 */
class ConnectedUserTypeController extends Controller
{

    /**
     * Lists all ConnectedUserType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMainBundle:ConnectedUserType')->findAll();

        return $this->render('AcmeMainBundle:ConnectedUserType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ConnectedUserType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ConnectedUserType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('connectedusertype_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMainBundle:ConnectedUserType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ConnectedUserType entity.
     *
     * @param ConnectedUserType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ConnectedUserType $entity)
    {
        $form = $this->createForm(new ConnectedUserTypeType(), $entity, array(
            'action' => $this->generateUrl('connectedusertype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ConnectedUserType entity.
     *
     */
    public function newAction()
    {
        $entity = new ConnectedUserType();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMainBundle:ConnectedUserType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConnectedUserType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ConnectedUserType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConnectedUserType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:ConnectedUserType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ConnectedUserType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ConnectedUserType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConnectedUserType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:ConnectedUserType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ConnectedUserType entity.
    *
    * @param ConnectedUserType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConnectedUserType $entity)
    {
        $form = $this->createForm(new ConnectedUserTypeType(), $entity, array(
            'action' => $this->generateUrl('connectedusertype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ConnectedUserType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ConnectedUserType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConnectedUserType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('connectedusertype_edit', array('id' => $id)));
        }

        return $this->render('AcmeMainBundle:ConnectedUserType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ConnectedUserType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMainBundle:ConnectedUserType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConnectedUserType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('connectedusertype'));
    }

    /**
     * Creates a form to delete a ConnectedUserType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('connectedusertype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
