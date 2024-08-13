# 1 - L'ARCHITECTURE (Clean & Hexagonal)

## Introduction
> - L'architecture Clean & Hexagonale est une architecture logicielle qui permet de concevoir des applications web de manière modulaire et maintenable.
> - Elle se base sur les principes de séparation des préoccupations, de découplage des composants et d'inversion de dépendances.
> - Permet de rendre les applications web plus flexibles, évolutives et testables.
> - Composée de plusieurs couches (domaine, application, infrastructure) qui permettent de séparer les différentes responsabilités de l'application web.
> - Basée sur le principe de l'hexagone qui consiste à placer le domaine métier au centre de l'application et à le protéger des dépendances externes.

## Architecture Clean & Hexagonale
> - L'architecture Clean & Hexagonale se compose de plusieurs couches qui permettent de séparer les différentes responsabilités de l'application web.
> - Chaque couche a un rôle spécifique et communique avec les autres couches de manière bien définie et contrôlée.
> - Les différentes couches de l'architecture Clean & Hexagonale sont les suivantes :
> > - La couche Domaine : contient les entités (User, Article, Comment, etc.), les valeurs objets (Email, Password, etc.), les services (UserService, ArticleService, CommentService, etc.) et les interfaces (UserRepositoryInterface, ArticleRepositoryInterface, CommentRepositoryInterface, etc.).
> > - La couche Application : contient les cas d'utilisation (CreateUser, UpdateUser, DeleteUser, etc.), les services d'application (UserService, ArticleService, CommentService, etc.) et les interfaces (CreateUserInterface, UpdateUserInterface, DeleteUserInterface, etc.).
> > - La couche Infrastructure : contient les adaptateurs (UserRepository, ArticleRepository, CommentRepository, etc.), les services d'infrastructure (UserService, ArticleService, CommentService, etc.) et les interfaces (UserRepositoryInterface, ArticleRepositoryInterface, CommentRepositoryInterface, etc.).
> > - La couche Présentation : contient les contrôleurs (UserController, ArticleController, CommentController, etc.), les vues (user.html.twig, article.html.twig, comment.html.twig, etc.) et les interfaces de présentation (UserInterface, ArticleInterface, CommentInterface, etc.).
> - L'hexagone ici représente le domaine métier de l'application web et les différentes couches (Application, Infrastructure, Présentation) sont les côtés de l'hexagone qui communiquent avec le domaine métier.
> - Tandis que l'architecture Clean elle-même est basée sur les principes de séparation des préoccupations, de découplage des composants et d'inversion de dépendances.

## Exemple d'architecture Clean & Hexagonale
> - Pour illustrer l'architecture Clean & Hexagonale, nous allons prendre l'exemple d'une application web de gestion d'utilisateurs.
> - L'application web de gestion d'utilisateurs permet de créer, lire, mettre à jour et supprimer des utilisateurs.
> - Voici un exemple d'architecture Clean & Hexagonale pour l'application web de gestion d'utilisateurs :
```txt
├───src
│   └───Registration
│       ├───Application
│       │   ├───Repository
│       │   ├───Service
│       │   └───UseCase
│       ├───Domain
│       │   ├───Entity
│       │   ├───Repository
│       │   ├───Service
│       │   └───ValueObject
│       ├───Infrastructure
│       │   ├───Adapter
│       │   ├───Processor
│       │   ├───Repository
│       │   ├───Serializer
│       │   └───Service
│       └───Presentation
│           ├───ApiResource
│           ├───Controller
│           ├───Interface
│           └───View
├───templates
```
> - L'architecture Clean & Hexagonale de l'application web de gestion d'utilisateurs est composée de plusieurs couches qui permettent de séparer les différentes responsabilités de l'application web.
> - De cette manière, l'application web de gestion d'utilisateurs est plus modulaire, maintenable et testable, car tout le code métier (entités, valeurs objets, services, cas d'utilisation, adaptateurs, etc.) est isolé dans la couche Domaine et les autres couches (Application, Infrastructure, Présentation) communiquent avec la couche Domaine de manière contrôlée.
> - Il sera plus facile de modifier, ajouter ou supprimer des fonctionnalités de l'application web, ou en cas d'évolution des technologies ou des besoins métiers car les différentes couches de l'architecture Clean & Hexagonale sont découplées et dépendent uniquement de la couche Domaine.
