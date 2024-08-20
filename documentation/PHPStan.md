https://makina-corpus.com/symfony/iterations-vers-ddd-et-clean-architecture-symfony-article-2

# 4 - PHPStan Installation & Utilisation (PHP Static Analysis Tool)

## Introduction
> - PHPStan est un outil d'analyse statique pour PHP qui découvre les erreurs dans votre code sans l'exécuter. Il permet de vérifier la qualité de votre code PHP en détectant les erreurs potentielles.
> - Il permet de détecter les erreurs potentielles dans votre code PHP sans l'exécuter.
> - Il vérifie votre code en fonction de divers niveaux de règles prédéfinies & permet de vérifier la qualité de votre code PHP en détectant les erreurs potentielles.

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
> - Pour lancer PHPStan et analyser le code de votre projet contenu dans le répertoire src/ avec un niveau de règle spécifique (0 à 9) :
```bash
vendor/bin/phpstan analyse src --level 5
```
> - Pour lancer PHPStan et analyser le code de votre projet contenu dans le répertoire src/ avec un niveau de règle maximum (9) :
```bash
vendor/bin/phpstan analyse src --level max
```


