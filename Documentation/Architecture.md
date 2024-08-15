# ARCHITECTURE

## 1. [DDD (Domain-Driven Design)] :
> - L'architecture `DDD (Domain-Driven Design)` est une `approche de conception` logicielle qui repose sur la collaboration étroite entre les experts métier et les développeurs.
> - Par exemple, un concept métier comme un `client` est modélisé dans le code source de l'application, avec des classes, des méthodes et des attributs qui représentent ces concepts.
> - Voici un exemple de code source qui illustre comment un concept métier comme un `client` peu être modélisé dans une application :
```php
<?php

namespace App\Domain\Client;

use App\Domain\Client\ClientId;
use App\Domain\Client\ClientName;

class Client
{
    private ClientId $id;
    private ClientName $name;

    public function __construct(ClientId $id, ClientName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): ClientId
    {
        return $this->id;
    }

    public function getName(): ClientName
    {
        return $this->name;
    }
}
```
> - On peut voir que la `classe Client` modélise un concept métier comme un `client`, avec des attributs comme l'identifiant du client `(ClientId)` et le nom du client `(ClientName)`.
> - Le `nom de la classe`, des `attributs` et des `méthodes`, est choisi de façon à ce qu'ont `comprennent directement` de quoi il s'agit (par exemple, `ClientId` pour l'identifiant du client et `ClientName` pour le nom du client), c'est ce qu'on appelle la `langue ubiquitaire` en DDD.
> - Ces concepts métier modélisés dans le code sources de l'application vont nous permettre de développer des fonctionnalités métier de façon plus efficace et de maintenir le code source de l'application plus facilement dans les couches suivantes de l'architecture.
> - DDD ce n'est `ni une architecture, ni un design pattern, ni un framework`, c'est une `approche de conception` logicielle qui repose sur la logique métier de l'application et la `compréhension du domaine` métier.
> - En gros, DDD c'est écrire le nom de nos classes, méthodes et attributs en fonction du métier de l'application de façon à ce qu'on comprenne directement de quoi il s'agit du premier coup d'œil.
> - Le but étant de rendre le code source de l'application plus `lisible`, plus `maintenable` et plus `évolutif` et surtout qu'il soit `compréhensible par tout le monde` (développeurs, experts métier, etc.).

## 2. [CQRS (Command Query Responsibility Segregation)] :
> - L'architecture `CQRS (Command Query Responsibility Segregation)` est une `approche de conception` logicielle qui consiste à séparer les opérations de lecture (queries) des opérations d'écriture (commands) dans une application.
> - Par exemple, une application peut avoir des `opérations de lecture` qui permettent de `consulter` des données (par exemple, afficher une liste d'articles) et des `opérations d'écriture` qui permettent de `modifier` des données (par exemple, ajouter un nouvel article).
> - Ses opérations sont gérées par des classes spécifiques qui sont appelées `QueryHandlers` pour les opérations de lecture et `CommandHandlers` pour les opérations d'écriture.
> - Voici un exemple d'une `Command` qui permet d'ajouter un nouvel article dans une application :
```php
<?php

namespace App\Application\Article\Command;

use App\Domain\Article\Article;

class AddArticleCommand
{
    private Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }
}
```
> - On peut voir que la `classe AddArticleCommand` modélise une `command` qui permet d'ajouter un nouvel article dans une application, avec un attribut `article` qui représente l'article à ajouter.
> - Le constructeur de la classe permet d'initialiser l'attribut `article` avec l'article à ajouter et la méthode `getArticle` permet de récupérer l'article à ajouter.
> - Cette `command` va être gérée par un `CommandHandler` qui va exécuter la logique métier nécessaire pour ajouter l'article dans l'application.
> - Voici un exemple de `CommandHandler` qui gère la `command` `AddArticleCommand` :
```php
<?php

namespace App\Application\Article\CommandHandler;

use App\Application\Article\Command\AddArticleCommand;
use App\Domain\Article\ArticleRepositoryInterface;

class AddArticleCommandHandler
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function handle(AddArticleCommand $command): void
    {
        $article = $command->getArticle();
        $this->articleRepository->add($article);
    }
}
```
> - On peut voir que la `classe AddArticleCommandHandler` gère la `command` `AddArticleCommand` en ajoutant l'article dans l'application en utilisant le `ArticleRepositoryInterface` qui est une interface située dans la couche `Domain` de l'application.
> - Le constructeur de la classe permet d'initialiser l'attribut `articleRepository` avec une instance de `ArticleRepositoryInterface` et la méthode `handle` permet d'exécuter la logique métier nécessaire pour ajouter l'article dans l'application.
> - Maintenant que l'article a été ajouté dans l'application, on peut utiliser une `Query` pour récupérer la liste des articles et l'afficher dans l'interface utilisateur.
> - Voici un exemple d'une `Query` qui permet de récupérer la liste des articles dans une application :
```php
<?php

namespace App\Application\Article\Query;

use App\Domain\Article\ArticleRepositoryInterface;

class GetArticles
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function execute(): array
    {
        return $this->articleRepository->getAll();
    }
}
```
> - On peut voir que la `classe GetArticles` modélise une `query` qui permet de récupérer la liste des articles dans une application en utilisant le `ArticleRepositoryInterface` qui est une interface située dans la couche `Domain` de l'application.
> - Le constructeur de la classe permet d'initialiser l'attribut `articleRepository` avec une instance de `ArticleRepositoryInterface` et la méthode `execute` permet de récupérer la liste des articles dans l'application.
> - Cette `query` sera donc gérée par un `QueryHandler` qui va exécuter la logique métier nécessaire pour récupérer la liste des articles dans l'application.
> - Voici un exemple de `QueryHandler` qui gère la `query` `GetArticles` :
```php
<?php

namespace App\Application\Article\QueryHandler;

use App\Application\Article\Query\GetArticles;
use App\Domain\Article\ArticleRepositoryInterface;

class GetArticles
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function handle(GetArticles $query): array
    {
        return $this->articleRepository->getAll();
    }
}
```
> - On peut voir que la `classe GetArticlesHandler` gère la `query` `GetArticles` en récupérant la liste des articles dans l'application en utilisant le `ArticleRepositoryInterface` qui est une interface située dans la couche `Domain` de l'application.
> - Le constructeur de la classe permet d'initialiser l'attribut `articleRepository` avec une instance de `ArticleRepositoryInterface` et la méthode `handle` permet de récupérer la liste des articles dans l'application.
> - Dans une application `Symfony`, on peut utiliser le `command bus` et le `query bus` pour gérer les `commands` et les `queries` de façon centralisée et déléguer leur exécution aux `CommandHandlers` et `QueryHandlers` correspondants.
> - De plus il est possible d'utiliser des `command` et des `query` de façon `asynchrone` c'est-à-dire de les `exécuter en arrière-plan` pour améliorer les performances de l'application et la `réactivité` de l'interface utilisateur.
> - Ou alors de les `exécuter de façon synchrone` c'est-à-dire de les `exécuter en temps réel` pour obtenir des résultats immédiats et afficher des informations en temps réel dans l'interface utilisateur.
> - Ce qui sera utile pour des fonctionnalités comme la `synchronisation de données`, la `notification en temps réel`, la `gestion de tâches longues`, etc.
> - Voici à quoi ressemble l'architecture `CQRS` dans une application `Symfony` :
```
src/
├── Application/
│   └── Article/
│       ├── Command/
│       │   ├── AddArticleCommand.php
│       │   └── AddArticleCommandHandler.php
│       └── Query/
│           ├── GetArticles.php
│           └── GetArticlesHandler.php
├── Domain/
│   └── Article/
│       ├── Article.php
│       └──  ArticleRepositoryInterface.php
```
> - On peut voir que les `commands` et les `queries` sont situés dans le répertoire `Application` de l'application et les `CommandHandlers` et les `QueryHandlers` sont situés dans le répertoire `Application` de l'application.
> - Les `entités` et les `interfaces` sont situées dans le répertoire `Domain` de l'application et permettent de modéliser les concepts métier de l'application et de définir les contrats nécessaires pour interagir avec ces concepts métier.
> - En résumé, l'architecture `CQRS` permet de séparer les opérations de lecture des opérations d'écriture dans une application en utilisant des `commands` et des `queries` pour gérer les opérations de façon centralisée et déléguer leur exécution aux `CommandHandlers` et `QueryHandlers` correspondants.

## 3. [Hexagonal Architecture] :
> - L'architecture `Hexagonal` est une `approche de conception` logicielle qui consiste à `découper` une application en `couches` et à `isoler` la logique métier de l'application dans une `couche centrale` appelée le `noyau` de l'application.
> - Par exemple, une application peut avoir des `couches` comme la `couche de présentation` qui gère l'interface utilisateur, la `couche de domaine` qui gère la logique métier de l'application et la `couche d'infrastructure` qui gère les détails techniques de l'application.
> - Voici un exemple de l'architecture `Hexagonal` d'une application `Symfony` :
```
src/
├── Article/
│   ├── Application/
│   │   ├── Command/
│   │   │   ├── AddArticleCommand.php
│   │   │   └── AddArticleCommandHandler.php
│   │   └── Query/
│   │       ├── GetArticles.php
│   │       └── GetArticlesHandler.php
│   ├── Domain/
│   │   ├── Article.php
│   │   └──  ArticleRepositoryInterface.php
│   ├──Infrastructure/
│   │    ├── Adapter/
│   │    ├── Database/
│   │    │   └── ORM/*
│   │    │       └──  Doctrine\
│   │    ├── Repository/
│   │    │   └── ArticleRepository.php
│   │    └── Service/
│   │         └── ArticleService.php
│   └── Presentation/
│       ├── Controller/
│       │   └── ArticleController.php
│       ├── Provider/
│       │   └── ArticleProvider.php
│       └── Serializer/
│           └── ArticleSerializer.php
```
> - On peut voir que l'application est découpée en `couches` qui correspondent à des `responsabilités` spécifiques de l'application et qui permettent de `séparer` les `préoccupations` de l'application.
> - La `couche de présentation` gère l'interface utilisateur de l'application en utilisant des `contrôleurs`, des `fournisseurs` et des `sérialiseurs` pour afficher des informations à l'utilisateur et récupérer des informations de l'utilisateur.
> - La `couche de domaine` gère la logique métier de l'application en utilisant des `entités`, des `valeurs objets` et des `interfaces` pour modéliser les concepts métier de l'application et définir les contrats nécessaires pour interagir avec ces concepts métier.
> - La `couche d'infrastructure` gère les détails techniques de l'application en utilisant des `adaptateurs`, des `services` et des `référentiels` pour interagir avec des services externes, des bases de données et d'autres composants techniques de l'application.
> - La procédure pour mettre en place une architecture `Hexagonal` dans une application `Symfony` est la suivante :
> > 1. -  Créer les `entités` et les `interfaces` qui modélisent les concepts métier de l'application dans la couche `Domain`.
> > 2. -  Créer les `commands` et les `queries` qui permettent de gérer les opérations de lecture et d'écriture dans la couche `Application`.
> > 3. -  Créer les `CommandHandlers` et les `QueryHandlers` qui gèrent les `commands` et les `queries` dans la couche `Application`.
> > 4. -  Créer les `adaptateurs`, les `services` et les `référentiels` qui interagissent avec des services externes, des bases de données et d'autres composants techniques de l'application dans la couche `Infrastructure`.
> > 5. -  Créer les `contrôleurs`, les `fournisseurs` et les `sérialiseurs` qui gèrent l'interface utilisateur de l'application dans la couche `Présentation`.
> - En résumé, l'architecture `Hexagonal` permet de découper une application en `couches` et d'isoler la logique métier de l'application dans une `couche centrale` appelée le `noyau` de l'application.
> - Pour ce faire, on y mélangera les concepts de `DDD` et de `CQRS` pour rendre le code source de l'application plus `compréhensible` et plus `modulaire` et pour faciliter le `développement`, la `maintenance` et l'`évolution` de l'application.