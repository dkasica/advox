<?php

declare(strict_types=1);

namespace App\Repository\Interfaces;

use App\Entity\PostEntity;

interface PostPersistenceInterface
{
    public function persist(PostEntity $entity): void;

    public function flush(): void;
}
