# CS4116 - Dating Website
## Development Environment Instructions 
Create a .env file in the `./admin-portal-src/backend/` directory with `PORT=3002`   

Run `docker-compose -f ./dev.docker-compose.yml up` in the root directory to launch the development environment  

The development environment main website is served on port 3000 at http://localhost:3000 and the admin portal is at http://localhost:3000/admin 

## Production Environment Instructions
On the production deployment the admin portal is at the admin subdomain, so https://admin.lovespark.xyz/, however you can also access it ad https://lovespark.xyz/admin and you will be redirected to the subdomain

Thr production deployment can be brought up with `docker-compose up` in the root directory

Prior to making a production deployment, make sure there is .env file in admin portal backend directory (with PORT=3002), and make sure there is .htpasswd file in the root directory of the project (for http basic auth).


## New cert generation
To generate a new SSL cert 
1. ssh into the production instance
2. cd into the root project directory
3. rename nginx-prod/app.conf to app.conf.bak
4. rename nginx-prod/app.conf.certbot to app.conf
5. run `docker-compose down`
6. run `docker-compose up --build nginx`
7. wait until docker-compose has fully started all containers
8. In a new terminal in the root project directory run `docker-compose -f ./certbot.docker-compose.yml up`
9. if successful, nginx-prod/app.conf to app.conf.certbot and app.conf.bak to app.conf
10. run `docker-comopse down`
11. run `docker-compose up --build nginx`
