<?php

namespace App\Post\Domain\Repository;

use App\Post\Domain\Entity\Post;
use App\Post\Domain\ValueObject\PostId;

/**
 * Interface PostRepositoryInterface
 * @package App\Post\Domain\Repository
 * Cette interface représente le contrat que doit respecter un repository de post.
 * * Elle contient les méthodes suivantes :
 * * - add(Post $post) : ajoute un post
 * * - update(Post $post) : met à jour un post
 * * - remove(PostId $id) : supprime un post
 * * - get(PostId $id) : récupère un post par son identifiant
 * * - all() : récupère tous les posts
 * * - generateId() : génère un identifiant de post (en général, un UUID)
 */
interface PostRepositoryInterface
{
    public function add(Post $post): void;

    public function update(Post $post): void;

    public function remove(PostId $id): void;

    public function get(PostId $id): ?Post;

    public function all(): array;

    public function generateId(): PostId;
}