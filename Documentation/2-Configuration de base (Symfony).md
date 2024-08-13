# 2 - CONFIGURATION DE BASE (Symfony)

## Introduction
> - Pour que l'application Symfony fonctionne correctement avec l'architecture Clean & Hexagonale, il est nécessaire de configurer quelques éléments de base.
> - Ces éléments de configuration de base permettent de définir les paramètres généraux de l'application Symfony, de configurer les routes, les contrôleurs, les services, les entités, etc.
> - Voici les différentes étapes de configuration de base pour une application Symfony avec l'architecture Clean & Hexagonale.

## Configuration de base
> - Pour configurer une application Symfony avec l'architecture Clean & Hexagonale, il est nécessaire de suivre les étapes suivantes :
> - Modifier le fichier `config/services.yaml`:
```yaml
App\:
  resource: '../src/'
  exclude:
    - '../src/DependencyInjection/'
    - '../src/Kernel.php'
```
> - Ici, nous avons retiré l'exclusion du répertoire `../src/Entity/` car dans notre architecture Clean & Hexagonale, les entités se trouvent dans le répertoire `../src/**/Domain/Entity/`.
> - `**` correspondant à un répertoire situé entre `src/` et `Domain/Entity/`, exemple : `Registration/Domain/Entity/`.
> - Modifier le fichier `config/routes.yaml`:
```yaml