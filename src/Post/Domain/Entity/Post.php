<?php

namespace App\Post\Domain\Entity;

use App\Post\Domain\ValueObject\PostId;
use DateTimeImmutable;

class Post
{
    /**
     * Post constructor.
     * @param PostId $id
     * @param string $title
     * @param string $slug
     * @param string $content
     * @param DateTimeImmutable $createdAt
     * @param DateTimeImmutable $updatedAt
     * Cette classe représente un post dans le domaine de l'application.
     * * Elle contient les propriétés suivantes :
     * * - $id : l'identifiant du post (PostId)
     * * - $title : le titre du post
     * * - $slug : le slug du post (URL friendly)
     * * - $content : le contenu du post
     * * - $createdAt : la date de création du post
     * * - $updatedAt : la date de mise à jour du post
     */
    public function __construct(
        private readonly PostId $id,
        private string $title,
        private string $slug,
        private string $content,
        private readonly \DateTimeImmutable $createdAt,
        private \DateTimeImmutable $updatedAt,
    ){}

    public function getId():PostId
    {
        return $this -> id;
    }

    public function getTitle(): string
    {
        return $this -> title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
        $this->update();
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug=$slug;
        $this->update();
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content=$content;
        $this->update();
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function update (): void
    {
        $this->updatedAt=new \DateTimeImmutable();
    }

}