<?php

namespace Acme\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MainBundle\Entity\ArrivalFuneral;
use Acme\MainBundle\Form\ArrivalFuneralType;

/**
 * ArrivalFuneral controller.
 *
 */
class ArrivalFuneralController extends Controller
{

    /**
     * Lists all ArrivalFuneral entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMainBundle:ArrivalFuneral')->findAll();

        return $this->render('AcmeMainBundle:ArrivalFuneral:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ArrivalFuneral entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ArrivalFuneral();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('arrivalfuneral_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMainBundle:ArrivalFuneral:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ArrivalFuneral entity.
     *
     * @param ArrivalFuneral $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ArrivalFuneral $entity)
    {
        $form = $this->createForm(new ArrivalFuneralType(), $entity, array(
            'action' => $this->generateUrl('arrivalfuneral_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ArrivalFuneral entity.
     *
     */
    public function newAction()
    {
        $entity = new ArrivalFuneral();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMainBundle:ArrivalFuneral:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ArrivalFuneral entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ArrivalFuneral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArrivalFuneral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:ArrivalFuneral:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ArrivalFuneral entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ArrivalFuneral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArrivalFuneral entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:ArrivalFuneral:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ArrivalFuneral entity.
    *
    * @param ArrivalFuneral $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ArrivalFuneral $entity)
    {
        $form = $this->createForm(new ArrivalFuneralType(), $entity, array(
            'action' => $this->generateUrl('arrivalfuneral_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ArrivalFuneral entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:ArrivalFuneral')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArrivalFuneral entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('arrivalfuneral_edit', array('id' => $id)));
        }

        return $this->render('AcmeMainBundle:ArrivalFuneral:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ArrivalFuneral entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMainBundle:ArrivalFuneral')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ArrivalFuneral entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('arrivalfuneral'));
    }

    /**
     * Creates a form to delete a ArrivalFuneral entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('arrivalfuneral_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
