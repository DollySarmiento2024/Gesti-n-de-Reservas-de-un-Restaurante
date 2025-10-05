<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CartaController extends AbstractController
{
    #[Route('/carta', name: 'app_carta')]
    public function index(): Response
    {
        return $this->render('carta/index.html.twig', [
            'controller_name' => 'CartaController',
        ]);
    }
}
