<?php


namespace Yrdif\BlogBundle\Entity;


use Doctrine\ORM\EntityRepository;

/**
 * Class PostRepository
 *
 * @package Yrdif\BlogBundle\Entity
 */
class PostRepository extends EntityRepository
{

    /**
     * Find all the entities ordered by the latest date of creation.
     *
     * @return array
     */
    public function findAllOrderedByCreatedAt()
    {

        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
