<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Movie;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
    #[Route('/api/movie/{id}', name: 'app_api_movie')]
public function readMovie(Movie $mov, SerializerInterface $serializer ): Response
{
    // $serializer est un service de Symfony injecté dans la méthode readMovie
    // $data est la représentation serialisée/normalisée de l'entity $mov
    $data = $serializer->normalize($mov, null);
    // $response est une instance de JsonResponse qui hérite de Response
    // C'est la classe à utiliser lorsque l'on veut retourner du JSON
    // $data sera automatiquement encodé en JSON
    $response = new JsonResponse( $data );
    return $response;
}


}
