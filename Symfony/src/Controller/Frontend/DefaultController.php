<?php
namespace App\Controller\Frontend;

use App\Entity\Play;
use App\Form\Filter\PlayFilterType;
use Doctrine\ORM\EntityManagerInterface;
use Idk\LegoBundle\Service\Tag\ComponentChain;
use Idk\LegoBundle\Service\Tag\WidgetChain;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{


    private $em;
    private $paginator;

    public function __construct(EntityManagerInterface $em, PaginatorInterface $paginator)
    {
        $this->em = $em;
        $this->paginator = $paginator;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(PlayFilterType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //dd($data = $form->getData());
        }



        $pagination = $this->paginator->paginate(
            $this->em->getRepository(Play::class)->createQueryBuilder('p')->orderBy('p.name')->getQuery(),
            $request->query->getInt('page', 1),
            24
        );
        return $this->render('Frontend/Default/homepage.html.twig', [ 'page' => $pagination ]);
    }

    /**
     * @Route("/show/{id}", name="play")
     */
    public function play(Request $request)
    {
        return $this->render('Frontend/Default/show.html.twig', [
            'play' => $this->em->getRepository(Play::class)->find($request->get('id'))
        ]);
    }

    public function filter(){
        $form = $this->createForm(PlayFilterType::class);
        return $this->render('Frontend/Default/_filter.html.twig', ['form' => $form->createView()]);
    }
}
