<?php

namespace Yrdif\BlogBundle\Tests\Entity;

use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Yrdif\BlogBundle\Entity\ContactRequest;

/**
 * Class ContactRequestTest
 *
 * @package Yrdif\BlogBundle\Tests\Entity
 */
class ContactRequestTest extends WebTestCase
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    private $repository;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->repository = $this->em->getRepository('YrdifBlogBundle:ContactRequest');
    }

    /**
     * Test that the entity implements a fluent interface.
     *
     * @link         http://en.wikipedia.org/wiki/Fluent_interface#PHP
     * @dataProvider entityProvider
     *
     * @param array $data
     */
    public function testFluentInterface($data)
    {
        $entity = new ContactRequest();
        $entity->fromArray($data);
        $fentity = new ContactRequest();

        $fentity
            ->setName($data['name'])
            ->setEmail($data['email'])
            ->setSubject($data['subject'])
            ->setContent($data['content']);

        $this->assertEquals($entity, $fentity, 'Entity does not implements fluent interface.');
    }

    /**
     * Test if the entity is properly created and committed.
     *
     * @dataProvider entityProvider
     *
     * @param array $data
     */
    public function testNewEntity($data)
    {
        $entity = new ContactRequest();
        $entity->fromArray($data);

        $this->em->persist($entity);
        $this->em->flush();

        $count = $this->repository->createQueryBuilder('e')
            ->select('COUNT(e)')
            ->getQuery()
            ->getSingleScalarResult();

        $this->assertGreaterThan(1, $count);
    }

    public function testER($data) {

        // Expect to be able to instantiate two identical entities.
        $entity1 = new ContactRequest();
        $entity2 = new ContactRequest();

        $entity1->fromArray($data);
        $entity2->fromArray($data);

        $this->em->commit($entity1);
        $this->em->commit($entity2);
        $this->em->flush();

        // Expect no error.
    }

    /**
     * Test fromArray on entity.
     *
     * @dataProvider entityProvider
     *
     * @param array $data
     */
    public function testFromArray($data)
    {
        $entity = new ContactRequest();
        $entity->fromArray($data);

        $this->assertEquals($data['name'], $entity->getName());
        $this->assertEquals($data['email'], $entity->getEmail());
        $this->assertEquals($data['subject'], $entity->getSubject());
        $this->assertEquals($data['content'], $entity->getContent());
    }

    /**
     * Provides entity data array.
     *
     * @return array
     */
    public function entityProvider()
    {
        $faker = Factory::create();
        $n = 100;
        $data = [];

        for ($i = 0; $i < $n; $i++) {
            $data[] = [
                [
                    'name'    => $faker->name,
                    'email'   => $faker->email,
                    'subject' => $faker->sentence(),
                    'content' => $faker->text()
                ]
            ];
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}
