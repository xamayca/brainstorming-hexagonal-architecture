# PROJET API RESTFULL - API Platform & Symfony 7

### Documentations
> - Architecture (Hexagonal) :
> - https://medium.com/@albert.llousas/hexagonal-architecture-common-pitfalls-f155e12388a3
> - Architecture (Clean & Hexagonal) :
> - https://www.youtube.com/watch?v=2H1rdx3al_8
> - Symfony :
> - https://symfony.com/doc/current/index.html
> - Symfony (Validation) :
> - https://symfony.com/doc/current/validation.html
> - Symfony (Constraints) :
> - https://symfony.com/doc/current/reference/constraints.html
> - Symfony (User Checker) :
> - https://symfony.com/doc/current/security/user_checkers.html
> - API Platform :
> - https://api-platform.com/docs/core/
> - API Platform (User Class) :
> - https://api-platform.com/docs/core/user/
> - API Platform (OpenAPI) :
> - https://api-platform.com/docs/admin/openapi/#openapi
> - API Platform (User Password Hasher) :
> - https://api-platform.com/docs/core/user/
> - JWT.io (Debug JWT Token) :
> - https://jwt.io/introduction/
> - LexikJWTAuthenticationBundle :
> - https://github.com/lexik/LexikJWTAuthenticationBundle/blob/3.x/Resources/doc/index.rst#installation
> - LexikJWTAuthenticationBundle (Docs):
> - https://github.com/lexik/LexikJWTAuthenticationBundle/tree/3.x/Resources/doc

## Sommaire
> - ### [1-Architecture](https://github.com/xamayca/api-hexagonal/blob/master/Documentation/1-Architecture.md)
> - ### [2-Configuration de base.md](https://github.com/xamayca/api-hexagonal/blob/master/Documentation/2-Configuration%20de%20base.md)
> - ### [3-Route & Mapping (Registration).md](https://github.com/xamayca/api-hexagonal/blob/master/Documentation/3-Route%20%26%20Mapping%20(Registration).md)

# PHP STAN - PHP Static Analysis Tool

### Documentations
> - PHP Stan :
> - https://phpstan.org/user-guide/getting-started

## Définition
> - PHPStan est un outil d'analyse statique pour PHP qui découvre les erreurs dans votre code sans l'exécuter. Il permet de vérifier la qualité de votre code PHP en détectant les erreurs potentielles.
> - Il permet de détecter les erreurs potentielles dans votre code PHP sans l'exécuter. Il vérifie votre code en fonction de divers niveaux de règles prédéfinies.

## Installation
> - Installer PHPStan via Composer :
```bash
composer require --dev phpstan/phpstan
```

## Utilisation
> - Pour lancer PHPStan et analyser le code de votre projet contenu dans le répertoire src/ :
```bash
vendor/bin/phpstan analyse src
```

