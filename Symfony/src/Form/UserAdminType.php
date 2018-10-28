<?php

namespace App\Form;

use Idk\LegoBundle\Form\Type\RoleType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Tests\Role\RoleTest;

/**
 * The type for User
 */
class UserAdminType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting form the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array                $options The options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');
        $builder->add('name');
        $builder->add('roles', RoleType::class);
        $builder->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            'required' => false,
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => 'Mot de passe ( pour modification )'),
            'second_options' => array('label' => 'Mot de passe :'),
            'invalid_message' => 'fos_user.password.mismatch',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'user_form';
    }
}
