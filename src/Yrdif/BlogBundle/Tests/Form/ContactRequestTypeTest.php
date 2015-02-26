<?php

namespace Yrdif\BlogBundle\Tests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use Yrdif\BlogBundle\Form\ContactRequestType;

/**
 * Class ContactRequestTypeTest
 *
 * @package Yrdif\BlogBundle\Tests\Form
 */
class ContactRequestTypeTest extends TypeTestCase{

    /**
     *
     */
    public function testSubmitValidData()
    {
        $formData = [
            'test' => 'test',
            'test2' => 'test2',
        ];

        //TODO
//        // Check if the FormType compiles.
//        $type = new ContactRequestType();
//        $form = $this->factory->create($type);
//
//        $object = new TestObject();
//        $object->fromArray($formData);
//
//        // submit the data to the form directly
//        $form->submit($formData);
//        // Checks that none of your data transformers used by the form failed
//        $this->assertTrue($form->isSynchronized());
//        $this->assertEquals($object, $form->getData());
//
//        $view = $form->createView();
//        $children = $view->children;
//
//        foreach (array_keys($formData) as $key) {
//            $this->assertArrayHasKey($key, $children);
//        }
    }
}
