<?php

/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 28/09/2015
 * Time: 18:38
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Author;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new Author('Angel','Barcia');
        $userAdmin->setName('Angel');
        $userAdmin->setSurname('Barcia');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}