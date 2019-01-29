<?php

namespace App\Form\FormHandler;

use App\Entity\Comment;
use OCFram\Application;
use OCFram\Form\Form;
use OCFram\Form\FormHandler\FormHandler;
use OCFram\HTTPComponents\HTTPRequest;

class ContactFormHandler extends FormHandler {

    public static function handle(Form $form, Application $app) {

        if ($app->getHTTPRequest()->method() != "POST") {
            return;
        }

        if ($form->isValid()) {

            //Send an email

            $app->getUser()->setFlash(
                ['type' => 'success',
                    'message' => 'Merci! Votre message m\'a bien été envoyé, je vous répondrais sous 24-48h ! A très vite :-)']);

            return true;
        }

        return false;

    }
}