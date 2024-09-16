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

## 2. Open/Closed Principle (OCP)
> - Le principe `ouvert/fermé (Open/Closed Principle)` est le deuxième principe SOLID.
> - Ce principe stipule qu'une classe doit être `ouverte à l'extension` mais `fermée à la modification`.





## 5 Principe d'inversion de dépendance (DIP)
> - Le principe `d'inversion de dépendance (Dependency Inversion Principle)` est le cinquième principe SOLID.
> - Ce principe stipule que les `modules de haut niveau` ne doivent `pas dépendre` des `modules de bas niveau`.
> - Au lieu de cela, les deux niveaux de modules doivent dépendre d'`abstractions` (interfaces ou classes abstraites).
> - Ce principe permet de `réduire` les `couplages` entre les modules et de rendre le code plus `flexible` et plus `facile à étendre`.
> - Voici un exemple de code qui viole le principe DIP :
```php
<?php

class MySQLDatabase
{
    public function connect()
    {
        // Connexion à la base de données MySQL
    }
}

class User
{
    public function __construct(private MySQLDatabase $database)
    {
       // Injection de dépendance
    }
    
    public function create()
    {
        $this->database->connect();
        // Créer un utilisateur
    }
}
```
> - Dans cet exemple, la classe `User` dépend directement de la classe `MySQLDatabase`, car elle utilise une instance de `MySQLDatabase` pour se connecter à la base de données.
> - Ce qui crée une dépendance concrète entre les deux classes et viole le principe DIP.
> - Maintenant le problème est que si nous voulons changer la base de données de MySQL à PostgreSQL, nous devrons modifier la classe `User` pour utiliser une instance de `PostgreSQLDatabase` à la place de `MySQLDatabase`.
> - Pour respecter le principe DIP, nous devons introduire une `interface` ou une `classe abstraite` entre les deux classes pour `définir un contrat` commun.
> - Voici un exemple de code qui respecte le principe DIP :
```php
<?php

interface DatabaseInterface
{
    public function connect();
}

class MySQLDatabase implements DatabaseInterface
{
    public function connect()
    {
        // Connexion à la base de données MySQL
    }
}

class PostgreSQLDatabase implements DatabaseInterface
{
    public function connect()
    {
        // Connexion à la base de données PostgreSQL
    }
}

class User
{
    public function __construct(private DatabaseInterface $database)
    {
       // Injection de dépendance
    }
    
    public function create()
    {
        $this->database->connect();
        // Créer un utilisateur
    }
}
```
> - Dans cet exemple, nous avons introduit une `interface` `DatabaseInterface` qui définit une méthode `connect` commune à toutes les classes de base de données.
> - La classe `MySQLDatabase` implémente cette interface et fournit une implémentation concrète de la méthode `connect`.
> - La classe `PostgreSQLDatabase` implémente également cette interface et fournit une implémentation concrète de la méthode `connect`.
> - La classe `User` dépend maintenant de l'interface `DatabaseInterface` au lieu d'une implémentation concrète de la base de données, de cette façon, nous avons `inversé la dépendance`.
> - Car maintenant, c'est la classe `MySQLDatabase` et la classe `PostgreSQLDatabase` qui dépendent de l'interface `DatabaseInterface`.
> - Cela respecte le principe DIP en introduisant une `abstraction` entre les deux classes et en réduisant les `couplages` entre elles.
