<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\Form\RegistrationFormType;
use App\Form\PostFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route(path: '/', name: 'app_index')]
    public function index(Request $request): Response
    {
        $post = new Post();
        $postForm = $this->createForm(PostFormType::class, $post);
        $postForm->handleRequest($request);
        if ($postForm->isSubmitted() && $postForm->isValid()) {

        }

        return $this->render('app/index.html.twig', [
            'postForm' => $postForm
        ]);
    }


    #[Route(path: '/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('course-templates/security/login.html.twig',[
            'last_username' => 'bob@gm.com',
            'error' => null,
        ]);
    }



    #[Route(path: '/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('course-templates/registration/register.html.twig', [
            'registrationForm' => $form
        ]);
    }


    #[Route(path: '/portfolio', name: 'portfolio')]
    public function dashboard(Request $request): Response
    {
        return $this->render('course-templates/user/portfolio.html.twig');
    }

}