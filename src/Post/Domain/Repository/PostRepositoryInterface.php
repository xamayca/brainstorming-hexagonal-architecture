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
 * * - generateId() : génère un identifiant de post (en général, un UUID ou un entier auto-incrémenté)
 */
interface PostRepositoryInterface
{
    /**
     * Ajoute un post
     * @param Post $post
     */
    public function add(Post $post): void;

    /**
     * Met à jour un post
     * @param Post $post
     */
    public function update(Post $post): void;

    /**
     * Supprime un post
     * @param PostId $id
     */
    public function remove(PostId $id): void;

    /**
     * Récupère un post par son identifiant
     * @param PostId $id
     * @return Post|null
     */
    public function get(PostId $id): ?Post;

    /**
     * Récupère tous les posts
     * @return array
     */
    public function all(): array;

    /**
     * Génère un identifiant de post (en général, un UUID ou un entier auto-incrémenté)
     * @return PostId
     */
    public function generateId(): PostId;
}