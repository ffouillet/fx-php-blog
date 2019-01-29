<?php

namespace App\Form\FormBuilder;

use OCFram\Form\Field\EmailField;
use OCFram\Form\Field\StringField;
use OCFram\Form\Field\TextField;
use OCFram\Form\FormBuilder\FormBuilder;
use OCFram\HTTPComponents\HTTPRequest;
use OCFram\Validator\MaxLengthValidator;
use OCFram\Validator\MinLengthValidator;
use OCFram\Validator\NotNullValidator;

class ContactFormBuilder extends FormBuilder
{

    public function build()
    {
        $this->form->addField(new StringField([
            'label' => 'Votre nom',
            'name' => 'name',
            'validators' => [
                new MinLengthValidator('Votre nom est trop court (3 caractères minimum)', 3),
                new MaxLengthValidator('Votre nom est trop long (30 caractères minimum)', 30),
                new NotNullValidator('Merci de spécifier votre nom d\'utilisateur')
            ],
        ]))
            ->addField(new EmailField([
                'label' => 'Votre email',
                'name' => 'email',
                'validators' => [
                    new NotNullValidator('Merci de spécifier votre adresse email')
                ],
            ]))
            ->addField(new TextField([
                'label' => 'Votre message',
                'name' => 'content',
                'validators' => [
                    new MinLengthValidator('Votre message est trop court (10 caractères minimum)', 3),
                    new MaxLengthValidator('Votre nom est trop long (2000 caractères minimum)', 2000),
                    new NotNullValidator('Merci de spécifier votre message')
                ],
            ]));

    }

    public function getFormDatasFromRequest(HTTPRequest $request)
    {
        if ($request->method() == 'POST') {
            $this->form->getField('name')->setValue($request->postData('name'));
            $this->form->getField('email')->setValue($request->postData('email'));
            $this->form->getField('content')->setValue($request->postData('content'));
        }
    }

}