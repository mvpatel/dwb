<?php

namespace Acme\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MainBundle\Entity\Support;
use Acme\MainBundle\Form\SupportType;

/**
 * Support controller.
 *
 */
class SupportController extends Controller
{

    /**
     * Lists all Support entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMainBundle:Support')->findAll();

        return $this->render('AcmeMainBundle:Support:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Support entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Support();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('support_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMainBundle:Support:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Support entity.
     *
     * @param Support $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Support $entity)
    {
        $form = $this->createForm(new SupportType(), $entity, array(
            'action' => $this->generateUrl('support_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Support entity.
     *
     */
    public function newAction()
    {
        $entity = new Support();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMainBundle:Support:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Support entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:Support')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Support entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:Support:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Support entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:Support')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Support entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMainBundle:Support:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Support entity.
    *
    * @param Support $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Support $entity)
    {
        $form = $this->createForm(new SupportType(), $entity, array(
            'action' => $this->generateUrl('support_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Support entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMainBundle:Support')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Support entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('support_edit', array('id' => $id)));
        }

        return $this->render('AcmeMainBundle:Support:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Support entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMainBundle:Support')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Support entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('support'));
    }

    /**
     * Creates a form to delete a Support entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('support_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
