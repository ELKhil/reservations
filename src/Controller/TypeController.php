<?php

namespace App\Controller;

use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{

    private TypeRepository $typeRepository;

    /**
     * @param TypeRepository $typeRepository
     */
    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }


    #[Route('/type', name: 'type_index')]
    public function index(): Response
    {
        $types = $this->typeRepository->findAll();
        return $this->render('type/index.html.twig', [
            'types' => $types,
            'resource' => 'types',
        ]);
    }

    #[Route('/type/{id}', name: "type_show")]
    public function show($id)
    {
        $type = $this->typeRepository->find($id);
        return $this->render('type/show.html.twig', [
            'type' => $type,
        ]);
    }
}
