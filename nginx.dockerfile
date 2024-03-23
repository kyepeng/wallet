FROM nginx:alpine

COPY /docker-compose/nginx/wallet.conf /etc/nginx/conf.d/default.conf