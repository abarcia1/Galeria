<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 08/10/2015
 * Time: 18:44
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('Save', 'submit');
    }

    public function getName()
    {
        return 'author';
    }
}