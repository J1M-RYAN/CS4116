FROM node:latest 

ENV NODE_ENV=production

COPY ./admin-portal-src /var/www

WORKDIR /var/www/frontend

RUN npm i

RUN npm run build

WORKDIR /var/www/backend

RUN npm i

CMD ["npm", "start"]