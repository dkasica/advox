<?php

declare(strict_types=1);

namespace App\Repository\Interfaces;

use App\Entity\ImageEntity;

interface ImagePersistenceInterface
{
    public function persist(ImageEntity $entity): void;

    public function flush(): void;
}