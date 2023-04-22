<?php

namespace App\Controller;

use App\Repository\ShowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{

    private ShowRepository $showRepository;

    /**
     * @param ShowRepository $showRepository
     */
    public function __construct(ShowRepository $showRepository)
    {
        $this->showRepository = $showRepository;
    }

    #[Route('/show', name: 'show_index')]
    public function index(): Response
    {
        $shows = $this->showRepository->findAll();
        return $this->render('show/index.html.twig', [
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }
    #[Route('/show/{id}', name: 'show_show')]
    public function shows($id){
        $show = $this->showRepository->find($id);
        return $this->render('show/show.html.twig',[
            'show' => $show
        ]);
    }


}
