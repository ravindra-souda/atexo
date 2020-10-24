# Test technique Atexo - RAVINDRA Soudakar

Bonjour, ce test technique consistait à tirer une main de 10 cartes parmi un deck de 52 cartes, puis à afficher cette même main triée par couleur (Carreaux, Coeur, Pique, Trèfle) puis par valeur (As au Roi).

La branche "main" présente les résultats en mode graphique. Pour le mode console, vous pouvez passer sur la branche "console" (voir plus bas).

## Mode graphique

### Installation

```sh
$ git clone https://github.com/ravindra-souda/atexo.git
$ cd atexo
$ composer install
```

### Execution

```sh
$ bin/console server:run
```
Puis cliquez sur l'url suivante : [http://127.0.0.1:8000/atexo](http://127.0.0.1:8000/atexo)

### Tests unitaires

```sh
$ composer dump-autoload
$ ./vendor/bin/phpunit tests
```

## Mode console

J'ai tenu également à vous présenter les résultats en mode console, si vous souhaitez un jeter un coup d'oeil, voici la marche à suivre :

### Installation

```sh
$ git clone https://github.com/ravindra-souda/atexo.git atexo_console -b console
$ cd atexo_console
$ composer install
```

### Execution

```sh
$ php -f index.php
```

### Tests unitaires

```sh
$ composer dump-autoload
$ ./vendor/bin/phpunit tests
```
