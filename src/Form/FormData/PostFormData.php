<?php

declare(strict_types=1);

namespace App\Form\FormData;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostFormData
{
    private string $title = '';
    private ?UploadedFile $file;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): PostFormData
    {
        $this->title = $title;
        return $this;
    }

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    public function setFile(?UploadedFile $file): PostFormData
    {
        $this->file = $file;
        return $this;
    }
}
