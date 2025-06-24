# Utiliser l'image officielle NGINX
FROM nginx:latest

# Supprimer la page par défaut de NGINX
RUN rm -rf /usr/share/nginx/html/*

# Copier ton portfolio dans le dossier web de NGINX
COPY . /usr/share/nginx/html/

# Exposer le port utilisé par NGINX
EXPOSE 80

