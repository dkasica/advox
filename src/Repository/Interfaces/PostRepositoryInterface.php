<?php

declare(strict_types=1);

namespace App\Repository\Interfaces;

interface PostRepositoryInterface
{
    public function list(): array;
}
