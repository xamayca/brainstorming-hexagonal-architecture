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
> - En d'autres termes, une classe doit pouvoir être `étendue` pour ajouter de nouvelles fonctionnalités sans modifier son `code source` (code de la classe).'
> - Pour respecter le principe OCP, nous devons utiliser des `interfaces`, des `classes abstraites` et des `design patterns` tels que le `pattern de stratégie` et le `pattern de décorateur`.
> - Exemple de classe qui viole le principe OCP :
```php
<?php

class Cars
{
    public function getCarPrice(string $car): int
    {
        if ($car === 'Audi') {
            return 50000;
        } elseif ($car === 'BMW') {
            return 60000;
        } elseif ($car === 'Mercedes') {
            return 70000;
        } else {
            return 0;
        }
    }
}

$cars = new Cars();
echo "Audi price: " . $cars->getCarPrice('Audi'). "<br>"; // 50000
echo "BMW price: " . $cars->getCarPrice('BMW'). "<br>"; // 60000
echo "Mercedes price: " . $cars->getCarPrice('Mercedes'). "<br>"; // 70000
```
> - Ici la classe `Cars` a une méthode `getCarPrice` qui retourne le prix d'une voiture en fonction de son nom (`Audi`, `BMW`, `Mercedes`).
> - Si nous voulons ajouter une nouvelle voiture, nous devons modifier le code source de la classe `Cars` pour ajouter une nouvelle condition `elseif` pour cette voiture.
> - Cela viole le principe OCP car la classe `Cars` est `fermée à l'extension` et `ouverte à la modification` (nous devons modifier le code source pour ajouter une nouvelle voiture).
> - Pour respecter le principe OCP, nous devons utiliser une approche basée sur des `interfaces` et des `classes abstraites` pour permettre l'extension de la classe sans modifier son code source.
> - Exemple de classe qui respecte le principe OCP :
```php
<?php

interface CarPriceInterface
{
    public function getCarPrice(string $car): int;
}

class Audi implements CarPriceInterface
{
    public function getCarPrice(Audi|string $car): int
    {
        return 50000;
    }
}

class BMW implements CarPriceInterface
{
    public function getCarPrice(BMW|string $car): int
    {
        return 60000;
    }
}

class Mercedes implements CarPriceInterface
{
    public function getCarPrice(Mercedes|string $car): int
    {
        return 70000;
    }
}

$audi = new Audi();
$bmw = new BMW();
$mercedes = new Mercedes();

echo "Audi Price: " . $audi->getCarPrice('Audi') . "<br>";
echo "BMW Price: " . $bmw->getCarPrice('BMW') . "<br>";
echo "Mercedes Price: " . $mercedes->getCarPrice('Mercedes') . "<br>";
```
> - Dans cet exemple, nous avons créé une `interface` `CarPriceInterface` qui définit une méthode `getCarPrice` commune à toutes les classes de voitures.
> - Les classes `Audi`, `BMW` et `Mercedes` implémentent cette interface et fournissent une implémentation concrète de la méthode `getCarPrice`.
> - Cela permet d'`étendre` la classe `Cars` en ajoutant de nouvelles classes de voitures sans modifier son code source.
> - Par exemple, si nous voulons ajouter une nouvelle voiture `Porsche`, nous pouvons simplement créer une nouvelle classe `Porsche` qui implémente l'interface `CarPriceInterface` et fournir une implémentation de la méthode `getCarPrice`.
> - Ce principe intervient `après la phase de développement`, lorsqu'il faut `ajouter` de nouvelles fonctionnalités `sans modifier le code source existant` qui a déjà été testé et validé.

## 3. Liskov Substitution Principle (LSP)
> - Le principe de `substitution de Liskov (Liskov Substitution Principle)` est le troisième principe SOLID.
> - Ce principe stipule que si une classe `B` est une sous-classe d'une classe `A`, alors les objets de la classe `A` peuvent être remplacés par des objets de la classe `B` sans affecter le comportement du programme.
> - En d'autres termes, une classe dérivée doit pouvoir être substituée à sa classe de base sans que cela modifie le comportement du programme.
> - Ce principe permet de créer des classes plus `flexibles` et plus `extensibles` et de garantir que les classes dérivées respectent le contrat de la classe de base.
> - Exemple de classe qui viole le principe LSP :
```php
<?php

class Bird
{
    public function fly()
    {
        // Voler
        echo 'Je vole';
    }
}

class Duck extends Bird
{
    public function quack()
    {
        // Cancaner
        echo 'Coin coin';
    }
}

class Penguin extends Bird
{
    public function fly()
    {
        throw new Exception('Les pingouins ne peuvent pas voler');
    }
    
    public function swim()
    {
        // Nager
        echo 'Je nage';
    }
}

// Fonction qui prend un oiseau en paramètre et le fait voler
function makeBirdFly(Bird $bird)
{
    $bird->fly();
}

$duck = new Duck(); // Instanciation d'un canard
$penguin = new Penguin(); // Instanciation d'un pingouin

makeBirdFly($duck); // OK
makeBirdFly($penguin); // Exception
```
> - Dans cet exemple, la classe `Penguin` viole le principe LSP car elle redéfinit la méthode `fly` pour lancer une exception.
> - Cela signifie que les objets de la classe `Penguin` ne peuvent pas être substitués aux objets de la classe `Bird` sans affecter le comportement du programme.
> - En revanche, la classe `Duck` respecte le principe LSP car elle ne modifie pas le comportement de la méthode `fly` de la classe `Bird` et le canard peut voler.
> - Pour respecter le principe LSP, voici comment nous pourrions réorganiser le code :
```php
<?php

class FlyingBird
{
    public function fly()
    {
        // Voler
        echo 'Je vole';
    }
}

class SwimmingBird
{
    public function swim()
    {
        // Nager
        echo 'Je nage';
    }
}

class Duck extends FlyingBird
{
    public function quack()
    {
        // Cancaner
        echo 'Coin coin';
    }
}

class Penguin extends SwimmingBird
{
}

function makeBirdFly(FlyingBird $bird)
{
    $bird->fly();
}

function makeBirdSwim(SwimmingBird $bird)
{
    $bird->swim();
}

$duck = new Duck(); // Instanciation d'un canard
$penguin = new Penguin(); // Instanciation d'un pingouin

makeBirdFly($duck); // OK
makeBirdSwim($penguin); // OK
```
> - Dans cet exemple, nous avons créé deux classes de base `FlyingBird` et `SwimmingBird` qui définissent les comportements de vol et de nage respectivement.
> - Les classes `Duck` et `Penguin` héritent de ces classes de base et implémentent les comportements spécifiques des canards et des pingouins.
> - Cela permet de respecter le principe LSP en garantissant que les objets de la classe `Penguin` peuvent être substitués aux objets de la classe `SwimmingBird` sans affecter le comportement du programme.
> - On peut imaginer ensuite que les classes `FlyingBird` et `SwimmingBird` elles-mêmes héritent d'une classe `Bird`, qui sera donc le parent de toutes les classes d'oiseaux volants et nageants.
> - Par exemple, la classe `Bird` pourrait contenir des propriétés telles que `name`, `color`, `size`, etc., et des méthodes telles que `eat`, `sleep`, `reproduce`, etc qui sont communes à tous les oiseaux.

## 4. Interface Segregation Principle (ISP)
> - Le principe de `ségrégation de l'interface (Interface Segregation Principle)` est le quatrième principe SOLID.
> - Ce principe stipule qu'une classe ne doit pas être forcée d'implémenter des méthodes (`interfaces`-`contrats`) qu'elle n'utilise pas.
> - En d'autres termes, une classe doit avoir des `interfaces` spécifiques à ses besoins et ne doit pas être obligée d'implémenter des `interfaces` inutiles.
> - Ce principe permet de créer des classes plus `spécifiques`, plus `cohérentes` et plus `faciles à maintenir`.
> - Prenons un exemple de classe qui viole le principe ISP :
```php
<?php

interface RoutineInterface
{
    public function work();
    public function eat();
    public function sleep();
}

class Human implements RoutineInterface
{
    public function work()
    {
        // Travailler
    }
    
    public function eat()
    {
        // Manger
    }
    
    public function sleep()
    {
        // Dormir
    }
}

class Robot implements RoutineInterface
{
    public function work()
    {
        // Travailler
    }
    
    public function eat()
    {
        throw new Exception('Les robots ne peuvent pas manger');
    }
    
    public function sleep()
    {
        throw new Exception('Les robots ne peuvent pas dormir');
    }
}
```
> - Dans cet exemple, la classe `Robot` viole le principe ISP car elle est forcée d'implémenter les méthodes `eat` et `sleep` de l'interface `RoutineInterface` alors qu'elle n'en a pas besoin (les robots ne mangent pas et ne dorment pas).
> - Pour respecter le principe ISP, nous devons diviser l'interface `RoutineInterface` en plusieurs interfaces plus spécifiques qui correspondent aux besoins des classes `Human` et `Robot`.
> - Voici un exemple de code qui respecte le principe ISP :
```php
<?php

interface WorkInterface
{
    public function work();
}

interface EatInterface
{
    public function eat();
}

interface SleepInterface
{
    public function sleep();
}

class Human implements WorkInterface, EatInterface, SleepInterface
{
    public function work()
    {
        // Travailler
    }
    
    public function eat()
    {
        // Manger
    }
    
    public function sleep()
    {
        // Dormir
    }
}

class Robot implements WorkInterface
{
    public function work()
    {
        // Travailler
    }
}
```
> - Dans cet exemple, nous avons divisé l'interface `RoutineInterface` en trois interfaces plus spécifiques : `WorkInterface`, `EatInterface` et `SleepInterface`.
> - La classe `Human` implémente ces trois interfaces, car elle a besoin des méthodes `work`, `eat` et `sleep` pour effectuer ses tâches quotidiennes (travailler, manger, dormir).
> - La classe `Robot` implémente uniquement l'interface `WorkInterface` car elle n'a pas besoin des méthodes `eat` et `sleep` (les robots ne mangent pas et ne dorment pas).
> - Cela permet de respecter le principe ISP en fournissant des `interfaces` spécifiques à chaque classe et en évitant d'obliger une classe à implémenter des méthodes inutiles.

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
