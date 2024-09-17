# INTERFACES & REPOSITORIES

# 1. Les interfaces
> - Une interface est un contrat (par exemple, un ensemble de méthodes) qui définit comment une classe doit se comporter.
> - Une interface est un moyen de définir un contrat pour les classes qui l'implémentent et de garantir que ces classes implémentent les méthodes définies dans l'interface.
> - Une interface ne contient que des signatures de méthodes (pas de corps de méthode), c'est-à-dire des déclarations de méthodes sans implémentation.
> - Une classe qui implémente une interface doit fournir une implémentation pour toutes les méthodes définies dans l'interface.
> - Une interface peut être utilisée pour définir un contrat commun entre plusieurs classes qui ont des comportements similaires.
> - Voici un exemple d'une interface `FormatterInterface` qui définit une méthode `format` :
```php
<?php

interface FormatterInterface
{
    public function format(string $text): string;
}
```
> - Dans cet exemple, l'interface `FormatterInterface` définit une méthode `format` qui prend une chaîne de caractères en entrée (`$text`) et renvoie une chaîne de caractères en sortie (`string`).
> - C'est ce qu'on appelle un `contrat` car toutes les classes qui implémentent cette interface doivent fournir une implémentation pour la méthode `format` qui respecte le contrat défini par l'interface.
> - C'est-à-dire que toutes les classes qui implémentent l'interface `FormatterInterface` doivent avoir une méthode `format` qui prend une chaîne de caractères en entrée et renvoie une chaîne de caractères en sortie.
> - Voici un exemple d'une classe `PDFFormatter` qui implémente l'interface `FormatterInterface` :
```php
<?php

class PDFFormatter implements FormatterInterface
{
    public function format(string $text): string
    {
        // Implémentation de la méthode format pour le format PDF
    }
}
```
> - Dans cet exemple, la classe `PDFFormatter` implémente l'interface `FormatterInterface` et fournit une implémentation pour la méthode `format` qui respecte le contrat défini par l'interface.
> - Donc, ce sera PDF Formatter qui va définir comment formater le texte en PDF en fonction de l'implémentation de la méthode `format` en respectant le contrat défini par l'interface `FormatterInterface`.
> - Il devra donc prendre une chaîne de caractères en entrée et renvoyer une chaîne de caractères en sortie pour respecter le contrat défini par l'interface `FormatterInterface`.
> - En gros, l'interface contient le `quoi` (les méthodes à implémenter) et les classes qui l'implémentent contiennent le `comment` (l'implémentation des méthodes).
> - Les interfaces sont un moyen puissant de définir des contrats entre les classes et de garantir que ces classes respectent ces contrats.
> - De cette façon, on s'assure que notre classe utilise les méthodes définies dans l'interface et que ces méthodes sont implémentées correctement.

# 2. Les repositories
> - Un `Repository` est une classe qui permet de récupérer, stocker et supprimer des entités dans la base de données.
> - C'est une couche d'abstraction entre l'application et la base de données qui permet de manipuler les entités sans avoir à écrire de requêtes SQL directement.
> - Un `Repository` contient des méthodes pour effectuer des opérations de base sur les entités, telles que la recherche par identifiant, la sauvegarde et la suppression.
> - Voici un exemple de repository pour une entité `Post` qui permet de manipuler les posts dans la base de données :
```php
<?php

namespace App\Post\Infrastructure\Repository;

use App\Post\Domain\Entity\Post;

class PostRepository implements PostRepositoryInterface
{
    public function find(PostId $id): ?Post
    {
        // Rechercher un post par son identifiant
    }

    public function save(Post $post): void
    {
        // Sauvegarder un post dans la base de données
    }

    public function delete(Post $post): void
    {
        // Supprimer un post de la base de données
    }
}
```
> - Dans cet exemple, la classe `PostRepository` est un repository pour l'entité `Post` qui implémente l'interface `PostRepositoryInterface`.
> - L'interface `PostRepositoryInterface` définit les méthodes `find`, `save` et `delete` qui doivent être implémentées par le repository de l'entité `Post`.
> - Donc `PostRepositoryInterface` sers de contrat pour le repository de l'entité `Post` et garantit que le repository implémente les méthodes nécessaires pour manipuler les posts dans la base de données avec les bonnes signatures (types de paramètres et de retour).
> - Le repository `PostRepository` contient les implémentations des méthodes `find`, `save` et `delete` qui permettent de rechercher, sauvegarder et supprimer un post dans la base de données.
> - C'est donc lui qui va `gérer la logique` des méthodes (requêtes SQL, manipulation des données, etc.) pour interagir avec la base de données et `manipuler les posts`.
> - En utilisant un repository, on `isole la logique d'accès aux données de l'application` et on la rend plus modulaire et réutilisable.
> - De plus, grâce à l'interface, on `s'assure` que `le repository respecte un contrat commun` et qu'il peut être `facilement remplacé` par un autre repository qui `implémente la même interface` (par exemple, pour changer de base de données).

# 3. Conclusion
> - Les interfaces et les repositories sont des concepts clés en programmation orientée objet et en architecture logicielle.
> - Les interfaces permettent de définir des contrats entre les classes et de garantir que ces classes respectent ces contrats.
> - Les repositories permettent de manipuler les entités dans la base de données de manière modulaire et réutilisable.
> - En combinant les interfaces et les repositories, on peut créer des applications plus flexibles, modulaires et faciles à maintenir.