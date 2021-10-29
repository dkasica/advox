<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\PostEntity;
use App\Form\FormData\PostFormData;
use App\Repository\Interfaces\PostPersistenceInterface;

class PostService
{
    private ImageService $imageService;
    private PostPersistenceInterface $persistence;

    public function __construct(ImageService $imageService, PostPersistenceInterface $persistence)
    {
        $this->imageService = $imageService;
        $this->persistence = $persistence;
    }

    public function createFromFormData(PostFormData $data): PostEntity
    {
        $image = $this->imageService->createFromUploadedFile($data->getFile());

        $post = (new PostEntity())
            ->setTitle($data->getTitle())
            ->setImage($image);

        $this->persistence->persist($post);
        $this->persistence->flush();

        return $post;
    }
}
