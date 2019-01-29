<?php

namespace App\Controller;

use App\Form\FormBuilder\ContactFormBuilder;
use App\Form\FormHandler\ContactFormHandler;
use OCFram\Controller\Controller;
use OCFram\HTTPComponents\HTTPRequest;

class DefaultController extends Controller {

    public function executeIndex(HTTPRequest $request)
    {

        return $this->render('index.html.twig', [
            'user' => $this->getApp()->getUser(),
            'flashMessage' => $this->getApp()->getUser()->getFlash()]);
    }


    public function executeContact(HTTPRequest $request)
    {
        $contactFormBuilder = new ContactFormBuilder();
        $contactFormBuilder->build();
        $contactFormBuilder->getFormDatasFromRequest($request);
        $contactForm = $contactFormBuilder->getForm();

        $messageSent = ContactFormHandler::handle($contactForm, $this->getApp());

        if ($messageSent) {
            $this->getApp()->getHTTPResponse()->redirect('/');
        }

        return $this->render('contact.html.twig', [
            'contactForm' => $contactForm->createView(),
            'user' => $this->getApp()->getUser(),
            'flashMessage' => $this->getApp()->getUser()->getFlash()]);
    }

}