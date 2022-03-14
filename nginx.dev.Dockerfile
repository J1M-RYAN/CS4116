FROM nginx:latest

COPY ./nginx-dev/app.conf /etc/nginx/conf.d/app.conf

COPY . /var/www