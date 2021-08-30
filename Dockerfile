FROM php:8.0-apache

RUN apt update && apt upgrade -y
RUN apt install -y iputils-ping

COPY tech2022.txt /home/www-data/tech2022.txt
COPY src/ /var/www/html/
