<?php
namespace App\Form\Filter;

use App\Entity\Editor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PlayFilterType extends AbstractType
{

    private $urlGenerator;
    private $requestStack;

    public function __construct(UrlGeneratorInterface $urlGenerator, RequestStack $requestStack){
        $this->urlGenerator = $urlGenerator;
        $this->requestStack = $requestStack;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $redirectAfterSubmit = null;
        if(strstr( $this->requestStack->getMasterRequest()->attributes->get('_route'), 'collection')){
            $redirectAfterSubmit = $this->urlGenerator->generate('collection_index', ['id' => $this->requestStack->getMasterRequest()->attributes->get('id')]);
        }

        $builder
            ->setAction($this->urlGenerator->generate('homepage'))
            ->add('name', TextType::class,  ['attr'=>['placeholder'=>'Nom du jeu'], 'required'=> false])
            ->add('nb_players',TextType::class, ['attr'=>['placeholder'=>'Nombre de joueurs'], 'required'=> false])
            ->add('advisor', CheckboxType::class, ['label'=>' ', 'required'=> false, 'attr' => ['title' => 'Conseillé uniquement', 'style'=> 'margin-top:4px;']])
            ->add('time', ChoiceType::class, ['required'=> false,'choices' => [
                '15 min' => '15',
                '30 min' => '30',
                '45 min' => '45',
                '60 min' => '60',
                '90 min' => '90',
                '120 min' => '120'
            ]])
            ->add('redirect', HiddenType::class, ['data' => $redirectAfterSubmit]);
    }

    public function getBlockPrefix()
    {
        return 'filter';
    }

}