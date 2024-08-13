# 3 - Route & Mapping (Registration)

## Introduction
> - Dans cette partie, nous allons mapper notre route d'inscription dans le fichier `config/routes.yaml`.
> - Nous allons également mapper l'inscription dans doctrine pour que les données soient persistées en base de données.

## Configuration de la route
> - Ouvrez le fichier `config/routes.yaml` et ajoutez la route suivante :
```yaml
registration:
    resource:
        path: '../src/Registration/Presentation/Controller/'
        namespace: App\Registration\Presentation\Controller
    type: attribute
```
> - Cette route permet de mapper les contrôleurs de la partie `Registration` de notre application.

## Mapping de l'inscription
> - Ouvrez le fichier `config/packages/doctrine.yaml` et ajoutez la configuration suivante :
```yaml
doctrine:
    orm:
        mappings:
            Registration:
            type: attribute
            is_bundle: false
            dir: '%kernel.project_dir%/src/Registration/Domain'
            prefix: 'App\Registration\Domain'
            alias: Registration
```
> - Cette configuration permet de mapper les entités de la partie `Registration` de notre application.
