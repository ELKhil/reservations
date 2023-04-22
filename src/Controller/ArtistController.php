<?php

namespace App\Controller;


use App\Entity\Artist;
use App\Form\ArtistType;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    private ArtistRepository $artistsRepository;

    /**
     * @param $artistsRepository
     */
    public function __construct(ArtistRepository $artistsRepository)
    {
        $this->artistsRepository = $artistsRepository;
    }


    #[Route('/artist', name: 'artist_index')]
    public function index(): Response
    {
        $artists = $this->artistsRepository->findAll();
        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'resource' => 'artistes',
        ]);
    }

    #[Route('/artist/{id}', name: "artist_show")]
    public function show($id)
    {
        $artist = $this->artistsRepository->find($id);
        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
        ]);
    }

    #[Route('/{id}/edit', name: 'artist_edit', methods: ['GET' ,'PUT','POST'])]
    public function edit(Request $request, Artist $artist) :Response{

        $form = $this->createForm(ArtistType::class, $artist);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->artistsRepository->save($artist, true);
            return $this->redirectToRoute('artist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('artist/edit.html.twig',[
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }
}
