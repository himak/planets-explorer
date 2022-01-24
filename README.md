# Planets Explorer

Testing assignment for a backend developer.

First create database e.g. with name **planets_explorer**

Rename file **.env.example** to **.env** and fill access to database.

Run this commands:

	composer install  
	php artisan migrate  
	php artisan key:generate  
	php artisan serve  

Open browser:  [http://localhost:8000](http://localhost:8000)

Run artisan command for get the list of all known planets from [SWAPI](https://swapi.py4e.com) and save to database.

	php artisan explorer:planets


# API

Allow urls:

List of names of 10 largest planets

    /api/planets

Distribution of the specific terrain on planets

    /api/planets/terrain/{terrain}
    /api/planets/terrain/mountains
