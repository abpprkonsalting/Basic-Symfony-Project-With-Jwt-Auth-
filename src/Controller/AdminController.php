<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Karriere\JsonDecoder\JsonDecoder;
use Firebase\JWT\JWT;

use App\Repository\UserRepository;

class AdminController extends AbstractController
{
    private JsonDecoder $jsonDecoder;

    public function __construct()
    {
        $this->jsonDecoder = new JsonDecoder();
    }

    #[Route('api/setadmin', name: 'setadmin', methods: ['POST'])]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        try {
            $content = $request->getContent();
            $decoded = json_decode($content,true);
            if (!isset($decoded['superAdminPassword'])) {
                throw new BadCredentialsException("No superadmin password provided");
            }
            if ($decoded['superAdminPassword'] != $this->getParameter('super_admin_secret')) {
                throw new BadCredentialsException("Wrong superadmin password provided");
            }
            $user = $this->getUser();
            $user->setRoles(['ROLE_ADMIN']);
            $userRepository->saveUser($user);
            $payload = [
                "id" => $user->getId(),
                "email" => $user->getUserIdentifier(),
                "roles" => $user->getRoles(),
                "expire"  => (new \DateTime())->modify("+5 minutes")->getTimestamp(),
            ];
            $jwt = JWT::encode($payload, $this->getParameter('jwt_secret'), 'HS256');
            return $this->json([
                'user'  => $user->getUserIdentifier(),
                'token' => $jwt,
            ]);
        } catch (\Exception $exception) {
            return new Response($exception->getMessage(), 500);
        }
    }
}
