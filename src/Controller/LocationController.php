<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationController extends AbstractController
{

    private LocationRepository $locationRepository;

    /**
     * @param LocationRepository $locationRepository
     */
    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }


    #[Route('/location', name: 'location_index')]
    public function index(): Response
    {
        $locations = $this->locationRepository->findAll();
        return $this->render('location/index.html.twig', [
            'locations' => $locations,
            'resource' => 'lieux',
        ]);
    }

    #[Route('/location/{id}' , name: "location_show")]
    public function show($id){
        $location = $this->locationRepository->find($id);
        return $this->render('location/show.html.twig', [
            'location' => $location
        ]);
    }

}
