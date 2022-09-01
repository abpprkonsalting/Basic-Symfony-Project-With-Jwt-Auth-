<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/test', name: 'api', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->json([
            'message' => 'Welcome to your new controller!'
        ]);
    }
}
