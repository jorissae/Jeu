<?php
namespace App\Controller\Frontend;

use App\Entity\Collection;
use App\Entity\Play;
use App\Form\ContactType;
use App\Form\Filter\PlayFilterType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
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
     * @Route("/{page}", requirements={"page":"\d+"},name="homepage", defaults={"page":1})
     */
    public function index(Request $request, $page)
    {


        $form = $this->createForm(PlayFilterType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $page = 1;
            if($request->request->has('erase')){
                $request->getSession()->set('filter', []);
            }else {
                $request->getSession()->set('filter', $form->getData());
            }
            if($form->getData()['redirect']){
                return $this->redirect($form->getData()['redirect']);
            }
        }


        $pagination = $this->paginator->paginate(
            $this->em->getRepository(Play::class)->getQueryBuilderByFilter($request->getSession()->get('filter', []))->getQuery(),
            $page ?? 1,
            30
        );
        return $this->render('Frontend/Collection/all.html.twig', [
            'page' => $pagination,
            'filter' => $request->getSession()->get('filter', [])
        ]);
    }

    /**
     * @Route("/pin/{id}")
     */
    public function pin(Request $request ,Play $play){
        $session = $request->getSession();
        $playfav = $session->get('playfav', []);
        if(!isset($playfav[$play->getId()])){
            $playfav[$play->getId()] = $play->getId();
        }
        $session->set('playfav', $playfav);
        $this->addFlash('notice', 'Jeu '. $play->getName() .' ajouté aux favoris');
        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("/unpin/{id}")
     */
    public function unpin(Request $request ,Play $play){
        $session = $request->getSession();
        $playfav = $session->get('playfav', []);
        if(isset($playfav[$play->getId()])){
            unset($playfav[$play->getId()]);
        }
        $session->set('playfav', $playfav);
        $this->addFlash('notice', 'Jeu '. $play->getName() .' supprimé des favoris');
        return $this->redirect($request->headers->get('referer'));
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

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->add('Envoyer', SubmitType::class,[]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $message = new \Swift_Message('Nouveau message de '. $data['email'], $data['message']);
            $message->addFrom('jeuanous@leslie.fr');
            $message->addTo('chez.joris@live.fr');
            $message->addCc('leslie_1212@hotmail.fr');
            $mailer->send($message);
            $this->addFlash('success', 'Message envoyé');
        }
        return $this->render('Frontend/Default/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function filter(Request $request){
        $form = $this->createForm(PlayFilterType::class,  $request->getSession()->get('filter', []));
        return $this->render('Frontend/Default/_filter.html.twig', ['form' => $form->createView()]);
    }

    public function favoris(Request $request){
        return $this->render('Frontend/Default/_favoris.html.twig' , [
            'plays' => $this->em->getRepository(Play::class)->findIn($request->getSession()->get('playfav', []))
        ]);
    }
}
