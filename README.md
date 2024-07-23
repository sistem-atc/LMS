@TODO

    Employees =>
        Refatorar Quando um empregado é desabilitado tem que desativar o usuario
        quando ele é excluido tem que excluir o usuario

@WIP

    Notas Fiscais dos clientes =>
        Incluir o usuario de inclusão quando manual (Criar no Banco de Dados a relação)
        Terminar de construir a API
        Incluir o usuario quando importar XML
        Começar a importação de NOTFIS
        Abstrair as classes para usar os mesmos metodos para rotina manual e automatica


@Before Migrate:fresh

    php artisan shield:generate --all
    php artisan shield:super-admin --user=1
