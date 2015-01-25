<?php

namespace Acme\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MainBundle\Entity\funeral;
use Acme\MainBundle\Form\funeralType;

/**
 * funeral controller.
 *
 */
class funeralController extends Controller
{

    /**
     * Lists all funeral entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMainBundle:funeral')->findAll();

        return $this->render('AcmeMainBundle:funeral:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new funeral entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new funeral();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('funeral_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMainBundle:funeral:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a funeral entity.
     *
     * @param funeral $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(funeral $entity)
    {
        $form = $this->createForm(new funeralType(), $entity, array(
            'action' => $this->generateUrl('funeral_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new funeral entity.
     *
     */
    public function newAction()
    {
        $entity = new funeral();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMainBundle:funeral:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a funeral entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:funeral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find funeral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:funeral:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing funeral entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:funeral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find funeral entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:funeral:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a funeral entity.
    *
    * @param funeral $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(funeral $entity)
    {
        $form = $this->createForm(new funeralType(), $entity, array(
            'action' => $this->generateUrl('funeral_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing funeral entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:funeral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find funeral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('funeral_edit', array('id' => $id)));
        }

        return $this->render('AcmeMainBundle:funeral:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a funeral entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMainBundle:funeral')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find funeral entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('funeral'));
    }

    /**
     * Creates a form to delete a funeral entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('funeral_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
