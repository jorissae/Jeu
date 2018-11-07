<?php
namespace App\Controller\Frontend;

use App\Entity\Play;
use App\Form\Filter\PlayFilterType;
use Doctrine\ORM\EntityManagerInterface;
use Idk\LegoBundle\Service\Tag\ComponentChain;
use Idk\LegoBundle\Service\Tag\WidgetChain;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{


    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        return $this->render('Frontend/Default/homepage.html.twig', [
            'plays' => $this->em->getRepository(Play::class)->findAll()
        ]);
    }

    public function filter(){
        $form = $this->createForm(PlayFilterType::class);
        return $this->render('Frontend/Default/_filter.html.twig', ['form' => $form->createView()]);
    }
}
