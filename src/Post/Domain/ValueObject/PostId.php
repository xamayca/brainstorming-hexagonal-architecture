<?php

namespace App\Post\Domain\ValueObject;


readonly class PostId
{

    /**
     * PostId constructor.
     * @param string $value
     * Cette classe représente l'identifiant d'un post dans le domaine.
     * * Elle est immuable et ne peut être modifiée une fois instanciée.
     * * Le type string est utilisé pour l'identifiant afin de permettre une flexibilité maximale (int, string, uuid, etc.).
     * * La propriété $value contient la valeur de l'identifiant du post, passée lors de l'instanciation de la classe.
     */
    public function __construct(
        public string $value
    ) {
    }

}