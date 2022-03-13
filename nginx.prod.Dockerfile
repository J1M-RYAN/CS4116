FROM nginx:latest

COPY ./nginx-prod/app-prod.conf /etc/nginx/conf.d/app.conf

COPY . /var/www