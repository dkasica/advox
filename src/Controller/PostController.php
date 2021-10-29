<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\FormData\PostFormData;
use App\Form\PostType;
use App\Repository\Interfaces\PostRepositoryInterface;
use App\Service\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private PostRepositoryInterface $repository;
    private PostService $service;

    public function __construct(PostRepositoryInterface $repository, PostService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * @Route("")
     */
    public function listAction(Request $request): Response
    {
        $postsList = $this->repository->list();

        return $this->render(
            'post/list.html.twig',
            [
                'posts' => $postsList,
            ]
        );
    }

    /**
     * @Route("/create")
     */
    public function createAction(Request $request): Response
    {
        $data = new PostFormData();
        $form = $this->createForm(PostType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $this->service->createFromFormData($form->getData());
            $this->addFlash(
                'success',
                'New post: "'.$post->getTitle().'" was created'
            );

            return $this->redirectToRoute(
                'app_post_list'
            );
        }

        return $this->render(
            'post/create.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
