<?php

namespace App\Entity;

use App\Repository\ORM\PostRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class PostEntity extends BaseEntity
{
    /**
     * @ORM\Column(type="datetime", name="createdAt")
     * @Gedmo\Timestampable(on="create")
     */
    private DateTime $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\OneToOne(targetEntity=ImageEntity::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private ImageEntity $image;

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): PostEntity
    {
        $this->title = $title;
        return $this;
    }

    public function getImage(): ImageEntity
    {
        return $this->image;
    }

    public function setImage(ImageEntity $image): PostEntity
    {
        $this->image = $image;
        return $this;
    }
}
