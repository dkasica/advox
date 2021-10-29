<?php

namespace App\Entity;

use App\Repository\ORM\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class ImageEntity extends BaseEntity
{
    public static array $allowedMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/svg',
        'image/gif',
    ];

    /**
     * @ORM\Column(type="string", length=255, name="originalName")
     */
    private string $originalName;

    /**
     * @ORM\Column(type="string", length=255, name="fileName")
     */
    private string $fileName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $path;

    /**
     * @ORM\Column(type="string", length=255, name="mimeType")
     */
    private string $mimeType;

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): ImageEntity
    {
        $this->originalName = $originalName;
        return $this;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): ImageEntity
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): ImageEntity
    {
        $this->path = $path;
        return $this;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): ImageEntity
    {
        $this->mimeType = $mimeType;
        return $this;
    }
}
