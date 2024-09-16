# SOLID (Principe de programmation orientée objet)

## Introduction
> - Les principes SOLID sont un ensemble de cinq principes de conception de logiciels qui permettent de créer des logiciels plus faciles à maintenir et à étendre.
> - Ces principes ont été introduits par Robert C. Martin dans les années 2000 et sont largement utilisés dans le développement logiciel moderne.
> - Les principes SOLID sont les suivants :
> - - **S** : Single Responsibility Principle (SRP)
> - - **O** : Open/Closed Principle (OCP)
> - - **L** : Liskov Substitution Principle (LSP)
> - - **I** : Interface Segregation Principle (ISP)
> - - **D** : Dependency Inversion Principle (DIP)
> - Chaque principe SOLID est un guide pour la conception de logiciels orientés objet et permet de créer des logiciels plus flexibles, extensibles et faciles à maintenir.

## 1. Single Responsibility Principle (SRP)
> - Le principe de `responsabilité unique (Single Responsibility Principle)` est le premier principe SOLID.
> - Ce principe stipule qu'une classe ne doit avoir `qu'une seule raison de changer` (une seule responsabilité).
> - En d'autres termes, une classe doit avoir `une seule responsabilité` et ne doit `pas être responsable` de `plusieurs tâches` différentes.
> - Ce principe permet de créer des classes plus `cohérentes`, plus faciles à `comprendre` et à `maintenir`.
> - Exemple de classe qui viole le principe SRP :
```php
<?php

class User
{
    public function create()
    {
        // Créer un utilisateur
    }

    public function sendEmail()
    {
        // Envoyer un email
    }
}
```
> - Dans cet exemple, la classe `User` a deux responsabilités : créer un utilisateur et envoyer un email.
> - Pour respecter le principe SRP, nous devons séparer ces deux responsabilités en deux classes distinctes.
> - Exemple de classe qui respecte le principe SRP :
```php
<?php

class User
{
    public function create()
    {
        // Créer un utilisateur
    }
}

class Email
{
    public function send()
    {
        // Envoyer un email
    }
}
```
> - Dans cet exemple, nous avons séparé les responsabilités de création d'utilisateur et d'envoi d'email en deux classes distinctes (`User` et `Email`).
> - Cela permet de respecter le `principe SRP` et de créer des classes plus cohérentes et plus faciles à maintenir.
> - En respectant le principe SRP, nous créons des classes plus `modulaires`, plus `réutilisables` et plus `faciles à tester`.

## 4. Interface Segregation Principle (ISP)
> - Le principe de `ségrégation des interfaces (Interface Segregation Principle)` est le quatrième principe SOLID.
> - Ce principe stipule qu'une `interface` ne doit `pas forcer` les `classes` qui l'implémentent à `mettre en œuvre des méthodes` qu'elles n'utilisent pas.
> - 