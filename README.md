@Before Migrate:fresh

    sudo php artisan cache:clear
    php artisan shield:generate --all
    php artisan optimize:clear

@Adjusts necessary in OpenSSL 3

    /etc/ssl/openssl.cnf

    [provider_sect]
    default = default_sect
    legacy = legacy_sect

    [default_sect]
    activate = 1

    [legacy_sect]
    activate = 1
