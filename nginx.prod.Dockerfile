FROM nginx:latest

COPY ./nginx-prod/app.conf /etc/nginx/conf.d/app.conf

COPY . /var/www