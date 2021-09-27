# safariDesMetiers
Symfony site for event "Safari des Métiers 2021" in Brest (28/09)  

Developped with Symfony v5.3 / php 8.0 by Gregori TIRSATINE and Stéphane THOMAS  

To install, you just have to follow instructions below :  

1) Install Composer and Symfony  
2) Install nodeJS LTS version for npm tool  
3) You need to have a database Mysql on your computer The easiest way is to install Xampp server  
4) You're now ready to configure with CLI this small web site.  

- git clone https://github.com/sthomas29/safariDesMetiers.git sdm2021  
- cd sdm2021  
- composer install                            //****** install all bundles in /vendor folder   
- npm install                                 //****** to install JS tools for webpack Encore  
- symfony console doctrine:database:create    //****** to create database safaridb  

  ==> You need to create a new user in mysql then give all permission on safaridb  
  ==> Then configure it in .env file : DATABASE_URL="mysql://safari-user:safari@127.0.0.1:3306/safaridb"
  ==> You can skip this stage by using root user with blank password.  
  
- symfony console doctrine:migration:migrate  //****** create all entities from project in database

- symfony console doctrine:fixtures:load      //****** import sample data for testing

You can now launch server :
- symfony serve
==> Site is now available on http:/localhost:8000  

Admin login : admin/admin
USer login : user/user
