<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(AuthorizationCheckerInterface $authChecker): Response
    {
        // Vérifie si l'utilisateur a le rôle ROLE_ADMIN
        if (!$authChecker->isGranted('ROLE_ADMIN')) {
            // Redirige l'utilisateur vers la page d'accueil si ce n'est pas un admin
            return $this->redirectToRoute('app_home'); // Remplace 'app_home' par la route de ta page d'accueil
        }

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}