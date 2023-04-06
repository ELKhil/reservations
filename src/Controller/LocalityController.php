<?php

namespace App\Controller;

use App\Repository\LocalityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocalityController extends AbstractController
{
    private LocalityRepository $localityRepository;

    /**
     * @param LocalityRepository $localityRepository
     */
    public function __construct(LocalityRepository $localityRepository)
    {
        $this->localityRepository = $localityRepository;
    }


    #[Route('/locality', name: 'locality_index')]
    public function index(): Response
    {
        return $this->render('locality/index.html.twig', [
            'controller_name' => 'LocalityController',
        ]);
    }

    #[Route('/locality/{id}', name: 'locality_show')]
    public function show($id)
    {
        $locality = $this->localityRepository->find($id);

        return $this->render('locality/show.html.twig', [
            'locality' => $locality,
        ]);
    }

}
