<?php

namespace App\Controller;

use App\Repository\RepresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RepresentationController extends AbstractController
{
    private RepresentationRepository $representationRepository;

    /**
     * @param RepresentationRepository $representationRepository
     */
    public function __construct(RepresentationRepository $representationRepository)
    {
        $this->representationRepository = $representationRepository;
    }


    #[Route('/representation', name: 'representation_index')]
    public function index(): Response
    {

        $representations = $this->representationRepository->findAll();
        return $this->render('representation/index.html.twig', [
            'representations' => $representations,
            'resource' => 'représentations',
            ]);
    }
    #[Route("/representation/{id}" , name: "representation_show")]
    public function show($id){
        $representation = $this->representationRepository->find($id);
        return $this->render('representation/show.html.twig',[
            'representation' => $representation
        ]);
    }
}
