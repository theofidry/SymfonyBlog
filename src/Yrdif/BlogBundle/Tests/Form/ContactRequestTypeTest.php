<?php

namespace Yrdif\BlogBundle\Tests\Form;

use Faker\Factory;
use Symfony\Component\Form\Test\TypeTestCase;
use Yrdif\BlogBundle\Entity\ContactRequest;
use Yrdif\BlogBundle\Form\ContactRequestType;

/**
 * Class ContactRequestTypeTest
 *
 * @package Yrdif\BlogBundle\Tests\Form
 */
class ContactRequestTypeTest extends TypeTestCase
{

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->faker = Factory::create();
    }


    /**
     * Basic form type test.
     */
    public function testSubmitValidData()
    {
        $formData = [
            'name'    => $this->faker->name,
            'email'   => $this->faker->email,
            'subject' => $this->faker->sentence(),
            'content' => $this->faker->text()
        ];

        //TODO
        // Checks if the FormType compiles.
        $type = new ContactRequestType();
        $form = $this->factory->create($type);

        // Instantiate entity with data.
        $entity = ContactRequest::createFormArray($formData);

        // Submit the data to the form directly.
        $form->submit($formData);

        // Checks that none of your data transformers used by the form failed.
        $this->assertTrue($form->isSynchronized());
        // Checks that all the fields are correctly specified.
        $this->assertEquals($entity, $form->getData());

        // Check the creation of the form view.
        $view = $form->createView();
        $children = $view->children;
        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

    //TODO
    /**
     * @dataProvider getValidTestData
     */
    public function testForm($data)
    {
        // ... your test
    }

    //TODO
    public function getValidTestData()
    {
        return [
            [
                'data' => [
                    'test' => 'test',
                    'test2' => 'test2',
                ],
            ],
            [
                'data' => [],
            ],
            [
                'data' => [
                    'test' => null,
                    'test2' => null,
                ],
            ],
        ];
    }
}
