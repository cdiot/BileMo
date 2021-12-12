# Boutique

Il s'agit d'une API développés avec Symfony.

## Environnement de développement 

### Pré-requis

* PHP 7.4
* MySQL
* Apache
* Composer
* Somfony CLI

Vous pouvez vérifier les pré-requis avec la commande suivante (de la CLI Symfony) :

```bash
symfony check:requirements
```

### Lancer l'environnement de développement 

Pour démarrer l'environnement de développement tapé les commandes suivantes :

```bash
composer install
symfony serve -d
```

Vous pouvez configurer l'accès à la base de données dans le fichier .env

### Lancer les fixtures
Pour lancer les fixtures tapé les commandes suivantes :

```bash
composer init
```

### Comment ce connecter à l’API

Se rendre dans un premier temps sur ce lien:

```bash
https://127.0.0.1:8000/api/login_check
```
Ensuite il faut indiquer l'email `email` et le mot de passe `password`.

Puis si tous ce passe bien un Token permettant d'accéder aux ressources sera généré. 
Il faudra l'indiquer pour chaque ressource. 

### Lien vers la documention de l’API

```bash
https://127.0.0.1:8000/api/
```

### Lien qualité 

```bash
https://app.codacy.com/gh/cdiot/BileMo/dashboard
```