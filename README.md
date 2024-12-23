The project is using PHP 8.1 and Laravel 9. To avoid any complex configurations, it is recommended to use Laragon as the web server for now.

For Laragon : https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe

Install Composer : https://getcomposer.org/Composer-Setup.exe

Composer is a dependency manager for PHP, which is required to handle the PHP libraries and packages in the Laravel project.

Required PHP Extensions :

Please ensure that the following PHP extensions are enabled:

![img](imgReadme/f38.PNG)

After installing Laragon, simply perform a git clone of the project into the C:\laragon\www directory.

## Environment Configuration


step 1 git clone dans C:\laragon\www

step 2 composer update To retrieve the necessary folders/files.

step 3 Create the database using php artisan migrate (with Laragon, there's no need to create it manually beforehand).

 If using another web server :

![img](imgReadme/f30.PNG)

step 4 Rename the .env.example file to .env

![img](imgReadme/f31.PNG)

step 5 To configure the .env file
 
![img](imgReadme/f32.PNG)

step 6 To create a symbolic link for the storage directory --> command php artisan storage:link 

![img](imgReadme/f33.PNG)

![img](imgReadme/f34.PNG)

step 7 Fill the database using php artisan db:seed

![img](imgReadme/f35.PNG)

![img](imgReadme/f36.PNG)

This allows us to create the admin user.

Admin Login :

adresse mail : admin@outlook.fr

mot de passe : siojjr509


step 8  Generate an application key : php artisan key:generate

![img](imgReadme/f37.PNG)

 It is not necessary to do ( php artisan serve).

##  Class Diagram :

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
## <u>Use Case Visiteur</u> :

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

## <u>Use Case Client</u> :

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

## <u>Use Case Admin</u> :

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
The homepage of the website :

![img](imgReadme/f1.PNG)

To test the pagination, we have set it to 2 pizzas per page :

![img](imgReadme/f27.PNG)

![img](imgReadme/f28.PNG)

Admin Login :

email : admin@outlook.fr

password : siojjr509

 Let's log in as an administrator :

![img](imgReadme/f2.PNG)

 On the main page of the admin account, they can add, edit, delete, and view pizza toppings :

![img](imgReadme/f3.PNG)

We will come back to this later, let's check the available ingredients.

We can see that, for now, the only available ingredient is pizza dough :

![img](imgReadme/f4.PNG)

Let's add a new ingredient by clicking the + button.

In the creation form, we enter the name "cheese" and upload a photo :

![img](imgReadme/f5.PNG)

The ingredient has been successfully added :

![img](imgReadme/f6.PNG)

Let's modify it by changing its name to mozzarella :

![img](imgReadme/f7.PNG)
 
 It has been modified :

![img](imgReadme/f8.PNG)

Let's add a new ingredient, it will be useful for the next steps (poivrons) :

![img](imgReadme/f9.PNG)

On the main page of the admin account, we click on the gray icon to view the topping of the Buffalo pizza :

![img](imgReadme/f10.PNG)

At the moment, the topping of the Buffalo pizza only consists of pizza dough :

![img](imgReadme/f11.PNG)

Let's add a new ingredient to the topping :

![img](imgReadme/f12.PNG)

The ingredient has been successfully added to its topping :

![img](imgReadme/f13.PNG)

Let's log out :

![img](imgReadme/f14.PNG)

![img](imgReadme/f15.PNG)

We create a new user named Adrien :

![img](imgReadme/f16.PNG)

After the registration is validated, we are redirected to the homepage :

![img](imgReadme/f17.PNG)

For now, our cart is empty :

![img](imgReadme/f18.PNG)

Let's add some pizzas to the cart :

![img](imgReadme/f19.PNG)

We'll take 2 Buffalo :

![img](imgReadme/f20.PNG)

We have a total price of 40€, let's place the order.

The order has been successfully received :

![img](imgReadme/f21.PNG)

Click on 'My Orders' so Adrien can check his orders :

![img](imgReadme/f29.PNG)

We can see the previous order :

![img](imgReadme/f22.PNG)

We click on the order and we can see the pizzas in the order :

![img](imgReadme/f23.PNG)

Out of greed, Adrien orders 3 French ones :

![img](imgReadme/f24.PNG)

The order has been confirmed :

![img](imgReadme/f25.PNG)

In the order, we find the 3 French ones :

![img](imgReadme/f26.PNG)

An update has been made; we now have a chef who can view the customers' orders.

Le client Adrien a passé 3 commandes sur le site de pizzafork :

![img](imgReadme/f41.PNG)

We create a new user, Enstso, who will order 3 pizzas :

![img](imgReadme/f42.PNG)

His order :

![img](imgReadme/f43.PNG)

Chef login :

chef@outlook.fr

siojjr509

I log in as a chef :

![img](imgReadme/f44.PNG)

We can see Adrien's and Enstso's orders :

![img](imgReadme/f45.PNG)

Enstso's order :

![img](imgReadme/f46.PNG)
