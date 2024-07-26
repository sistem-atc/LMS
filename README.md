@WIP

    Validar Cadastro das Filiais =>
        Verificar a exclusão do certificado limpe o arquivo do disco tambem.
        

    Notas Fiscais dos clientes =>
        Terminar de construir a API
        Começar a importação de NOTFIS
        Abstrair as classes para usar os mesmos metodos para rotina manual e automatica

    Lotes de Notas Fiscais =>
        Iniciar a rotina de inclusão de lotes consolidando as notas
        Gerar um CT-e para cada lote
        Calcular valores a partir da tabela (Criar model e rotinas)
        Calcular impostos a partir das regras fiscais (Criar Rotinas)
        Criar a rotina de trasmição do CT-e para a SEFAZ
            - Considerar validação do status SEFAZ partindo do estado do CT-e
            - Resolver o problema da leitura do certificado
            - Incluir no config o ambiente a ser utilizado de acordo com o ambiente do .env
            - Validar o campo do banco para guardar o protocolo
        Criar um job que roda automaticamente as criações de lote de acordo com as configurações de cada cliente
            - Validar como incluir as configurações
            - Implementar no banco de dados as alterações


@Before Migrate:fresh

    php artisan shield:generate --all
    php artisan db:seed --class=UserSeeder
    php artisan shield:super-admin --user=1
