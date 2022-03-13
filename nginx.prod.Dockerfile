FROM nginx:latest

COPY ./nginx/app-prod.conf /etc/nginx/conf.d/app.conf

COPY . /var/www