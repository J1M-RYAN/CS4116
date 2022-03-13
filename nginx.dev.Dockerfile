FROM nginx:latest

COPY ./nginx/app-dev.conf /etc/nginx/conf.d/app.conf

COPY . /var/www