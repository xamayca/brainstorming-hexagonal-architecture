# LES ENTITÉS

## 1.1 Introduction
> - Une entité est un objet PHP qui représente une table dans une base de données.
> - Par exemple, si vous avez une table `users` dans votre base de données, vous pouvez créer une entité `User` qui correspond à cette table.
> - Chaque entité est un `objet PHP` qui contient des propriétés qui correspondent aux colonnes de la table.
> - Les entités sont utilisées pour interagir avec la base de données.

## 1.2 Création de l'entité Post (ValueObject ID)
> - Les paramètres de la classe correspondent aux `colonnes` de la table, par exemple, si vous avez une table `posts` avec les colonnes `id`, `title`, `content`, `created_at`, `updated_at`, vous pouvez créer une entité `Post` avec les propriétés correspondantes.
> - Des `Getters` et `Setters` sont définis pour permettre l'accès et la modification des données (Getters pour obtenir les données et Setters pour les modifier).
> - Si un paramètre de cette dernière doit être immutable, nous en ferons un value object.
> - Les value objects sont des objets qui représentent des valeurs `immuables` et qui ne peuvent `pas être modifiées` une fois qu'ils ont été créés.
> - Par exemple notre entité `Post` auras un paramètre `id` qui est un value object car il ne doit pas être modifié une fois qu'il a été créé.
> - Une fois que nous avons identifié le besoin d'un `objet de valeur`, nous devons créer une classe pour ce dernier et c'est ce par quoi nous allons commencer.
```php
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
```
> - La classe `PostId` est un value object qui représente l'identifiant d'un post dans le domaine de l'application.
> - Elle est immuable et ne peut être modifiée une fois instanciée (readonly) et contient une propriété `$value` qui contient la valeur de l'identifiant du post.
> - Le type `string` est utilisé pour `l'identifiant` afin de permettre une `flexibilité maximale` (int, string, uuid, etc.) dans le cas où nous voudrions changer le type de l'identifiant à l'avenir.
> - De plus, nous avons défini un `constructeur` qui prend la valeur de l'identifiant en paramètre et l'assigne à la propriété `$value`.

## 1.3 Création de l'entité Post (Entity)
```php
<?php

namespace App\Post\Domain\Entity;

use App\Post\Domain\ValueObject\PostId;

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
```
> - Dans cette classe, nous avons défini une entité `Post` qui représente un post dans le domaine de l'application.
> - Nous remarquerons que certains getters et setters ont été définis pour les propriétés de la classe et d'autres non.
> - Nous ne les avons pas définis pour les propriétés `id`, `createdAt` et `updatedAt` car elles sont immuables et ne peuvent pas être modifiées une fois qu'elles ont été créées.
> - Nous avons également défini une méthode `update` qui met à jour la propriété `updatedAt` à chaque fois qu'une propriété de la classe, donc d'un post, est modifiée.
> - Par exemple, si le titre d'un post est modifié, la date de mise à jour du post sera également mise à jour.
> - La suite va consister à créer un `Repository` pour notre entité `Post` afin de pouvoir interagir avec la base de données.
> - Un `Repository` est une classe qui permet de récupérer, stocker et supprimer des entités dans la base de données.
> - Il contient des méthodes pour effectuer des opérations de base sur les entités, telles que la recherche par identifiant, la sauvegarde et la suppression.
> - Nous allons créer un `Repository` pour notre entité `Post` qui nous permettra d'interagir avec la base de données et de manipuler les posts.

## 1.4 Création de l'interface PostRepositoryInterface (Repository)
```php
<?php

namespace App\Post\Domain\Repository;

use App\Post\Domain\Entity\Post;

interface PostRepositoryInterface
{
    public function find(PostId $id): ?Post;

    public function save(Post $post): void;

    public function delete(Post $post): void;
}
```
> - Dans cette interface, nous avons défini les méthodes `find`, `save` et `delete` qui seront implémentées par le `Repository` de l'entité `Post`.
> - La méthode `find` permet de rechercher un post par son identifiant.
> - La méthode `save` permet de sauvegarder un post dans la base de données.
> - La méthode `delete` permet de supprimer un post de la base de données.
> - Ces méthodes seront implémentées dans le `Repository` de l'entité `Post` pour effectuer les opérations correspondantes sur la base de données.
> - Nous allons maintenant créer une classe `PostRepository` qui implémentera cette interface et nous permettra d'interagir avec la base de données.

## 1.5 Création du Repository Post (PostRepository implements PostRepositoryInterface)
```php
<?php

namespace App\Post\Infrastructure\Repository;

use App\Post\Domain\Entity\Post;

class PostRepository implements PostRepositoryInterface
{
    public function find(PostId $id): ?Post
    {
        // Implémentation de la méthode find
    }

    public function save(Post $post): void
    {
        // Implémentation de la méthode save
    }

    public function delete(Post $post): void
    {
        // Implémentation de la méthode delete
    }
}
```
> - Dans cette classe, nous avons défini un `Repository` pour l'entité `Post` qui implémente l'interface `PostRepositoryInterface`.
> - Nous avons défini les méthodes `find`, `save` et `delete` qui permettent de rechercher, sauvegarder et supprimer un post dans la base de données.
> - Ces méthodes seront implémentées pour effectuer les opérations correspondantes sur la base de données.
> - Nous avons maintenant une entité `Post` avec un `Repository` qui nous permet d'interagir avec la base de données et de manipuler les posts.
> - Nous pouvons maintenant utiliser cette entité et ce `Repository` dans notre application pour gérer les posts et les stocker en base de données.
> - Nous avons ainsi créé une structure de base pour notre application en utilisant des entités et des `Repositories` pour interagir avec la base de données et manipuler les données.
