<?php

namespace App\Controller;

use App\Repository\ArtistsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    private ArtistsRepository $artistsRepository;

    /**
     * @param $artistsRepository
     */
    public function __construct(ArtistsRepository $artistsRepository)
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
}
