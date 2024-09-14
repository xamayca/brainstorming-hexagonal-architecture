# PHPStan Installation & Utilisation (PHP Static Analysis Tool)

## Introduction
> - PHPStan est un outil d'analyse statique pour PHP qui découvre les erreurs dans votre code sans l'exécuter. Il permet de vérifier la qualité de votre code PHP en détectant les erreurs potentielles.
> - Il permet de détecter les erreurs potentielles dans votre code PHP sans l'exécuter.
> - Il vérifie votre code en fonction de divers niveaux de règles prédéfinies & permet de vérifier la qualité de votre code PHP en détectant les erreurs potentielles.

## Définition
> - PHPStan est un outil d'analyse statique pour PHP qui découvre les erreurs dans votre code sans l'exécuter. Il permet de vérifier la qualité de votre code PHP en détectant les erreurs potentielles.
> - Il permet de détecter les erreurs potentielles dans votre code PHP sans l'exécuter. Il vérifie votre code en fonction de divers niveaux de règles prédéfinies.

## Avant d'installer PHPStan
> - Avant d'installer PHP Stan, nous devons nous rendre dans `/config/routes.yaml` et supprimer la route par défaut de Symfony :
```yaml
# config/routes.yaml
controllers:
  resource:
    path: ../src/Controller/
    namespace: App\Controller
  type: attribute
```
> - Pourquoi ? Par ce que si on installe PHPStan sans supprimer cette route, nous aurons une erreur de type "The file ".../src/Controller/" does not exist.".'
> - Cette erreur est due au fait que lors que composer installe PHPStan, il va essayer de scanner le répertoire `/src/Controller/` qui n'existe pas.
> - Pour éviter cette erreur, nous devons supprimer cette route de Symfony avant d'installer PHPStan.

## Installation de PHPStan (Documentation : https://phpstan.org/user-guide/getting-started)
> - Installer PHPStan via Composer :
```bash
composer require --dev phpstan/phpstan
```
> - Pendant l'installation, Composer va télécharger et installer PHPStan dans le répertoire vendor/ de votre projet.
> - Vous serrez invité à choisir si vous voulez utiliser la recette Symfony pour PHPStan, choisissez "y" pour utiliser la recette Symfony ou "n" pour ne pas l'utiliser.
> - Ici, nous allons choisir de ne pas utiliser la recette Symfony pour PHPStan, donc nous allons répondre "n" à la question.
```txt
Symfony operations: 1 recipe (21329b0fc477a751588edf3e25a2cce9)
  -  WARNING  phpstan/phpstan (>=1.0): From github.com/symfony/recipes-contrib:main
    The recipe for this package comes from the "contrib" repository, which is open to community contributions.
    Review the recipe at https://github.com/symfony/recipes-contrib/tree/main/phpstan/phpstan/1.0

    Do you want to execute this recipe?
    [y] Yes
    [n] No
    [a] Yes for all packages, only for the current installation session
    [p] Yes permanently, never ask again for this project
    (defaults to n): n
```
> - Cela va installer PHPStan dans le répertoire vendor/ de votre projet et vous pourrez lancer PHPStan pour analyser votre code PHP.
> - Il ne crée pas de fichier de configuration par défaut car nous avons choisi de ne pas utiliser la recette Symfony pour PHPStan.
> - Nous verrons comment configurer PHPStan et l'utiliser pour analyser le code de votre projet PHP dans les sections suivantes.

## Utilisation
> - Pour lancer PHPStan et analyser le code de votre projet contenu dans le répertoire src/ :
```bash
vendor/bin/phpstan analyse src
```
> - Pour lancer PHPStan et analyser le code de votre projet contenu dans le répertoire src/ avec un niveau de règle spécifique (0 à 9) :
```bash
vendor/bin/phpstan analyse src --level 5
```
> - Pour lancer PHPStan et analyser le code de votre projet contenu dans le répertoire src/ avec un niveau de règle maximum (9) :
```bash
vendor/bin/phpstan analyse src --level max
```

## Configuration de PHPStan (phpstan.neon)
> - Pour configurer PHPStan, vous pouvez créer un fichier de configuration "phpstan.neon" à la racine de votre projet.
> - Voici un exemple de fichier de configuration PHPStan avec des règles de configuration personnalisées :
```neon
# phpstan.neon

parameters:
    level: 8
    paths:
        - bin
        - config
        - public
        - src
        - tests
```
> - Dans ce fichier de configuration, nous avons défini le niveau de règle PHPStan à 8 et les répertoires à analyser (bin, config, public, src).
> - Nous n'avons pas utilisé la recette Symfony pour PHPStan, car il y ajoute par défaut le répertoire `tests/` à analyser, qui n'existe pas dans encore dans notre projet.
> - Nous avons donc défini les répertoires à analyser dans le fichier de configuration PHPStan pour éviter les erreurs lors de l'analyse du code.
> - Vous pouvez personnaliser les règles de configuration PHPStan en fonction de vos besoins et de votre projet en modifiant le fichier de configuration `phpstan.neon`.
> - La seule différence entre un fichier `phpstan.neon` et un fichier `phpstan.neon.dist` est que le premier ne sera pas envoyé sur le dépôt Git tandis que le second oui.
> - C'est utile dans le cadre d'un projet collaboratif, pour que chaque développeur puisse avoir la configuration de PHPStan lorsqu'il clone le projet.

## Utilisation de notre configuration PHPStan
> - Pour lancer PHPStan avec notre configuration personnalisée, vous pouvez utiliser la commande suivante :
```bash
vendor/bin/phpstan analyse --configuration phpstan.neon
```
> - Ou tout simplement :
```bash
vendor/bin/phpstan analyse
```
> - PHPStan va utiliser le fichier de configuration `phpstan.neon` à la racine de votre projet pour analyser le code de votre projet.
> - Vous pouvez voir ici que nous ne précisons pas le répertoire à analyser, car il est déjà défini dans le fichier de configuration `phpstan.neon`.
> - Si vous avez des erreurs dans votre code, PHPStan va les afficher et vous pourrez les corriger pour améliorer la qualité de votre code PHP.
> - Si nous lançons PHPStan sans fichier de configuration, PHPStan va utiliser les règles par défaut pour analyser le code de votre projet.

## Extension PHPStan pour Doctrine (Documentation : https://github.com/phpstan/phpstan-doctrine)
> - Pour utiliser PHPStan avec Doctrine, vous pouvez installer l'extension PHPStan pour Doctrine via Composer :
```bash
composer require --dev phpstan/phpstan-doctrine
```
> - Cette extension permet d'ajouter des règles de validation pour Doctrine dans PHPStan et d'améliorer la qualité de votre code PHP.
> - Elle ajoute des règles de validation DQL pour les erreurs d'analyse, les classes d'entités inconnues et les champs persistants inconnus.
> - Elle permet aussi de reconnaître la magie des méthodes de Doctrine, les annotations Doctrine et les types de retour des méthodes de Doctrine.

## Configuration de PHPStan avec l'extension Doctrine
> - Pour configurer PHPStan avec l'extension Doctrine, vous pouvez ajouter l'extension Doctrine à votre fichier de configuration PHPStan `phpstan.neon` :
```neon
# phpstan.neon

includes:
    - vendor/phpstan/phpstan-doctrine/extension.neon
    - vendor/phpstan/phpstan-doctrine/rules.neon

parameters:
    level: 8
    paths:
        - bin
        - config
        - public
        - src
        - tests

    doctrine:
    	objectManagerLoader: tests/PHPStan/object-manager.php
```
> - Dans ce fichier de configuration, nous avons inclus les fichiers `extension.neon` et `rules.neon` de l'extension Doctrine pour PHPStan.
> - Le fichier `extension.neon` ajoute des règles de `validation pour Doctrine` dans PHPStan et améliore la qualité de votre code PHP.
> - Le fichier `rules.neon` ajoute des règles de `validation DQL` pour les erreurs d'analyse, les classes d'entités inconnues et les champs persistants inconnus.
> - Nous avons aussi ajouté un paramètre `doctrine` pour spécifier le fichier `doctrine-object-manager.php` qui charge l'EntityManager de Doctrine.
> - Maintenant, nous allons avoir besoin de créer le fichier `doctrine-object-manager.php` dans le répertoire `tests/PHPStan/` pour charger l'EntityManager de Doctrine.
> - Voici un exemple de fichier `doctrine-object-manager.php` pour charger l'EntityManager de Doctrine :
```php
<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../../vendor/autoload.php';

(new Dotenv())->bootEnv(__DIR__ . '/../../.env');

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$kernel->boot();
return $kernel->getContainer()->get('doctrine.orm.entity_manager');
```
> - De cette façon, PHPStan auras accès à `l'EntityManager de Doctrine` et seras en mesure de `comprendre` les `annotations` Doctrine et les `types de retour` des `méthodes` de Doctrine.
> - Mais aussi de reconnaître la magie des méthodes de Doctrine et de valider les `erreurs d'analyse`, les `classes d'entités inconnues` et les `champs persistants inconnus`.
> - Maintenant, nous sommes en mesure d'obtenir des erreurs fiables, car PHPStan connait l'EntityManager de Doctrine et ne nous affichera pas d'erreurs d'incompréhension.

## Utilisation de PHPStan avec l'extension Symfony
> - Pour utiliser PHPStan avec l'extension Symfony, vous pouvez installer l'extension PHPStan pour Symfony via Composer :
```bash
composer require --dev phpstan/phpstan-symfony
```
