<?php

namespace Yrdif\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Yrdif\BlogBundle\Entity\ContactRequest;
use Yrdif\BlogBundle\Form\ContactRequestType;

/**
 * ContactRequest controller.
 *
 * @package Yrdif\BlogBundle\Controller
 */
class ContactRequestController extends Controller
{

    /**
     * Lists all ContactRequest entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YrdifBlogBundle:ContactRequest')->findAll();

        return $this->render('YrdifBlogBundle:ContactRequest:index.html.twig', [
            'entities' => $entities,
        ]);
    }
    /**
     * Creates a new ContactRequest entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ContactRequest();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contact-request_show', ['id' => $entity->getId()]));
        }

        return $this->render('YrdifBlogBundle:ContactRequest:new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a ContactRequest entity.
     *
     * @param ContactRequest $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ContactRequest $entity)
    {
        $form = $this->createForm(new ContactRequestType(), $entity, [
            'action' => $this->generateUrl('contact-request_create'),
            'method' => 'POST',
        ]);

        $form->add('submit', 'submit', ['label' => 'Create']);

        return $form;
    }

    /**
     * Displays a form to create a new ContactRequest entity.
     *
     */
    public function newAction()
    {
        $entity = new ContactRequest();
        $form   = $this->createCreateForm($entity);

        return $this->render('YrdifBlogBundle:ContactRequest:new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a ContactRequest entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YrdifBlogBundle:ContactRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactRequest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YrdifBlogBundle:ContactRequest:show.html.twig', [
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing ContactRequest entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YrdifBlogBundle:ContactRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactRequest entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YrdifBlogBundle:ContactRequest:edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a ContactRequest entity.
    *
    * @param ContactRequest $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ContactRequest $entity)
    {
        $form = $this->createForm(new ContactRequestType(), $entity, [
            'action' => $this->generateUrl('contact-request_update', ['id' => $entity->getId()]),
            'method' => 'PUT',
        ]);

        $form->add('submit', 'submit', ['label' => 'Update']);

        return $form;
    }
    /**
     * Edits an existing ContactRequest entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YrdifBlogBundle:ContactRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactRequest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contact-request_edit', ['id' => $id]));
        }

        return $this->render('YrdifBlogBundle:ContactRequest:edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }
    /**
     * Deletes a ContactRequest entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YrdifBlogBundle:ContactRequest')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContactRequest entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contact-request'));
    }

    /**
     * Creates a form to delete a ContactRequest entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact-request_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
        ;
    }
}
