@WIP

    Criando os novos paineis para separar as funcionalidades
    Criar um Select no hook de AlterBranch para selecionar o painel a ser logado
    Incluir como default o primeiro painel da lista que o usuario tenha autorização
    Abrir o hook AlterBranch como modal

    Next Town IssNetOnline

    Ajustar as configurações do speed =>
        Validar a melhor forma de passar os parametros para dentro do config.

    Notas Fiscais dos clientes =>
        Terminar de construir a API
        Começar a importação de NOTFIS
        Abstrair as classes para usar os mesmos metodos para rotina manual e automatica

    Lotes de Notas Fiscais =>
        Tela de resumo do Wizard para conferencia antes de gerar o CT-e
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
