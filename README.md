Le projet est en php8.1 et laravel 9, pour éviter toutes configurations il est préférable pour le moment d'utiliser le serveur web laragon.

Pour Laragon : https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe

Installer Composer : https://getcomposer.org/Composer-Setup.exe

Les extensions PHP requises :

![img](imgReadme/f38.PNG)

Après avoir installé laragon nous faisons un simple git clone du projet  dans C:\laragon\www


## Configuration de l'environnement


étape 1 git clone dans C:\laragon\www

étape 2 composer update pour récupérer les différents dossiers/fichiers nécessaire.

étape 3 Créer la base de données php artisan migrate (laragon pas besoin de la créer préalablement).

Si un autre serveur web :

![img](imgReadme/f30.PNG)

étape 4 renommer le fichier .env.example par .env

![img](imgReadme/f31.PNG)

étape 5 configurer le fichier .env
 
![img](imgReadme/f32.PNG)

étape 6 créer un  lien symbolique d'images --> commande php artisan storage:link 

![img](imgReadme/f33.PNG)

![img](imgReadme/f34.PNG)

étape 7 Remplir la base de données php artisan db:seed

![img](imgReadme/f35.PNG)

![img](imgReadme/f36.PNG)

Cela nous permet de créer l'utilisateur admin.

login de l'admin :

adresse mail : admin@outlook.fr

mot de passe : siojjr509


étape 8 générer une clé d'utilisation : php artisan key:generate

![img](imgReadme/f37.PNG)

Il n'est pas nécessaire de faire ( php artisan serve).

## Diagramme de classe :

```plantuml
@startuml
left to right direction
class pizzas {
  <u>id</u>
  text
  picture
  prix
  created_at
  updated_at
}

class ingredients {
    <u>id</u>
    text
    picture
    created_at
    updated_at
}

class garnitures{
    <u>id</u>
    order
    quantity
    idIngredient
    idPizza
    created_at
    updated_at
    
}


class users {
    <u>id</u>
    name
    email
    email_verified_at
    password
    remember_token
    created_at
    updated_at
}

class commande {
    <u>id</u>
    total
    date_commande
    idUser
    created_at
    updated_at

}

class panier{
    <u>id</u>
    acheter
    quantity
	idUser
    idPizza
    idCommande
    created_at
    updated_at
}


pizzas"1..1"--- "1..*" garnitures
garnitures"1..*" --- "1..1" ingredients
users"1..1" --- "0...*" panier
panier"1...*"  --- "1..1" commande
pizzas"1..*" --- "0...*" panier
@enduml
```
## <u>Cas d'utilisation Visiteur</u> :

```plantuml
@startuml Pizzafork
left to right direction
:Visiteur:
package Pizzafork{
    
    
    (Visiteur)--(Voir la carte) 
	(Visiteur)--(S'inscrire)
    (S'inscrire)<..(Se connecter) : <<include>>
	
}
@enduml
```

## <u>Cas d'utilisation Client</u> :

```plantuml
@startuml Pizzafork
left to right direction
:Client:
package Pizzafork{
    Client--(Se connecter)
    
	
	(Se connecter)<..(Consulter ses commandes) : <<include>>
    (Se connecter)<..(Commander des pizzas) : <<include>>
    (Se connecter)<..(Supprimer des pizzas du panier) : <<include>>
    (Se connecter)<..(Ajouter des pizzas au panier) : <<include>>
    (Se connecter)<..(Consulter les garnitures des pizzas) : <<include>>
    (Se connecter)<..(Voir la carte) : <<include>>
    (Ajouter des pizzas au panier)<..(Incrémenter quantité) : <<include>>
    (Ajouter des pizzas au panier)<..(Décrémenter quantité) : <<include>>
	
}
@enduml
```

## <u>Cas d'utilisation Admin</u> :

```plantuml
@startuml Pizzafork
left to right direction
:Admin:
package Pizzafork{
    Admin--(Se connecter)
    (Se connecter)<..(Supprimer les ingrédients) : <<include>>
    (Se connecter)<..(Modifier les ingrédients) : <<include>>
    (Se connecter)<..(Supprimer les garnitures des pizzas ) : <<include>>
	(Se connecter)<..(modifier les garnitures des pizzas à partir des ingrédients ajoutés) : <<include>>
    (Se connecter)<..(Créer les garnitures des pizzas à partir des ingrédients ajoutés) : <<include>>
	(Se connecter)<..(Supprimer les pizzas) : <<include>>
    (Se connecter)<..(Modifier les pizzas) : <<include>>
    (Se connecter)<..(Ajouter des pizzas à la carte) : <<include>>
	
}
@enduml
```
La page d'accueil du site :

![img](imgReadme/f1.PNG)

Pour tester la pagination nous l'avons paramétrée à 2 pizzas par pages :

![img](imgReadme/f27.PNG)

![img](imgReadme/f28.PNG)

login de l'admin :

adresse mail : admin@outlook.fr

mot de passe : siojjr509

Connectons nous en tant qu 'administrateur :

![img](imgReadme/f2.PNG)

la page principale du compte admin, Il a possibilités de d'ajouter, modifier, suppimer et consulter la garnitures des pizzas  :

![img](imgReadme/f3.PNG)

Nous y reviendrons plus tard, consultons les ingrédients disponibles.

Nosu pouvons que pour le moment le seul ingrédient disponible est la pâte à pizza :

![img](imgReadme/f4.PNG)

Ajoutons un nouvelle ingrédient en cliquant sur le bouton +.

Dans le formulaire de création nous saisissons son nom "fromage" et une photo :

![img](imgReadme/f5.PNG)

L'ingrédient a bien été ajouté :

![img](imgReadme/f6.PNG)

Modifions le en lui donnat le nom mozzarela :

![img](imgReadme/f7.PNG)

Il a été modifié :

![img](imgReadme/f8.PNG)

Rajoutons un nouvel ingrédient, il nous sera utile pour la suite (poivron) :

![img](imgReadme/f9.PNG)

Sur la page principale du compte admin, nous cliquons sur l'icône grise pour consulter la garniture de la Buffalo :

![img](imgReadme/f10.PNG)

Pour le moment la garniture de la buffalo n'a que la pâte à pizza :

![img](imgReadme/f11.PNG)

Rajoutons un nouvel ingrédient à la garniture :

![img](imgReadme/f12.PNG)

L'ingrédient a bien ajouté à sa garniture :

![img](imgReadme/f13.PNG)

Déconnectons-nous :

![img](imgReadme/f14.PNG)

![img](imgReadme/f15.PNG)

Nous créeons un nouvel utilisateur du nom d'Adrien :

![img](imgReadme/f16.PNG)

Après la validation de l'inscription, nous somme redirigée sur la page d'accueil :

![img](imgReadme/f17.PNG)

Pour le moment notre panier est vide :

![img](imgReadme/f18.PNG)

Rajoutons des pizzas au panier :

![img](imgReadme/f19.PNG)

Nous prenons 2 Buffalo :

![img](imgReadme/f20.PNG)

Nous avons un prix total de 40 €, commandons.

la commande a bien été reçu :

![img](imgReadme/f21.PNG)

Cliquons sur mes commandes pour qu' Adrien consulte ses commandes :

![img](imgReadme/f29.PNG)

Nous pouvons voir la commande précédente :

![img](imgReadme/f22.PNG)

Nous cliquons sur ma commande et nous pouvons voir les pizzas de la commande :

![img](imgReadme/f23.PNG)

Par gourmandise Adrien recommande 3 française :

![img](imgReadme/f24.PNG)

la commande a été validée :

![img](imgReadme/f25.PNG)

Les pizzas de la commande nous retrouvons les  3 française :

![img](imgReadme/f26.PNG)

