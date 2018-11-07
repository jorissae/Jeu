<?php
namespace App\Form\Filter;

use App\Entity\Editor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayFilterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nb_players',TextType::class)
            ->add('time', ChoiceType::class, ['choices' => [
                '10' => '10mn',
                '30' => '30mn',
                '60' => '1heur'
            ]]);
    }

    public function getBlockPrefix()
    {
        return 'filter_';
    }

}