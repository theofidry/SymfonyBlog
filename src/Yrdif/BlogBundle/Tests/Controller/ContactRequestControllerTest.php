<?php

namespace Yrdif\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ContactRequestControllerTest
 *
 * @package Yrdif\BlogBundle\Tests\Controller
 */
class ContactRequestControllerTest extends WebTestCase
{

    /**
     * Test if all pages are reachable (and only that).
     *
     * @dataProvider urlProvider
     *
     * @param string[] $methods List of HTTP methods verbs.
     * @param string   $url
     */
    public function testPageIsSuccessful($methods, $url)
    {
        $client = self::createClient();

        foreach ($methods as $method) {
            $client->request($method, $url);
            $this->assertTrue(
                $client->getResponse()->isSuccessful() || $client->getResponse()->isRedirection(),
                'Page unreachable: (method, url) => \'response status code\' = ('.$method.', '.$url.') => '. $client->getResponse()->getStatusCode()
            );
        }
    }


    //
    // Data Providers
    //
    /**
     * Provides HTTP method verbs.
     *
     * @return array
     */
    public function methodsProvider()
    {
        return [
            Request::METHOD_DELETE,
            Request::METHOD_GET,
            Request::METHOD_POST,
            Request::METHOD_PUT
        ];
    }

    /**
     * Provides URL with allowed methods verb.
     *
     * @return array
     */
    public function urlProvider()
    {
        $id = 1;

        return [
            [[Request::METHOD_GET], '/contact/requests'],
            [[Request::METHOD_GET, Request::METHOD_PUT, Request::METHOD_DELETE], '/contact/'.$id],
            [[Request::METHOD_GET], '/contact/'.$id.'/edit'],
            [[Request::METHOD_GET, Request::METHOD_POST], '/contact/']
        ];
    }

    /*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/contact-request/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /contact-request/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'yrdif_blogbundle_contactrequest[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'yrdif_blogbundle_contactrequest[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }

    */
}
