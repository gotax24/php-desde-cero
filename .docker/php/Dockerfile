# Usamos la misma imagen base que ya tenías
FROM php:8.3-apache

# Actualizamos los repositorios e instalamos las dependencias necesarias para Composer.
# git y unzip son obligatorios; sin ellos, Composer fallará al descargar paquetes.
# La bandera -y acepta las instalaciones automáticamente, y rm -rf limpia la caché de apt para reducir el peso de la imagen.
RUN apt-get update && apt-get install -y \
  git \
  unzip \
  && rm -rf /var/lib/apt/lists/*

# TÉCNICA OPTIMIZADA (Multi-stage copy):
# En lugar de descargar el instalador de Composer con curl/php (lo cual ensucia la imagen y es más lento),
# copiamos el binario ejecutable directamente desde la imagen oficial de Composer a nuestro contenedor.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configuramos el directorio de trabajo por defecto para cuando entremos al contenedor
WORKDIR /var/www/html