<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\ImageEntity;
use App\Repository\Interfaces\ImagePersistenceInterface;
use DateTime;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageService
{
    private ContainerInterface $container;
    private ImagePersistenceInterface $persistence;

    public function __construct(ContainerInterface $container, ImagePersistenceInterface $persistence)
    {
        $this->container = $container;
        $this->persistence = $persistence;
    }

    public function createFromUploadedFile(UploadedFile $file): ImageEntity
    {
        $name = $file->getClientOriginalName();
        $newFileName = sprintf('%s_%s', uniqid(), $name);
        $path = $this->container->getParameter('image_directory');
        $file->move($path, $newFileName);

        $image = (new ImageEntity())
            ->setOriginalName($name)
            ->setFileName($newFileName)
            ->setPath($path . $newFileName)
            ->setMimeType($file->getClientMimeType());

        $this->persistence->persist($image);
        $this->persistence->flush();

        return $image;
    }
}
