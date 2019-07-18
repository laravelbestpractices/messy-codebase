FROM buonzz/laravel-php-fpm:0.0.1

RUN \
  curl -L https://download.newrelic.com/php_agent/release/newrelic-php5-8.7.0.242-linux.tar.gz | tar -C /tmp -zx && \
   export NR_INSTALL_USE_CP_NOT_LN=1 && \
    export NR_INSTALL_SILENT=1 && \
     /tmp/newrelic-php5-*/newrelic-install install && \
      rm -rf /tmp/newrelic-php5-* /tmp/nrinstall* && \
        sed -i -e 's/"REPLACE_WITH_REAL_KEY"/"07066880fcffaa4f8c1ac1a86d5ed2fddc6343be"/' \
     -e 's/newrelic.appname = "PHP Application"/newrelic.appname = "messy-codebase.laravelbestpractices.com"/' \
         /usr/local/etc/php/conf.d/newrelic.ini