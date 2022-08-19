FROM php:8.1-alpine

# Copy composer.lock and composer.json
COPY ./composer.lock ./composer.json /var/www/html/

# Copy from image composer to local container
COPY --from=composer:2.3 /usr/bin/composer /usr/local/bin/composer

# Install Depedencies
RUN apk update && apk add git libxml2-dev zip
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug \
    && pecl install redis \
    && docker-php-ext-enable redis xdebug

# Setup php.ini-production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Set working directory
WORKDIR /var/www/html

# Add group www
RUN addgroup -g 1000 www

# Add user www
RUN adduser -u 1000 -g 1000 -G www -s /bin/bash -D www

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/html

# Change current user to www
USER www

COPY ./run.sh /tmp
    
ENTRYPOINT ["/tmp/run.sh"]

EXPOSE 8000