<?php
namespace App\Controller\Frontend;

use App\Entity\Collection;
use App\Entity\Play;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CollectionController extends AbstractController {



    private $em;
    private $paginator;

    public function __construct(EntityManagerInterface $em, PaginatorInterface $paginator)
    {
        $this->em = $em;
        $this->paginator = $paginator;
    }

    /**
 * @Route("/my/collection/{id}/{page}", name="collection_index", defaults={"page":1})
 */
    public function index(Request $request, Collection $collection, $page)
    {
        $pagination = $this->paginator->paginate(
            $this->em->getRepository(Play::class)->getQueryBuilderByFilter($request->getSession()->get('filter', []), $collection)->getQuery(),
            $page ?? 1,
            30
        );
        return $this->render('Frontend/Collection/list.html.twig', [
            'page' => $pagination,
            'collection' => $collection,
            'filter' => $request->getSession()->get('filter', [])
        ]);
    }

    /**
     * @Route("/my/collection/{id}/play/{idp}", name="collection_play")
     */
    public function play(Request $request, Collection $collection)
    {
        return $this->render('Frontend/Collection/play.html.twig', [
            'play' => $this->em->getRepository(Play::class)->find($request->get('idp')),
            'collection' => $collection
        ]);
    }

}
