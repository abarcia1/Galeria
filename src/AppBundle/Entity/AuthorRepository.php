<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity;
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21/09/2015
 * Time: 18:25
 */
class AuthorRepository extends EntityRepository
{
    public function findTopChefs(){
        $query = $this->createQueryBuilder('a')
            ->innerJoin('a.recipes', 'r')
            ->where('r.difficulty = :difficulty')
            ->orderBy('a.surname', 'DESC')
            ->setParameter('difficulty', 3)
            ->getQuery();
        $chefs = $query->getResult();
        return $chefs;
    }
}