
# hallo this is a very simple API to manage subscribers in your mysql database. 
# The enviroment runs with Laradock, that is a Docker configuration of images built for Laravel.

You can Store, Retrive, Update and Delete Subscribers.

To run the enviroment you need to install Docker on your machine:
https://www.docker.com/

After this you need to clone this repo in a local folder:
$ git clone [repo_address]

Than you must enter the laradock folder inside the project and run:
$ docker-compose up -d nginx mysql phpmyadmin workspace 
(yes it runs on nginx not apache2)

pretty neat uh?
i configured this laradock installation to use mysql 5 because the new 8 version is giving a bug on the password authentication method.

#TESTING
in the files you can see:
"subscribers.postman_collection.json" you can import this in your Postman UI to execute the commands and test the code.
I did started building the testing environment with laravel
but i had to install phpunit and i was getting bugs and the time was running out for the deadline so... you can test with postman =)

