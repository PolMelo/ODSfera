<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'title' => 'Página Principal',
        ]);
    }

    #[Route('/contacto', name: 'app_contacto')]
    public function contacto(): Response
    {
        return $this->render('home/contacto.html.twig', [
            'title' => 'Contacto',
        ]);
    }
}
