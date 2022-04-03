FROM 'phpdockerio/php:7.4-fpm'
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \ 
        php7.4-bz2 \ 
        php7.4-gd \ 
        php7.4-imap \ 
        php7.4-imagick \ 
        php7.4-mysql \ 
        php7.4-redis \ 
        php7.4-ssh2 \ 
        php7.4-xdebug \ 
        php7.4-yaml; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
