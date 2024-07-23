@WIP

    Notas Fiscais dos clientes =>
        Terminar de construir a API
        Começar a importação de NOTFIS
        Abstrair as classes para usar os mesmos metodos para rotina manual e automatica


@Before Migrate:fresh

    php artisan shield:generate --all
    php artisan db:seed --class=UserSeeder
    php artisan shield:super-admin --user=1
