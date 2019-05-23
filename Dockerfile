FROM ubuntu:xenial

# Set UTC
RUN apt-get update \
  && apt-get install -y locales \
  && locale-gen en_US.UTF-8 \

# software-properties-common & python-software-properties to install apt-add-repository 
  && apt-get install -y software-properties-common python-software-properties \
  && apt-get update \

# Add PHP repository
  && LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php \
  && add-apt-repository ppa:jonathonf/backports \
  && apt-get update \ 

# Install LAMP stack
  && apt-get install -y \
    apache2 \
    git \ 
    libapache2-mod-php7.3 \
    lynx-cur \
    php7.3 \
    php7.3-gd \
    php7.3-mysql \
    php7.3-xml \
    php-cli \
    php-curl \
    php-mbstring \
    vim \
    wget \
    curl \

# Clean image and repo list
  && apt-get clean && apt-get autoremove && rm -rf /var/lib/apt/lists/* \

# Enable apache mods
  && a2enmod headers \ 
  && a2enmod php7.3 \
  && a2enmod rewrite \

# Set servername
  && echo ServerName localhost >> /etc/apache2/apache2.conf

# Set environment variables
ENV APACHE_RUN_USER=www-data \
  APACHE_RUN_GROUP=www-data \
  APACHE_LOG_DIR=/var/log/apache2 \
  APACHE_PID_FILE=/var/run/apache2.pid \
  APACHE_RUN_DIR=/var/run/apache2 \
  APACHE_LOCK_DIR=/var/lock/apache2

# Create directories
RUN mkdir -p $APACHE_RUN_DIR $APACHE_LOCK_DIR $APACHE_LOG_DIR \

# Chown directories owned by apache
  && chown -hR www-data:www-data /var/www/ 

# Set /var/www/ as working directory
WORKDIR /var/www/

# Expose port 80
EXPOSE 80

# Update the default apache site with the apache.conf file within our directory
ADD apache.conf /etc/apache2/sites-enabled/000-default.conf

# By default start up apache in the foreground, override with /bin/bash for interative.
CMD ["apache2", "-D", "FOREGROUND"]