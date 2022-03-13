FROM nginx:latest

COPY ./nginx-dev/app-dev.conf /etc/nginx/conf.d/app.conf

COPY . /var/www