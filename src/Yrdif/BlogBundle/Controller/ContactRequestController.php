<?php

namespace Yrdif\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YrdifBlogBundle:ContactRequest')->findAll();

        return $this->render(
            'YrdifBlogBundle:ContactRequest:index.html.twig',
            [
                'entities' => $entities,
            ]
        );
    }

    /**
     * Creates a new ContactRequest entity.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $entity = new ContactRequest();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            // Commit entity to database.
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            // Send email to the user.
            $mailer = $this->get('mailer');
            $mailer->send(
                $mailer->createMessage()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom(['bot@symblog.fr' => 'Symblog Bot'])
                    ->setTo([$form->get('email')->getData() => $form->get('name')->getData()])
                    ->setBody($form->get('content')->getData())
            );

            // Notify the user
            $request->getSession()->getFlashBag()->add(
                'success',
                'Your request was successfully sent.'
            );

            return $this->redirect($this->generateUrl('contact-request_show', ['id' => $entity->getId()]));
        }

        return $this->render(
            'YrdifBlogBundle:ContactRequest:new.html.twig',
            [
                'entity' => $entity,
                'form'   => $form->createView(),
            ]
        );
    }

    /**
     * Displays a form to create a new ContactRequest entity.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction()
    {
        $entity = new ContactRequest();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'YrdifBlogBundle:ContactRequest:new.html.twig',
            [
                'entity' => $entity,
                'form'   => $form->createView(),
            ]
        );
    }

    /**
     * Finds and displays a ContactRequest entity.
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YrdifBlogBundle:ContactRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactRequest entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'YrdifBlogBundle:ContactRequest:show.html.twig',
            [
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
            ]
        );
    }

    /**
     * Displays a form to edit an existing ContactRequest entity.
     *
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
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

        return $this->render(
            'YrdifBlogBundle:ContactRequest:edit.html.twig',
            [
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ]
        );
    }

    /**
     * Edits an existing ContactRequest entity.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YrdifBlogBundle:ContactRequest')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactRequest entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flgenreush();

            // Notify the user
            $request->getSession()->getFlashBag()->add(
                'success',
                'The contact request has been updated.'
            );

            return $this->redirect($this->generateUrl('contact-request_show', ['id' => $id]));
        } else {
            $request->getSession()->getFlashBag()->add(
                'error',
                'The contact request could not be deleted.'
            );
        }

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * Deletes a ContactRequest entity.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
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

            // Notify the user
            $request->getSession()->getFlashBag()->add(
                'success',
                'The contact request has been deleted.'
            );

            return $this->redirect($this->generateUrl('contact-request'));
        } else {
            $request->getSession()->getFlashBag()->add(
                'error',
                'The contact request could not be deleted.'
            );
        }

        return $this->redirect($request->headers->get('referer'));
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
        $form = $this->createForm(
            new ContactRequestType(),
            $entity,
            [
                'action' => $this->generateUrl('contact-request_create'),
                'method' => 'POST',
            ]
        );

        $form->add('submit', 'submit', ['label' => 'Create']);

        return $form;
    }

    /**
     * Creates a form to edit a ContactRequest entity.
     *
     * @param ContactRequest $entity The entity
     *
     * @return \Symfony\Component\Form\Form The formdeleteAction
     */
    private function createEditForm(ContactRequest $entity)
    {
        $form = $this->createForm(
            new ContactRequestType(),
            $entity,
            [
                'action' => $this->generateUrl('contact-request_update', ['id' => $entity->getId()]),
                'method' => 'PUT',
            ]
        );

        $form->add('submit', 'submit', ['label' => 'Update']);

        return $form;
    }

    /**
     * Creates a form to delete a ContactRequest entity by id.
     *
     * @param int $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact-request_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm();
    }
}
