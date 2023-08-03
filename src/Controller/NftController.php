<?php

namespace App\Controller;

use App\Repository\NftRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class NftController extends AbstractController
{
    
    public function __construct(private SerializerInterface $serializer) {
        
    }

    #[Route('/nft', name: 'app_nft')]
    public function findAll(NftRepository $nftRepository): JsonResponse
    {
        $nfts = $nftRepository->findAll();
        dd($nfts);
        return $this->json($nfts);
    }
    
}
