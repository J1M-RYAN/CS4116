FROM nginx:latest

COPY ./nginx/app.conf /etc/nginx/conf.d/app.conf

COPY . /var/www