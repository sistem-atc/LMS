<?php

namespace App\Services\Utils\Towns\Helpers;

class Descricao_Servicos
{

    public static function descrServ(string $codList): array
    {

        if (strlen($codList) == 5 || strlen($codList) == 4) {
            $localizar = sprintf('%06.2f', number_format($codList, 2, '.', ''));
        } else {
            if (strlen($codList) > 7) {
                $localizar = str_pad(substr($codList, 0, 7), 8, '0', STR_PAD_LEFT);
            } else {
                $localizar = str_pad($codList, 8, '0', STR_PAD_LEFT);
            }
        }

        switch ($localizar) {

            case '00161099':
            case '00.00':
                $descrCNAE = 'Atividades de apoio a agricultura nao especificadas anteriormente';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '07731400':
            case '00.00':
                $descrCNAE = 'Aluguel de maquinas e equipamentos agricolas sem operador';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '06319400':
            case '01.08':
                $descrCNAE = 'Portais, provedores de conteudo e outros servicos de informacao na internet';
                $codServico = '01.08';
                $descrServico = 'Planejamento, confeccao, manutencao e atualizacao de paginas eletronicas.';

            case '07739003':
            case '03.05':
                $descrCNAE = 'Aluguel de palcos, coberturas e outras estruturas de uso temporario, exceto andaimes';
                $codServico = '03.05';
                $descrServico = 'Cessao de andaimes, palcos, coberturas e outras estruturas de uso temporario.';

            case '08630502':
            case '04.03':
                $descrCNAE = 'Atividade medica ambulatorial com recursos para realizacao de exames complementares';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08711501':
            case '04.17':
                $descrCNAE = 'Clinicas e residencias geriatricas';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09609203':
            case '05.08':
                $descrCNAE = 'Alojamento, higiene e embelezamento de animais';
                $codServico = '05.08';
                $descrServico = 'Guarda, tratamento, amestramento, embelezamento, alojamento e congeneres.';

            case '03321000':
            case '07.02':
                $descrCNAE = 'Instalacao de maquinas e equipamentos industriais';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04223500':
            case '07.02':
                $descrCNAE = 'Construcao de redes de transportes por dutos, exceto para agua e esgoto';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04322302':
            case '07.02':
                $descrCNAE = 'Instalacao e manutencao de sistemas centrais de ar condicionado, de ventilacao e refrigeracao';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04399103':
            case '07.02':
                $descrCNAE = 'Obras de alvenaria';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04321500':
            case '07.05':
                $descrCNAE = 'Instalacao e manutencao eletrica';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04330499':
            case '07.06':
                $descrCNAE = 'Outras obras de acabamento da construcao';
                $codServico = '07.06';
                $descrServico = 'Colocacao e instalacao de tapetes, carpetes, assoalhos, cortinas, revestimentos de parede, vidros, divisorias, placas de gesso e congeneres, com material fornecido pelo tomador do servico.';

            case '08122200':
            case '07.13':
                $descrCNAE = 'Imunizacao e controle de pragas urbanas';
                $codServico = '07.13';
                $descrServico = 'Dedetizacao, desinfeccao, desinsetizacao, imunizacao, higienizacao, desratizacao, pulverizacao e congeneres.';

            case '00990403':
            case '07.21':
                $descrCNAE = 'Atividades de apoio a extracao de minerais nao-metalicos';
                $codServico = '07.21';
                $descrServico = 'Pesquisa, perfuracao, cimentacao, mergulho, perfilagem, concretacao, testemunhagem, pescaria, estimulacao e outros servicos relacionados com a exploracao e explotacao de petroleo, gas natural e de outros recursos minerais';

            case '05510801':
            case '09.01':
                $descrCNAE = 'Hoteis';
                $codServico = '09.01';
                $descrServico = 'Hospedagem de qualquer natureza em hoteis, apart-service condominiais, flat, apart-hoteis, hoteis residencia, residence-service, suite service, hotelaria maritima, moteis, pensoes e congeneres;ocupacao por temporada com fornecimento de servico (o valor d';

            case '06612603':
            case '10.01':
                $descrCNAE = 'Corretoras de cambio';
                $codServico = '10.01';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de cambio, de seguros, de cartoes de credito, de planos de saude e de planos de previdencia privada.';

            case '06821801':
            case '10.05':
                $descrCNAE = 'Corretagem na compra e venda e avaliacao de imoveis';
                $codServico = '10.05';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de bens moveis ou imoveis, nao abrangidos em outros itens ou subitens, inclusive aqueles realizados no ambito de Bolsas de Mercadorias e Futuros, por quaisquer meios.';

            case '04619200':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de mercadorias em geral nao especializado';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '09329801':
            case '12.06':
                $descrCNAE = 'Discotecas, danceterias, saloes de danca e similares';
                $codServico = '12.06';
                $descrServico = 'Boates, taxi-dancing e congeneres.';

            case '09493600':
            case '12.15':
                $descrCNAE = 'Atividades de organizacoes associativas ligadas a cultura e a arte';
                $codServico = '12.15';
                $descrServico = 'Desfiles de blocos carnavalescos ou folcloricos, trios eletricos e congeneres.';

            case '01811301':
            case '13.05':
                $descrCNAE = 'Impressao de jornais';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '01822901':
            case '13.05':
                $descrCNAE = 'Servicos de encadernacao e plastificacao';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '03314702':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de equipamentos hidraulicos e pneumaticos, exceto valvulas';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314713':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas-ferramenta';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03315500':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de veiculos ferroviarios';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04520001':
            case '14.01':
                $descrCNAE = 'Servicos de manutencao e reparacao mecanica de veiculos automotores';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '09529101':
            case '14.01':
                $descrCNAE = 'Reparacao de calcados, bolsas e artigos de viagem';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '02391502':
            case '14.05':
                $descrCNAE = 'Aparelhamento de pedras para construcao, exceto associado a extracao';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '09529105':
            case '14.05':
                $descrCNAE = 'Reparacao de artigos do mobiliario';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '09529199':
            case '14.09':
                $descrCNAE = 'Reparacao e manutencao de outros objetos e equipamentos pessoais e domesticos nao especificados anteriormente';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '06431000':
            case '15.01':
                $descrCNAE = 'Bancos multiplos, sem carteira comercial';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06424701':
            case '15.02':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06422100':
            case '15.05':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.05';
                $descrServico = 'Cadastro, elaboracao de ficha cadastral, renovacao cadastral e congeneres, inclusao ou exclusao no Cadastro de Emitentes de Cheques sem Fundos ¿ CCF ou em quaisquer outros bancos cadastrais.';

            case '06421200':
            case '15.07':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06421200':
            case '15.08':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06436100':
            case '15.08':
                $descrCNAE = 'Sociedades de credito, financiamento e investimento - financeiras';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06421200':
            case '15.10':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06424703':
            case '15.11':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.11';
                $descrServico = 'Devolucao de titulos, protesto de titulos, sustacao de protesto, manutencao de titulos, reapresentacao de titulos, e demais servicos a eles relacionados.';

            case '06438799':
            case '15.13':
                $descrCNAE = 'Outras instituicoes de intermediacao nao-monetaria nao especifidas anteriormente';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '06424704':
            case '15.15':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.15';
                $descrServico = 'Compensacao de cheques e titulos quaisquer;servicos relacionados a deposito, inclusive deposito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusive em terminais eletronicos e de atendimento.';

            case '06424703':
            case '15.17':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.17';
                $descrServico = 'emissao, fornecimento, devolucao, sustacao, cancelamento e oposicao de cheques quaisquer, avulso ou por talao.';

            case '06499904':
            case '15.18':
                $descrCNAE = 'Caixas de financiamento de corporacoes';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '00321305':
            case '17.01':
                $descrCNAE = 'Atividades de apoio a aquicultura em agua salgada e salobra';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '09609299':
            case '17.01':
                $descrCNAE = 'Outras atividades de servicos pessoais nao especificadas anteriormente';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '07490199':
            case '17.02':
                $descrCNAE = 'Outras atividades profissionais, cientificas e tecnicas nao especificadas anteriormente';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '07740300':
            case '17.08':
                $descrCNAE = 'Gestao de ativos intangiveis nao-financeiros';
                $codServico = '17.08';
                $descrServico = 'Franquia (franchising).';

            case '06491300':
            case '17.23':
                $descrCNAE = 'Sociedades de fomento mercantil - factoring';
                $codServico = '17.23';
                $descrServico = 'Assessoria, analise, avaliacao, atendimento, consulta, cadastro, selecao, gerenciamento de informacoes, administracao de contas a receber ou a pagar e em geral, relacionados a operacoes de faturizacao (factoring).';

            case '05211701':
            case '20.01':
                $descrCNAE = 'Armazens gerais - emissao de warrant';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05250805':
            case '20.03':
                $descrCNAE = 'Operador de transporte multimodal - otm';
                $codServico = '20.03';
                $descrServico = 'Servicos de terminais rodoviarios, ferroviarios, metroviarios, movimentacao de passageiros, mercadorias, inclusive suas operacoes, logistica e congeneres.';

            case '09603399':
            case '25.05':
                $descrCNAE = 'Atividades Funerarias e servicos relacionados nao especificados anteriormente';
                $codServico = '25.05';
                $descrServico = 'Cessao de uso de espacos em cemiterios para sepultamento.';

            case '07490105':
            case '37.01':
                $descrCNAE = 'Agenciamento de profissionais para atividades esportivas, culturais e artisticas';
                $codServico = '37.01';
                $descrServico = 'Servicos de artistas, atletas, modelos e manequins';

            case '07500100':
            case '05.07':
                $descrCNAE = 'Atividades veterinarias';
                $codServico = '05.07';
                $descrServico = 'Unidade de atendimento, assistencia ou tratamento movel e congeneres.';

            case '00162801':
            case '05.04':
                $descrCNAE = 'Servico de inseminacao artificial em animais';
                $codServico = '05.04';
                $descrServico = 'Inseminacao artificial, fertilizacao in vitro e congeneres.';

            case '02330305':
            case '07.02':
                $descrCNAE = 'Preparacao de massa de concreto e agamassa para construcao';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '03250703':
            case '04.14':
                $descrCNAE = 'Fabricacao de aparelhos e utensilios para correcao de defeitos fisicos e aparelhos ortopedicos em geral sob encomenda';
                $codServico = '04.14';
                $descrServico = 'Proteses sob encomenda.';

            case '03250706':
            case '04.14':
                $descrCNAE = 'Servicos de protese dentaria';
                $codServico = '04.14';
                $descrServico = 'Proteses sob encomenda.';

            case '06612605':
            case '17.20':
                $descrCNAE = 'Agentes de investimentos em aplicacoes financeiras';
                $codServico = '17.20';
                $descrServico = 'Consultoria e assessoria economica ou financeira.';

            case '06621501':
            case '17.16':
                $descrCNAE = 'Peritos e avaliadores de seguros';
                $codServico = '17.16';
                $descrServico = 'Auditoria.';

            case '06621502':
            case '17.16':
                $descrCNAE = 'Auditoria e consultoria atuarial';
                $codServico = '17.16';
                $descrServico = 'Auditoria.';

            case '06621502':
            case '17.18':
                $descrCNAE = 'Auditoria e consultoria atuarial';
                $codServico = '17.18';
                $descrServico = 'Atuaria e calculos tecnicos de qualquer natureza.';

            case '06621502':
            case '17.20':
                $descrCNAE = 'Auditoria e consultoria atuarial';
                $codServico = '17.20';
                $descrServico = 'Consultoria e assessoria economica ou financeira.';

            case '06920601':
            case '17.19':
                $descrCNAE = 'Atividades de contabilidade';
                $codServico = '17.19';
                $descrServico = 'Contabilidade, inclusive servicos tecnicos e auxiliares.';

            case '06920602':
            case '17.16':
                $descrCNAE = 'Atividades de consultoria e auditoria contabil e tributaria';
                $codServico = '17.16';
                $descrServico = 'Auditoria.';

            case '07020400':
            case '17.17':
                $descrCNAE = 'Atividades de consultoria em gestao empresarial, exceto consultoria tecnica especifica';
                $codServico = '17.17';
                $descrServico = 'Analise de Organizacao e Metodos.';

            case '07020400':
            case '17.20':
                $descrCNAE = 'Atividades de consultoria em gestao empresarial, exceto consultoria tecnica especifica';
                $codServico = '17.20';
                $descrServico = 'Consultoria e assessoria economica ou financeira.';

            case '07119701':
            case '07.01':
                $descrCNAE = 'Servicos de cartografia, topografia e geodesia';
                $codServico = '07.01';
                $descrServico = 'Engenharia, agronomia, agrimensura, arquitetura, geologia, urbanismo, paisagismo e congeneres';

            case '07119702':
            case '07.01':
                $descrCNAE = 'Atividades de estudos geologicos';
                $codServico = '07.01';
                $descrServico = 'Engenharia, agronomia, agrimensura, arquitetura, geologia, urbanismo, paisagismo e congeneres';

            case '07320300':
            case '17.21':
                $descrCNAE = 'Pesquisas de mercado e de opiniao publica';
                $codServico = '17.21';
                $descrServico = 'Estatistica.';

            case '07490199':
            case '17.21':
                $descrCNAE = 'Outras atividades profissionais, cientificas e tecnicas nao especificadas anteriormente';
                $codServico = '17.21';
                $descrServico = 'Estatistica.';

            case '07490199':
            case '36.01':
                $descrCNAE = 'Outras atividades profissionais, cientificas e tecnicas nao especificadas anteriormente';
                $codServico = '36.01';
                $descrServico = 'Servicos de meteorologia';

            case '07500100':
            case '05.02':
                $descrCNAE = 'Atividades veterinarias';
                $codServico = '05.02';
                $descrServico = 'Hospitais, clinicas, ambulatorios, prontos-socorros e congeneres, na area veterinaria.';

            case '07500100':
            case '05.03':
                $descrCNAE = 'Atividades veterinarias';
                $codServico = '05.03';
                $descrServico = 'Laboratorios de analise na area veterinaria.';

            case '07729299':
            case '00.00':
                $descrCNAE = 'Aluguel de outros objetos pessoais e domesticos nao especificados anteriormente';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08291100':
            case '17.22':
                $descrCNAE = 'Atividades de cobranca e informacoes cadastrais';
                $codServico = '17.22';
                $descrServico = 'Cobranca em geral.';

            case '08650003':
            case '04.15':
                $descrCNAE = 'Atividades de psicologia e psicanalise';
                $codServico = '04.15';
                $descrServico = 'Psicanalise.';

            case '09001999':
            case '12.05':
                $descrCNAE = 'Artes cenicas, espetaculos e atividades complementares nao especificados anteriormente';
                $codServico = '12.05';
                $descrServico = 'Parques de diversoes, centros de lazer e congeneres.';

            case '09103100':
            case '12.05':
                $descrCNAE = 'Atividades de jardins botanicos, zoologicos, parques nacionais, reservas ecologicas e areas de protecao ambiental';
                $codServico = '12.05';
                $descrServico = 'Parques de diversoes, centros de lazer e congeneres.';

            case '09321200':
            case '12.05':
                $descrCNAE = 'Parques de diversao e parques tematicos';
                $codServico = '12.05';
                $descrServico = 'Parques de diversoes, centros de lazer e congeneres.';

            case '00162899':
            case '17.01':
                $descrCNAE = 'Atividades de apoio a pecuaria nao especificadas anteriormente';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '04618402':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de instrumentos e materiais odonto-medico-hospitalares';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05250801':
            case '33.01':
                $descrCNAE = 'Comissaria de despachos';
                $codServico = '33.01';
                $descrServico = 'Servicos de desembaraco aduaneiro, comissarios, despachantes e congeneres.';

            case '06423900':
            case '15.01':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06612605':
            case '10.05':
                $descrCNAE = 'Agentes de investimentos em aplicacoes financeiras';
                $codServico = '10.05';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de bens moveis ou imoveis, nao abrangidos em outros itens ou subitens, inclusive aqueles realizados no ambito de Bolsas de Mercadorias e Futuros, por quaisquer meios.';

            case '07722500':
            case '00.00':
                $descrCNAE = 'Aluguel de fitas de video, dvds e similares';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08130300':
            case '07.11':
                $descrCNAE = 'Atividades paisagisticas';
                $codServico = '07.11';
                $descrServico = 'Decoracao e jardinagem, inclusive corte e poda de arvores.';

            case '08599603':
            case '08.02':
                $descrCNAE = 'Treinamento em informatica';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08622400':
            case '04.21':
                $descrCNAE = 'Servicos de remocao de pacientes, exceto os servicos moveis de atendimento a urgencias';
                $codServico = '04.21';
                $descrServico = 'Unidade de atendimento, assistencia ou tratamento movel e congeneres.';

            case '08660700':
            case '17.12':
                $descrCNAE = 'Atividades de apoio a gestao de saude';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '08690999':
            case '04.09':
                $descrCNAE = 'Outras atividades de atencao a saude humana nao especificadas anteriormente';
                $codServico = '04.09';
                $descrServico = 'Terapias de qualquer especie destinadas ao tratamento fisico, organico e mental.';

            case '09001902':
            case '12.14':
                $descrCNAE = 'Producao musical';
                $codServico = '12.14';
                $descrServico = 'Fornecimento de musica para ambientes fechados ou nao, mediante transmissao por qualquer processo.';

            case '09001999':
            case '12.01':
                $descrCNAE = 'Artes cenicas, espetaculos e atividades complementares nao especificados anteriormente';
                $codServico = '12.01';
                $descrServico = 'Espetaculos teatrais.';

            case '09609201':
            case '06.05':
                $descrCNAE = 'Clinicas de estetica e similares';
                $codServico = '06.05';
                $descrServico = 'Centros de emagrecimento, spa e congeneres';

            case '00311604':
            case '17.01':
                $descrCNAE = 'Atividades de apoio a pesca em agua salgada';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '03821100':
            case '07.12':
                $descrCNAE = 'Tratamento e disposicao de residuos nao-perigosos';
                $codServico = '07.12';
                $descrServico = 'Controle e tratamento de efluentes de qualquer natureza e de agentes fisicos, quimicos e biologicos.';

            case '04618403':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de jornais, revistas e outras publicacoes';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05250802':
            case '33.01':
                $descrCNAE = 'Atividades de despachantes aduaneiros';
                $codServico = '33.01';
                $descrServico = 'Servicos de desembaraco aduaneiro, comissarios, despachantes e congeneres.';

            case '05914600':
            case '12.02':
                $descrCNAE = 'Atividades de exibicao cinematografica';
                $codServico = '12.02';
                $descrServico = 'Exibicoes cinematograficas.';

            case '06424701':
            case '15.01':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '07723300':
            case '00.00':
                $descrCNAE = 'Aluguel de objetos do vestuario, joias e acessorios';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08599604':
            case '08.02':
                $descrCNAE = 'Treinamento em desenvolvimento profissional e gerencial';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08650002':
            case '04.10':
                $descrCNAE = 'Atividades de profissionais da nutricao';
                $codServico = '04.10';
                $descrServico = 'Nutricao.';

            case '08712300':
            case '04.21':
                $descrCNAE = 'Atividades de fornecimento de infra-estrutura de apoio e assistencia a paciente no domicilio';
                $codServico = '04.21';
                $descrServico = 'Unidade de atendimento, assistencia ou tratamento movel e congeneres.';

            case '09001906':
            case '12.14':
                $descrCNAE = 'Atividades de sonorizacao e de iluminacao';
                $codServico = '12.14';
                $descrServico = 'Fornecimento de musica para ambientes fechados ou nao, mediante transmissao por qualquer processo.';

            case '09609206':
            case '06.06':
                $descrCNAE = 'Servicos de tatuagem e colocacao de piercing';
                $codServico = '06.06';
                $descrServico = 'Aplicacao de tatuagens, piercings e congeneres.';

            case '09609299':
            case '17.12':
                $descrCNAE = 'Outras atividades de servicos pessoais nao especificadas anteriormente';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '00312404':
            case '17.01':
                $descrCNAE = 'Atividades de apoio a pesca em agua doce';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '02391501':
            case '07.01':
                $descrCNAE = 'Britamento de pedras, exceto associado a extracao';
                $codServico = '07.01';
                $descrServico = 'Engenharia, agronomia, agrimensura, arquitetura, geologia, urbanismo, paisagismo e congeneres';

            case '03822000':
            case '07.12':
                $descrCNAE = 'Tratamento e disposicao de residuos perigosos';
                $codServico = '07.12';
                $descrServico = 'Controle e tratamento de efluentes de qualquer natureza e de agentes fisicos, quimicos e biologicos.';

            case '04618499':
            case '10.09':
                $descrCNAE = 'Outros representantes comerciais e agentes do comercio especializado em produtos nao especificados anteriormente';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '06424702':
            case '15.01':
                $descrCNAE = 'Cooperativas centrais de credito';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06550200':
            case '04.22':
                $descrCNAE = 'Planos de saude';
                $codServico = '04.22';
                $descrServico = 'Planos de medicina de grupo ou individual e convenios para prestacao de assistencia medica, hospitalar, odontologica e congeneres.';

            case '07729201':
            case '00.00':
                $descrCNAE = 'Aluguel de aparelhos de jogos eletronicos';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08030700':
            case '34.01':
                $descrCNAE = 'Atividades de investigacao particular';
                $codServico = '34.01';
                $descrServico = 'Servicos de investigacoes particulares, detetives e congeneres.';

            case '08299704':
            case '17.13':
                $descrCNAE = 'Leiloeiros independentes';
                $codServico = '17.13';
                $descrServico = 'Leilao e congeneres.';

            case '08599605':
            case '08.02':
                $descrCNAE = 'Cursos preparatorios para concursos';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08690999':
            case '04.11':
                $descrCNAE = 'Outras atividades de atencao a saude humana nao especificadas anteriormente';
                $codServico = '04.11';
                $descrServico = 'Obstetricia.';

            case '09001902':
            case '12.15':
                $descrCNAE = 'Producao musical';
                $codServico = '12.15';
                $descrServico = 'Desfiles de blocos carnavalescos ou folcloricos, trios eletricos e congeneres.';

            case '09001904':
            case '12.03':
                $descrCNAE = 'Producao de espetaculos circenses, de marionetes e similares';
                $codServico = '12.03';
                $descrServico = 'Espetaculos circenses.';

            case '00161001':
            case '07.13':
                $descrCNAE = 'Servico de pulverizacao e controle de pragas agricolas';
                $codServico = '07.13';
                $descrServico = 'Dedetizacao, desinfeccao, desinsetizacao, imunizacao, higienizacao, desratizacao, pulverizacao e congeneres.';

            case '06424703':
            case '15.01':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06550200':
            case '04.23':
                $descrCNAE = 'Planos de saude';
                $codServico = '04.23';
                $descrServico = 'Outros planos de saude que se cumpram atraves de servicos de terceiros contratados, credenciados, cooperados ou apenas pagos pelo operador do plano mediante indicacao do usuario.';

            case '06911701':
            case '17.14':
                $descrCNAE = 'Servicos advocaticios';
                $codServico = '17.14';
                $descrServico = 'Advocacia.';

            case '07020400':
            case '35.01':
                $descrCNAE = 'Atividades de consultoria em gestao empresarial, exceto consultoria tecnica especifica';
                $codServico = '35.01';
                $descrServico = 'Servicos de reportagem, assessoria de imprensa, jornalismo e relacoes publicas.';

            case '07111100':
            case '07.01':
                $descrCNAE = 'Servicos de arquitetura';
                $codServico = '07.01';
                $descrServico = 'Engenharia, agronomia, agrimensura, arquitetura, geologia, urbanismo, paisagismo e congeneres';

            case '07729202':
            case '00.00':
                $descrCNAE = 'Aluguel de moveis, utensilios e aparelhos de uso domestico e pessoal, instrumentos musicais';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08599699':
            case '08.02':
                $descrCNAE = 'Outras atividades de ensino nao especificadas anteriormente';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08630504':
            case '04.12':
                $descrCNAE = 'Atividade odontologica';
                $codServico = '04.12';
                $descrServico = 'Odontologia.';

            case '09001903':
            case '12.15':
                $descrCNAE = 'Producao de espetaculos de danca';
                $codServico = '12.15';
                $descrServico = 'Desfiles de blocos carnavalescos ou folcloricos, trios eletricos e congeneres.';

            case '09001999':
            case '12.03':
                $descrCNAE = 'Artes cenicas, espetaculos e atividades complementares nao especificados anteriormente';
                $codServico = '12.03';
                $descrServico = 'Espetaculos circenses.';

            case '00162899':
            case '07.13':
                $descrCNAE = 'Atividades de apoio a pecuaria nao especificadas anteriormente';
                $codServico = '07.13';
                $descrServico = 'Dedetizacao, desinfeccao, desinsetizacao, imunizacao, higienizacao, desratizacao, pulverizacao e congeneres.';

            case '06424704':
            case '15.01':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06911702':
            case '17.15':
                $descrCNAE = 'Atividades auxiliares da justica';
                $codServico = '17.15';
                $descrServico = 'Arbitragem de qualquer especie, inclusive juridica.';

            case '07112000':
            case '07.01':
                $descrCNAE = 'Servicos de engenharia';
                $codServico = '07.01';
                $descrServico = 'Engenharia, agronomia, agrimensura, arquitetura, geologia, urbanismo, paisagismo e congeneres';

            case '07500100':
            case '05.01':
                $descrCNAE = 'Atividades veterinarias';
                $codServico = '05.01';
                $descrServico = 'Medicina veterinaria e zootecnia.';

            case '07729203':
            case '00.00':
                $descrCNAE = 'Aluguel de material medico';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08650099':
            case '04.13':
                $descrCNAE = 'Atividades de profissionais da area de saude nao especificadas anteriormente';
                $codServico = '04.13';
                $descrServico = 'Ortoptica.';

            case '09001999':
            case '12.04':
                $descrCNAE = 'Artes cenicas, espetaculos e atividades complementares nao especificados anteriormente';
                $codServico = '12.04';
                $descrServico = 'Programas de auditorio.';

            case '09002701':
            case '35.01':
                $descrCNAE = 'Atividades de artistas plasticos, jornalistas independentes e escritores';
                $codServico = '35.01';
                $descrServico = 'Servicos de reportagem, assessoria de imprensa, jornalismo e relacoes publicas.';

            case '09312300':
            case '08.02':
                $descrCNAE = 'Clubes sociais, esportivos e similares';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '00312404':
            case '20.01':
                $descrCNAE = 'Atividades de apoio a pesca em agua doce';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '01622699':
            case '14.13':
                $descrCNAE = 'Fabricacao de outros artigos de carpintaria para construcao';
                $codServico = '14.13';
                $descrServico = 'Carpintaria e serralheria.';

            case '02950600':
            case '14.03':
                $descrCNAE = 'Recondicionamento e recuperacao de motores para veiculos automotores';
                $codServico = '14.03';
                $descrServico = 'Recondicionamento de motores (exceto pecas e partes empregadas, que ficam sujeitas ao ICMS).';

            case '03314701':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas motrizes nao-eletricas';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314711':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e equipamentos para agricultura e pecuaria';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314722':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e aparelhos para a industria do plastico';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03514000':
            case '03.04':
                $descrCNAE = 'Distribuicao de energia eletrica';
                $codServico = '03.04';
                $descrServico = 'Locacao, sublocacao, arrendamento, direito de passagem ou permissao de uso, compartilhado ou nao, de ferrovia, rodovia, postes, cabos, dutos e condutos de qualquer natureza.';

            case '03831999':
            case '07.09':
                $descrCNAE = 'Recuperacao de materiais metalicos, exceto aluminio';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04221903':
            case '07.05':
                $descrCNAE = 'Manutencao de redes de distribuicao de energia eletrica';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04222701':
            case '07.02':
                $descrCNAE = 'Construcao de redes de abastecimento de agua, coleta de esgoto e construcoes correlatas, exceto obras de irrigacao';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04321500':
            case '07.02':
                $descrCNAE = 'Instalacao e manutencao eletrica';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04329104':
            case '14.01':
                $descrCNAE = 'Montagem e instalacao de sistemas e equipamentos de iluminacao e sinalizacao em vias publicas, portos e aeroportos';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04330402':
            case '07.06':
                $descrCNAE = 'Instalacao de portas, janelas, tetos, divisorias e armarios embutidos de qualquer material';
                $codServico = '07.06';
                $descrServico = 'Colocacao e instalacao de tapetes, carpetes, assoalhos, cortinas, revestimentos de parede, vidros, divisorias, placas de gesso e congeneres, com material fornecido pelo tomador do servico.';

            case '04330403':
            case '14.07':
                $descrCNAE = 'Obras de acabamento em gesso e estuque';
                $codServico = '14.07';
                $descrServico = 'Colocacao de molduras e congeneres.';

            case '04391600':
            case '07.02':
                $descrCNAE = 'Obras de fundacoes';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04530706':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de pecas e acessorios novos e usados para veiculos automotores';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '04930203':
            case '16.02':
                $descrCNAE = 'Transporte rodoviario de produtos perigosos';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05120000':
            case '16.02':
                $descrCNAE = 'Transporte aereo de carga';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05022002':
            case '00.00':
                $descrCNAE = 'transporte por navegacao interior de passageiros em linhas regulares, intermunicipal, interestadual e internacional, exceto travessia';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05250805':
            case '20.02':
                $descrCNAE = 'Operador de transporte multimodal - otm';
                $codServico = '20.02';
                $descrServico = 'Servicos aeroportuarios, utilizacao de aeroporto, movimentacao de passageiros, armazenagem de qualquer natureza, capatazia, movimentacao de aeronaves, servicos de apoio aeroportuarios, servicos acessorios, movimentacao de mercadorias, logistica e congener';

            case '05620104':
            case '17.11':
                $descrCNAE = 'Fornecimento de alimentos preparados preponderantemente para consumo domiciliar';
                $codServico = '17.11';
                $descrServico = 'Organizacao de festas e recepcoes;bufe (exceto o fornecimento de alimentacao e bebidas, que fica sujeito ao ICMS).';

            case '05821200':
            case '17.02':
                $descrCNAE = 'Edicao integrada a impressao de livros';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '05911101':
            case '13.03':
                $descrCNAE = 'Estudios cinematograficos';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '06190601':
            case '01.03':
                $descrCNAE = 'Provedores de acesso as redes de comunicacoes';
                $codServico = '01.03';
                $descrServico = 'Processamento, armazenamento ou hospedagem de dados, textos, imagens, videos, paginas eletronicas, aplicativos e sistemas de informacao, entre outros formatos, e congeneres.';

            case '06421200':
            case '15.17':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.17';
                $descrServico = 'emissao, fornecimento, devolucao, sustacao, cancelamento e oposicao de cheques quaisquer, avulso ou por talao.';

            case '06422100':
            case '15.11':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.11';
                $descrServico = 'Devolucao de titulos, protesto de titulos, sustacao de protesto, manutencao de titulos, reapresentacao de titulos, e demais servicos a eles relacionados.';

            case '06423900':
            case '15.15':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.15';
                $descrServico = 'Compensacao de cheques e titulos quaisquer;servicos relacionados a deposito, inclusive deposito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusive em terminais eletronicos e de atendimento.';

            case '06424701':
            case '15.03':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.03';
                $descrServico = 'Locacao e manutencao de cofres particulares, de terminais eletronicos, de terminais de atendimento e de bens e equipamentos em geral.';

            case '06424703':
            case '15.06':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.06';
                $descrServico = 'Emissao, reemissao e fornecimento de avisos, comprovantes e documentos em geral;abono de firmas;coleta e entrega de documentos, bens e valores;comunicacao com outra agencia ou com a administracao central;licenciamento eletronico de veiculos;transfere';

            case '06431000':
            case '15.09':
                $descrCNAE = 'Bancos multiplos, sem carteira comercial';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06435201':
            case '15.18':
                $descrCNAE = 'Sociedades de credito imobiliario';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06435202':
            case '15.08':
                $descrCNAE = 'Associacoes de poupanca e emprestimo';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06450600':
            case '15.07':
                $descrCNAE = 'Sociedades de capitalizacao';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06499902':
            case '15.01':
                $descrCNAE = 'Sociedades de investimento';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06499999':
            case '15.12':
                $descrCNAE = 'Outras atividades de servicos financeiros nao especificadas anteriormente';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '07112000':
            case '28.01':
                $descrCNAE = 'Servicos de engenharia';
                $codServico = '28.01';
                $descrServico = 'Servicos de avaliacao de bens e servicos de qualquer natureza.';

            case '07119702':
            case '07.20':
                $descrCNAE = 'Atividades de estudos geologicos';
                $codServico = '07.20';
                $descrServico = 'Aerofotogrametria (inclusive interpretacao), cartografia, mapeamento, levantamentos topograficos, batimetricos, geograficos, geodesicos, geologicos, geofisicos e congeneres';

            case '07312200':
            case '99.99':
                $descrCNAE = 'Agenciamento de espacos para publicidade, exceto em veiculos de comunicacao';
                $codServico = '99.99';
                $descrServico = 'Veiculacao de publicidade e outras situacoes de nao incidencia.';

            case '07490105':
            case '10.02':
                $descrCNAE = 'Agenciamento de profissionais para atividades esportivas, culturais e artisticas';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '07911200':
            case '09.02':
                $descrCNAE = 'Agencias de viagens';
                $codServico = '09.02';
                $descrServico = 'Agenciamento, organizacao, promocao, intermediacao e execucao de programas de turismo, passeios, viagens, excursoes, hospedagens e congeneres.';

            case '08020002':
            case '11.02':
                $descrCNAE = 'Outras atividades de servicos de seguranca';
                $codServico = '11.02';
                $descrServico = 'Vigilancia, seguranca ou monitoramento de bens, pessoas e semoventes.';

            case '08111700':
            case '17.05':
                $descrCNAE = 'Servicos combinados para apoio a edificios, exceto condominios prediais';
                $codServico = '17.05';
                $descrServico = 'Fornecimento de mao-de-obra, mesmo em carater temporario, inclusive de empregados ou trabalhadores, avulsos ou temporarios, contratados pelo prestador de servico';

            case '08292000':
            case '14.05':
                $descrCNAE = 'Envasamento e empacotamento sob contrato';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '08299701':
            case '17.01':
                $descrCNAE = 'Medicao de consumo de energia eletrica, gas e agua';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '08299703':
            case '24.01':
                $descrCNAE = 'Servicos de gravacao de carimbos, exceto confeccao';
                $codServico = '24.01';
                $descrServico = 'Servicos de chaveiros, confeccao de carimbos, placas, sinalizacao visual, banners, adesivos e congeneres.';

            case '08533300':
            case '08.01':
                $descrCNAE = 'Educacao superior - pos-graduacao e extensao';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08640207':
            case '04.02':
                $descrCNAE = 'Servicos de diagnostico por imagem sem uso de radiacao ionizante, exceto ressonancia magnetica';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08650001':
            case '04.06':
                $descrCNAE = 'Atividades de enfermagem';
                $codServico = '04.06';
                $descrServico = 'Enfermagem, inclusive servicos auxiliares';

            case '08730199':
            case '04.17':
                $descrCNAE = 'Atividades de assistencia social prestadas em residencias coletivas e particulares nao especificadas anteriormente';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09200302':
            case '12.10':
                $descrCNAE = 'Exploracao de apostas em corridas de cavalos';
                $codServico = '12.10';
                $descrServico = 'Corridas e competicoes de animais.';

            case '09512600':
            case '14.01':
                $descrCNAE = 'Reparacao e manutencao de equipamentos de comunicacao';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '09602502':
            case '06.01':
                $descrCNAE = 'Outras atividades de tratamento de beleza';
                $codServico = '06.01';
                $descrServico = 'Barbearia, cabeleireiros, manicuros, pedicuros e congeneres.';

            case '00321305':
            case '20.01':
                $descrCNAE = 'Atividades de apoio a aquicultura em agua salgada e salobra';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '01822999':
            case '14.08':
                $descrCNAE = 'Servicos de acabamentos graficos, exceto encadernacao e plastificacao';
                $codServico = '14.08';
                $descrServico = 'Encadernacao, gravacao e douracao de livros, revistas e congeneres.';

            case '02212900':
            case '14.04':
                $descrCNAE = 'Reforma de pneumaticos usados';
                $codServico = '14.04';
                $descrServico = 'Recauchutagem ou regeneracao de pneus.';

            case '02399101':
            case '14.13':
                $descrCNAE = 'Decoracao, lapidacao, gravacao, vitrificacao e outros trabalhos em ceramica, louca, vidro e cristal';
                $codServico = '14.13';
                $descrServico = 'Carpintaria e serralheria.';

            case '03314712':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de tratores agricolas';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314799':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de outras maquinas e equipamentos para usos industriais nao especificados anteriormente';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03520402':
            case '03.04':
                $descrCNAE = 'Distribuicao de combustiveis gasosos por redes urbanas';
                $codServico = '03.04';
                $descrServico = 'Locacao, sublocacao, arrendamento, direito de passagem ou permissao de uso, compartilhado ou nao, de ferrovia, rodovia, postes, cabos, dutos e condutos de qualquer natureza.';

            case '03832700':
            case '07.09':
                $descrCNAE = 'Recuperacao de materiais plasticos';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04221905':
            case '07.05':
                $descrCNAE = 'Manutencao de estacoes e redes de telecomunicacoes';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04222702':
            case '07.02':
                $descrCNAE = 'Obras de irrigacao';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';
            case '04322301':
            case '07.02':
                $descrCNAE = 'Instalacoes hidraulicas, sanitarias e de gas';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04329105':
            case '14.01':
                $descrCNAE = 'Tratamentos termicos, acusticos ou de vibracao';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04330403':
            case '07.06':
                $descrCNAE = 'Obras de acabamento em gesso e estuque';
                $codServico = '07.06';
                $descrServico = 'Colocacao e instalacao de tapetes, carpetes, assoalhos, cortinas, revestimentos de parede, vidros, divisorias, placas de gesso e congeneres, com material fornecido pelo tomador do servico.';

            case '04399101':
            case '07.02':
                $descrCNAE = 'Administracao de obras';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04542101':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de motocicletas e motonetas, pecas e acessorios';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '04771702':
            case '04.07':
                $descrCNAE = 'Comercio varejista de produtos farmaceuticos, com manipulacao de formulas';
                $codServico = '04.07';
                $descrServico = 'Servicos farmaceuticos';

            case '04930204':
            case '16.02':
                $descrCNAE = 'Transporte rodoviario de mudancas';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05091202':
            case '00.00':
                $descrCNAE = 'Transporte por navegacao de travessia, intermunicipal';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05222200':
            case '20.03':
                $descrCNAE = 'Terminais rodoviarios e ferroviarios';
                $codServico = '20.03';
                $descrServico = 'Servicos de terminais rodoviarios, ferroviarios, metroviarios, movimentacao de passageiros, mercadorias, inclusive suas operacoes, logistica e congeneres.';

            case '05229099':
            case '11.03':
                $descrCNAE = 'Outras atividades auxiliares dos transportes terrestres nao especificadas anteriormente';
                $codServico = '11.03';
                $descrServico = 'Escolta, inclusive de veiculos e cargas.';

            case '05822100':
            case '17.02':
                $descrCNAE = 'Edicao integrada a impressao de jornais';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '05911102':
            case '17.06':
                $descrCNAE = 'Producao de filmes para publicidade';
                $codServico = '17.06';
                $descrServico = 'Propaganda e publicidade, inclusive promocao de vendas, planejamento de campanhas ou sistemas de publicidade, elaboracao de desenhos, textos e demais materiais publicitarios.';

            case '05912099':
            case '13.03':
                $descrCNAE = 'Atividades de pos-producao cinematografica, de videos e de programas de televisao nao especificadas anteriormente';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '06311900':
            case '01.03':
                $descrCNAE = 'Tratamento de dados, provedores de servicos de aplicacao e servicos de hospedagem na internet';
                $codServico = '01.03';
                $descrServico = 'Processamento, armazenamento ou hospedagem de dados, textos, imagens, videos, paginas eletronicas, aplicativos e sistemas de informacao, entre outros formatos, e congeneres.';

            case '06422100':
            case '15.17':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.17';
                $descrServico = 'emissao, fornecimento, devolucao, sustacao, cancelamento e oposicao de cheques quaisquer, avulso ou por talao.';

            case '06423900':
            case '15.11':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.11';
                $descrServico = 'Devolucao de titulos, protesto de titulos, sustacao de protesto, manutencao de titulos, reapresentacao de titulos, e demais servicos a eles relacionados.';

            case '06424701':
            case '15.15':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.15';
                $descrServico = 'Compensacao de cheques e titulos quaisquer;servicos relacionados a deposito, inclusive deposito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusive em terminais eletronicos e de atendimento.';

            case '06424703':
            case '15.03':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.03';
                $descrServico = 'Locacao e manutencao de cofres particulares, de terminais eletronicos, de terminais de atendimento e de bens e equipamentos em geral.';

            case '06424704':
            case '15.06':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.06';
                $descrServico = 'Emissao, reemissao e fornecimento de avisos, comprovantes e documentos em geral;abono de firmas;coleta e entrega de documentos, bens e valores;comunicacao com outra agencia ou com a administracao central;licenciamento eletronico de veiculos;transfere';

            case '06435202':
            case '15.18':
                $descrCNAE = 'Associacoes de poupanca e emprestimo';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06435203':
            case '15.08':
                $descrCNAE = 'Companhias hipotecarias';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06440900':
            case '15.09':
                $descrCNAE = 'Arrendamento mercantil';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06493000':
            case '17.12':
                $descrCNAE = 'Administracao de consorcios para aquisicao de bens e direitos';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '06613400':
            case '15.01':
                $descrCNAE = 'Administracao de cartoes de credito';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06619301':
            case '15.12':
                $descrCNAE = 'Servicos de liquidacao e custodia';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06619304':
            case '15.07':
                $descrCNAE = 'Caixas eletronicos';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '07119799':
            case '07.20':
                $descrCNAE = 'Atividades tecnicas relacionadas a engenharia e arquitetura nao especificadas anteriormente';
                $codServico = '07.20';
                $descrServico = 'Aerofotogrametria (inclusive interpretacao), cartografia, mapeamento, levantamentos topograficos, batimetricos, geograficos, geodesicos, geologicos, geofisicos e congeneres';

            case '07490199':
            case '28.01':
                $descrCNAE = 'Outras atividades profissionais, cientificas e tecnicas nao especificadas anteriormente';
                $codServico = '28.01';
                $descrServico = 'Servicos de avaliacao de bens e servicos de qualquer natureza.';

            case '07912100':
            case '09.02':
                $descrCNAE = 'Operadores turisticos';
                $codServico = '09.02';
                $descrServico = 'Agenciamento, organizacao, promocao, intermediacao e execucao de programas de turismo, passeios, viagens, excursoes, hospedagens e congeneres.';

            case '08299705':
            case '10.02':
                $descrCNAE = 'Servicos de levantamento de fundos sob contrato';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '08541400':
            case '08.01':
                $descrCNAE = 'Educacao profissional de nivel tecnico';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08630507':
            case '04.18':
                $descrCNAE = 'Atividades de reproducao humana assistida';
                $codServico = '04.18';
                $descrServico = 'Inseminacao artificial, fertilizacao in vitro e congeneres.';

            case '08640208':
            case '04.02':
                $descrCNAE = 'Servicos de diagnostico por registro grafico - ECG, EEG e outros exames analogos';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '09002702':
            case '14.05':
                $descrCNAE = 'Restauracao de obras de arte';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '09319101':
            case '12.11':
                $descrCNAE = 'Producao e promocao de eventos esportivos';
                $codServico = '12.11';
                $descrServico = 'Competicoes esportivas ou de destreza fisica ou intelectual, com ou sem a participacao do espectador.';

            case '09430800':
            case '17.01':
                $descrCNAE = 'Atividades de associacao de defesa de direitos sociais';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '09521500':
            case '14.01':
                $descrCNAE = 'Reparacao e manutencao de equipamentos eletroeletronicos de uso pessoal e domestico';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '09529102':
            case '24.01':
                $descrCNAE = 'Chaveiros';
                $codServico = '24.01';
                $descrServico = 'Servicos de chaveiros, confeccao de carimbos, placas, sinalizacao visual, banners, adesivos e congeneres.';

            case '09602502':
            case '06.02':
                $descrCNAE = 'Outras atividades de tratamento de beleza';
                $codServico = '06.02';
                $descrServico = 'Esteticistas, tratamento de pele, depilacao e congeneres.';

            case '00910600':
            case '07.21':
                $descrCNAE = 'Atividades de apoio a extracao de petroleo e gas natural';
                $codServico = '07.21';
                $descrServico = 'Pesquisa, perfuracao, cimentacao, mergulho, perfilagem, concretacao, testemunhagem, pescaria, estimulacao e outros servicos relacionados com a exploracao e explotacao de petroleo, gas natural e de outros recursos minerais';

            case '01340599':
            case '14.09':
                $descrCNAE = 'Outros servicos de acabamento em fios, tecidos, artefatos texteis e pecas do vestuario';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '02512800':
            case '14.13':
                $descrCNAE = 'Fabricacao de esquadrias de metal';
                $codServico = '14.13';
                $descrServico = 'Carpintaria e serralheria.';

            case '03839401':
            case '07.09':
                $descrCNAE = 'Usinas de compostagem';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04222701':
            case '07.05':
                $descrCNAE = 'Construcao de redes de abastecimento de agua, coleta de esgoto e construcoes correlatas, exceto obras de irrigacao';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04330405':
            case '07.06':
                $descrCNAE = 'Aplicacao de revestimentos e de resinas em interiores e exteriores';
                $codServico = '07.06';
                $descrServico = 'Colocacao e instalacao de tapetes, carpetes, assoalhos, cortinas, revestimentos de parede, vidros, divisorias, placas de gesso e congeneres, com material fornecido pelo tomador do servico.';

            case '04520006':
            case '14.04':
                $descrCNAE = 'Servicos de borracharia para veiculos automotores';
                $codServico = '14.04';
                $descrServico = 'Recauchutagem ou regeneracao de pneus.';

            case '04611700':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de materias-primas agricolas e animais vivos';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '04771703':
            case '04.07':
                $descrCNAE = 'Comercio varejista de produtos farmaceuticos homeopaticos';
                $codServico = '04.07';
                $descrServico = 'Servicos farmaceuticos';

            case '04911600':
            case '03.04':
                $descrCNAE = 'Transporte ferroviario de carga';
                $codServico = '03.04';
                $descrServico = 'Locacao, sublocacao, arrendamento, direito de passagem ou permissao de uso, compartilhado ou nao, de ferrovia, rodovia, postes, cabos, dutos e condutos de qualquer natureza.';

            case '04930204':
            case '11.04':
                $descrCNAE = 'Transporte rodoviario de mudancas';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '04930204':
            case '79.27':
                $descrCNAE = 'Transporte rodoviario de mudancas';
                $codServico = '79.27';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '04940000':
            case '16.02':
                $descrCNAE = 'Transporte dutoviario';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05030101':
            case '20.01':
                $descrCNAE = 'Navegacao de apoio maritimo';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05112901':
            case '00.00':
                $descrCNAE = 'Servico de taxi aereo e locacao de aeronaves com tripulacao';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05823900':
            case '17.02':
                $descrCNAE = 'Edicao integrada a impressao de revistas';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '06201501':
            case '01.04':
                $descrCNAE = 'Desenvolvimento de programas de computador sob encomenda';
                $codServico = '01.04';
                $descrServico = 'Elaboracao de programas de computadores, inclusive de jogos eletronicos, independentemente da arquitetura construtiva da maquina em que o programa sera executado, incluindo tablets, smartphones e congeneres.';

            case '06421200':
            case '15.13':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '06423900':
            case '15.17':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.17';
                $descrServico = 'emissao, fornecimento, devolucao, sustacao, cancelamento e oposicao de cheques quaisquer, avulso ou por talao.';

            case '06424701':
            case '15.11':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.11';
                $descrServico = 'Devolucao de titulos, protesto de titulos, sustacao de protesto, manutencao de titulos, reapresentacao de titulos, e demais servicos a eles relacionados.';

            case '06424703':
            case '15.15':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.15';
                $descrServico = 'Compensacao de cheques e titulos quaisquer;servicos relacionados a deposito, inclusive deposito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusive em terminais eletronicos e de atendimento.';

            case '06424704':
            case '15.03':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.03';
                $descrServico = 'Locacao e manutencao de cofres particulares, de terminais eletronicos, de terminais de atendimento e de bens e equipamentos em geral.';

            case '06431000':
            case '15.06':
                $descrCNAE = 'Bancos multiplos, sem carteira comercial';
                $codServico = '15.06';
                $descrServico = 'Emissao, reemissao e fornecimento de avisos, comprovantes e documentos em geral;abono de firmas;coleta e entrega de documentos, bens e valores;comunicacao com outra agencia ou com a administracao central;licenciamento eletronico de veiculos;transfere';

            case '06435203':
            case '15.18':
                $descrCNAE = 'Companhias hipotecarias';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06611801':
            case '17.12':
                $descrCNAE = 'Bolsa de valores';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '06619305':
            case '15.01':
                $descrCNAE = 'Operadoras de cartoes de debito';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '07311400':
            case '17.06':
                $descrCNAE = 'Agencias de publicidade';
                $codServico = '17.06';
                $descrServico = 'Propaganda e publicidade, inclusive promocao de vendas, planejamento de campanhas ou sistemas de publicidade, elaboracao de desenhos, textos e demais materiais publicitarios.';

            case '07420001':
            case '13.03':
                $descrCNAE = 'Atividades de producao de fotografias, exceto aerea e submarina';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '07990200':
            case '09.02':
                $descrCNAE = 'Servicos de reservas e outros servicos de turismo nao especificados anteriormente';
                $codServico = '09.02';
                $descrServico = 'Agenciamento, organizacao, promocao, intermediacao e execucao de programas de turismo, passeios, viagens, excursoes, hospedagens e congeneres.';

            case '08542200':
            case '08.01':
                $descrCNAE = 'Educacao profissional de nivel tecnologico';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08630507':
            case '04.19':
                $descrCNAE = 'Atividades de reproducao humana assistida';
                $codServico = '04.19';
                $descrServico = 'Bancos de sangue, leite, pele, olhos, ovulos, semen e congeneres.';

            case '08640209':
            case '04.02':
                $descrCNAE = 'Servicos de diagnostico por metodos opticos - endoscopia e outros exames analogos';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '09101500':
            case '29.01':
                $descrCNAE = 'Atividades de bibliotecas e arquivos';
                $codServico = '29.01';
                $descrServico = 'Servicos de biblioteconomia.';

            case '09319199':
            case '12.11':
                $descrCNAE = 'Outras atividades esportivas nao especificadas anteriormente';
                $codServico = '12.11';
                $descrServico = 'Competicoes esportivas ou de destreza fisica ou intelectual, com ou sem a participacao do espectador.';

            case '09603303':
            case '25.01':
                $descrCNAE = 'Servicos de sepultamento';
                $codServico = '25.01';
                $descrServico = 'Funerais, inclusive fornecimento de caixao, urna ou esquifes;aluguel de capela;transporte do corpo cadaverico;fornecimento de flores, coroas e outros paramentos;desembaraco de certidao de obito;fornecimento de veu, essa e outros adornos;embalsamento';

            case '09609201':
            case '06.02':
                $descrCNAE = 'Clinicas de estetica e similares';
                $codServico = '06.02';
                $descrServico = 'Esteticistas, tratamento de pele, depilacao e congeneres.';

            case '09609202':
            case '10.02':
                $descrCNAE = 'Agencias matrimoniais';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '00990401':
            case '07.21':
                $descrCNAE = 'Atividades de apoio a extracao de minerio de ferro';
                $codServico = '07.21';
                $descrServico = 'Pesquisa, perfuracao, cimentacao, mergulho, perfilagem, concretacao, testemunhagem, pescaria, estimulacao e outros servicos relacionados com a exploracao e explotacao de petroleo, gas natural e de outros recursos minerais';

            case '01340501':
            case '14.05':
                $descrCNAE = 'Estamparia e texturizacao em fios, tecidos, artefatos texteis e pecas do vestuario';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '01411802':
            case '14.09':
                $descrCNAE = 'Faccao de roupas intimas';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '02542000':
            case '14.13':
                $descrCNAE = 'Fabricacao de artigos de serralheria, exceto esquadrias';
                $codServico = '14.13';
                $descrServico = 'Carpintaria e serralheria.';

            case '03839499':
            case '07.09':
                $descrCNAE = 'Recuperacao de materiais nao especificados anteriormente';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04612500':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de combustiveis, minerais, produtos siderurgicos e quimicos';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '04950700':
            case '16.02':
                $descrCNAE = 'Trens turisticos, telefericos e similares';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05030102':
            case '20.01':
                $descrCNAE = 'Navegacao de apoio portuario';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05112902':
            case '00.00':
                $descrCNAE = 'Servico de locacao de aeronaves com tripulacao';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05211701':
            case '11.04':
                $descrCNAE = 'Armazens gerais - emissao de warrant';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '05221400':
            case '03.04':
                $descrCNAE = 'Concessionarias de rodovias, pontes, tuneis e servicos relacionados';
                $codServico = '03.04';
                $descrServico = 'Locacao, sublocacao, arrendamento, direito de passagem ou permissao de uso, compartilhado ou nao, de ferrovia, rodovia, postes, cabos, dutos e condutos de qualquer natureza.';

            case '05811500':
            case '10.03':
                $descrCNAE = 'Edicao de livros';
                $codServico = '10.03';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de direitos de propriedade industrial, artistica ou literaria.';

            case '05829800':
            case '17.02':
                $descrCNAE = 'Edicao integrada a impressao de cadastros, listas e outros produtos graficos';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '06202300':
            case '01.04':
                $descrCNAE = 'Desenvolvimento e licenciamento de programas de computador customizaveis';
                $codServico = '01.04';
                $descrServico = 'Elaboracao de programas de computadores, inclusive de jogos eletronicos, independentemente da arquitetura construtiva da maquina em que o programa sera executado, incluindo tablets, smartphones e congeneres.';

            case '06421200':
            case '15.02':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06421200':
            case '15.04':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.04';
                $descrServico = 'Fornecimento ou emissao de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congeneres.';

            case '06422100':
            case '15.13':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '06424701':
            case '15.17':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.17';
                $descrServico = 'emissao, fornecimento, devolucao, sustacao, cancelamento e oposicao de cheques quaisquer, avulso ou por talao.';

            case '06611802':
            case '17.12':
                $descrCNAE = 'Bolsa de mercadorias';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '07210000':
            case '30.01':
                $descrCNAE = 'Pesquisa e desenvolvimento experimental em ciencias fisicas e naturais';
                $codServico = '30.01';
                $descrServico = 'Servicos de biologia, biotecnologia e quimica.';

            case '07319001':
            case '17.06':
                $descrCNAE = 'Criacao e montagem de estandes para feiras e exposicoes';
                $codServico = '17.06';
                $descrServico = 'Propaganda e publicidade, inclusive promocao de vendas, planejamento de campanhas ou sistemas de publicidade, elaboracao de desenhos, textos e demais materiais publicitarios.';

            case '07420002':
            case '13.03':
                $descrCNAE = 'Atividades de producao de fotografias aereas e submarinas';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '07912100':
            case '09.03':
                $descrCNAE = 'Operadores turisticos';
                $codServico = '09.03';
                $descrServico = 'Guias de turismo.';

            case '08550302':
            case '08.02':
                $descrCNAE = 'Atividades de apoio a educacao, exceto caixas escolares';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08640210':
            case '04.02':
                $descrCNAE = 'Servicos de quimioterapia';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08640212':
            case '04.19':
                $descrCNAE = 'Servicos de hemoterapia';
                $codServico = '04.19';
                $descrServico = 'Bancos de sangue, leite, pele, olhos, ovulos, semen e congeneres.';

            case '08650004':
            case '04.08':
                $descrCNAE = 'Atividades de fisioterapia';
                $codServico = '04.08';
                $descrServico = 'Terapia ocupacional, fisioterapia e fonoaudiologia';

            case '09001902':
            case '12.12':
                $descrCNAE = 'Producao musical';
                $codServico = '12.12';
                $descrServico = 'Execucao de musica';

            case '09603304':
            case '25.01':
                $descrCNAE = 'Servicos de funerarias';
                $codServico = '25.01';
                $descrServico = 'Funerais, inclusive fornecimento de caixao, urna ou esquifes;aluguel de capela;transporte do corpo cadaverico;fornecimento de flores, coroas e outros paramentos;desembaraco de certidao de obito;fornecimento de veu, essa e outros adornos;embalsamento';

            case '09609206':
            case '06.02':
                $descrCNAE = 'Servicos de tatuagem e colocacao de piercing';
                $codServico = '06.02';
                $descrServico = 'Esteticistas, tratamento de pele, depilacao e congeneres.';

            case '00990402':
            case '07.21':
                $descrCNAE = 'Atividades de apoio a extracao de minerais metalicos nao-ferrosos';
                $codServico = '07.21';
                $descrServico = 'Pesquisa, perfuracao, cimentacao, mergulho, perfilagem, concretacao, testemunhagem, pescaria, estimulacao e outros servicos relacionados com a exploracao e explotacao de petroleo, gas natural e de outros recursos minerais';

            case '01412602':
            case '14.09':
                $descrCNAE = 'Confeccao, sob medida, de pecas do vestuario, exceto roupas intimas';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '02391501':
            case '14.05':
                $descrCNAE = 'Britamento de pedras, exceto associado a extracao';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '02599301':
            case '14.13':
                $descrCNAE = 'Servicos de confeccao de armacoes metalicas para a construcao';
                $codServico = '14.13';
                $descrServico = 'Carpintaria e serralheria.';

            case '04399102':
            case '03.05':
                $descrCNAE = 'Montagem e desmontagem de andaimes e outras estruturas temporarias';
                $codServico = '03.05';
                $descrServico = 'Cessao de andaimes, palcos, coberturas e outras estruturas de uso temporario.';

            case '04613300':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de madeira, material de construcao e ferragens';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05021101':
            case '16.02':
                $descrCNAE = 'Transporte por navegacao interior de carga, municipal, exceto travessia';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05211702':
            case '11.04':
                $descrCNAE = 'Guarda-moveis';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '06022502':
            case '10.03':
                $descrCNAE = 'Atividades relacionadas a televisao por assinatura, exceto programadoras';
                $codServico = '10.03';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de direitos de propriedade industrial, artistica ou literaria.';

            case '06203100':
            case '01.04':
                $descrCNAE = 'Desenvolvimento e licenciamento de programas de computador naocustomizaveis';
                $codServico = '01.04';
                $descrServico = 'Elaboracao de programas de computadores, inclusive de jogos eletronicos, independentemente da arquitetura construtiva da maquina em que o programa sera executado, incluindo tablets, smartphones e congeneres.';

            case '06422100':
            case '15.02':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06422100':
            case '15.04':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.04';
                $descrServico = 'Fornecimento ou emissao de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congeneres.';

            case '06423900':
            case '15.13':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '06611803':
            case '17.12':
                $descrCNAE = 'Bolsa de mercadorias e futuros';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '06810202':
            case '00.00':
                $descrCNAE = 'Aluguel de imoveis proprios';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '07319002':
            case '17.06':
                $descrCNAE = 'Promocao de vendas';
                $codServico = '17.06';
                $descrServico = 'Propaganda e publicidade, inclusive promocao de vendas, planejamento de campanhas ou sistemas de publicidade, elaboracao de desenhos, textos e demais materiais publicitarios.';

            case '07420003':
            case '13.03':
                $descrCNAE = 'Laboratorios fotograficos';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '07490101':
            case '17.02':
                $descrCNAE = 'Servicos de traducao, interpretacao e similares';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '08129000':
            case '07.09':
                $descrCNAE = 'Atividades de limpeza nao especificadas anteriormente';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '08592902':
            case '08.02':
                $descrCNAE = 'Ensino de artes cenicas, exceto danca';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08640202':
            case '30.01':
                $descrCNAE = 'Laboratorios clinicos';
                $codServico = '30.01';
                $descrServico = 'Servicos de biologia, biotecnologia e quimica.';

            case '08640211':
            case '04.02':
                $descrCNAE = 'Servicos de radioterapia';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08640214':
            case '04.19':
                $descrCNAE = 'Servicos de bancos de celulas e tecidos humanos';
                $codServico = '04.19';
                $descrServico = 'Bancos de sangue, leite, pele, olhos, ovulos, semen e congeneres.';

            case '08650005':
            case '04.08':
                $descrCNAE = 'Atividades de terapia ocupacional';
                $codServico = '04.08';
                $descrServico = 'Terapia ocupacional, fisioterapia e fonoaudiologia';

            case '09001901':
            case '12.13':
                $descrCNAE = 'Producao teatral';
                $codServico = '12.13';
                $descrServico = 'Producao, mediante ou sem encomenda previa, de eventos, espetaculos, entrevistas, shows, ballet, dancas, desfiles, bailes, teatros, operas, concertos, recitais, festivais e congeneres';

            case '09603305':
            case '25.01':
                $descrCNAE = 'Servicos de somatoconservacao';
                $codServico = '25.01';
                $descrServico = 'Funerais, inclusive fornecimento de caixao, urna ou esquifes;aluguel de capela;transporte do corpo cadaverico;fornecimento de flores, coroas e outros paramentos;desembaraco de certidao de obito;fornecimento de veu, essa e outros adornos;embalsamento';

            case '09609299':
            case '06.02':
                $descrCNAE = 'Outras atividades de servicos pessoais nao especificadas anteriormente';
                $codServico = '06.02';
                $descrServico = 'Esteticistas, tratamento de pele, depilacao e congeneres.';

            case '01412603':
            case '14.09':
                $descrCNAE = 'Faccao de pecas do vestuario, exceto roupas intimas';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '03329501':
            case '14.13':
                $descrCNAE = 'Servicos de montagem de moveis de qualquer material';
                $codServico = '14.13';
                $descrServico = 'Carpintaria e serralheria.';

            case '03702900':
            case '07.10':
                $descrCNAE = 'Atividades relacionadas a esgoto, exceto a gestao de redes';
                $codServico = '07.10';
                $descrServico = 'Limpeza, manutencao e conservacao de vias e logradouros publicos, imoveis, chamines, piscinas, parques, jardins e congeneres.';

            case '04399104':
            case '03.05':
                $descrCNAE = 'Servicos de operacao e fornecimento de equipamentos para transporte e elevacao de cargas e pessoas para uso em obras';
                $codServico = '03.05';
                $descrServico = 'Cessao de andaimes, palcos, coberturas e outras estruturas de uso temporario.';

            case '04614100':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de maquinas, equipamentos, embarcacoes e aeronaves';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05022001':
            case '16.02':
                $descrCNAE = 'Transporte por navegacao interior de passageiros em linhas regulares, municipal, exceto travessia';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05211799':
            case '11.04':
                $descrCNAE = 'Depositos de mercadorias para terceiros, exceto armazens gerais e guardamoveis';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '06202300':
            case '01.05':
                $descrCNAE = 'Desenvolvimento e licenciamento de programas de computador customizaveis';
                $codServico = '01.05';
                $descrServico = 'Licenciamento ou cessao de direito de uso de programas de computacao.';

            case '06399200':
            case '31.01':
                $descrCNAE = 'Outras atividades de prestacao de servicos de informacao nao especificadas anteriormente';
                $codServico = '31.01';
                $descrServico = 'Servicos tecnicos em edificacoes, eletronica, eletrotecnica, mecanica, telecomunicacoes e congeneres.';

            case '06423900':
            case '15.02':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06423900':
            case '15.04':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.04';
                $descrServico = 'Fornecimento ou emissao de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congeneres.';

            case '06424701':
            case '15.13':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '06611804':
            case '17.12':
                $descrCNAE = 'Administracao de mercados de balcao organizados';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '06911703':
            case '10.03':
                $descrCNAE = 'Agente de propriedade industrial';
                $codServico = '10.03';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de direitos de propriedade industrial, artistica ou literaria.';

            case '07319003':
            case '17.06':
                $descrCNAE = 'Marketing direto';
                $codServico = '17.06';
                $descrServico = 'Propaganda e publicidade, inclusive promocao de vendas, planejamento de campanhas ou sistemas de publicidade, elaboracao de desenhos, textos e demais materiais publicitarios.';

            case '07420004':
            case '13.03':
                $descrCNAE = 'Filmagem de festas e eventos';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '07711000':
            case '00.00':
                $descrCNAE = 'Locacao de automoveis sem condutor';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08592903':
            case '08.02':
                $descrCNAE = 'Ensino de musica';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08640299':
            case '04.02':
                $descrCNAE = 'Atividades de servicos de complementacao diagnostica e terapeutica nao especificadas anteriormente';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08650006':
            case '04.08':
                $descrCNAE = 'Atividades de fonoaudiologia';
                $codServico = '04.08';
                $descrServico = 'Terapia ocupacional, fisioterapia e fonoaudiologia';

            case '08690902':
            case '04.19':
                $descrCNAE = 'Atividades de bancos de leite humano';
                $codServico = '04.19';
                $descrServico = 'Bancos de sangue, leite, pele, olhos, ovulos, semen e congeneres.';

            case '09001902':
            case '12.13':
                $descrCNAE = 'Producao musical';
                $codServico = '12.13';
                $descrServico = 'Producao, mediante ou sem encomenda previa, de eventos, espetaculos, entrevistas, shows, ballet, dancas, desfiles, bailes, teatros, operas, concertos, recitais, festivais e congeneres';

            case '09603399':
            case '25.01':
                $descrCNAE = 'Atividades funerarias e servicos relacionados nao especificados anteriormente';
                $codServico = '25.01';
                $descrServico = 'Funerais, inclusive fornecimento de caixao, urna ou esquifes;aluguel de capela;transporte do corpo cadaverico;fornecimento de flores, coroas e outros paramentos;desembaraco de certidao de obito;fornecimento de veu, essa e outros adornos;embalsamento';

            case '09609201':
            case '06.03':
                $descrCNAE = 'Clinicas de estetica e similares';
                $codServico = '06.03';
                $descrServico = 'Banhos, duchas, sauna, massagens e congeneres.';

            case '01413401':
            case '14.09':
                $descrCNAE = 'Confeccao de roupas profissionais, exceto sob medida';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '04330402':
            case '14.13':
                $descrCNAE = 'Instalacao de portas, janelas, tetos, divisorias e armarios embutidos de qualquer material';
                $codServico = '14.13';
                $descrServico = 'Carpintaria e serralheria.';

            case '04615000':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de eletrodomesticos, moveis e artigos de uso domestico';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05091201':
            case '16.02':
                $descrCNAE = 'Transporte por navegacao de travessia, municipal';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05212500':
            case '11.04':
                $descrCNAE = 'Carga e descarga';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '06204000':
            case '01.06':
                $descrCNAE = 'Consultoria em tecnologia da informacao';
                $codServico = '01.06';
                $descrServico = 'Assessoria e consultaria em informatica.';

            case '06424701':
            case '15.04':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.04';
                $descrServico = 'Fornecimento ou emissao de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congeneres.';

            case '06424703':
            case '15.13':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '06630400':
            case '17.12':
                $descrCNAE = 'Atividades de administracao de fundos por contrato ou comissao';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '07119799':
            case '31.01':
                $descrCNAE = 'Atividades tecnicas relacionadas a engenharia e arquitetura nao especificadas anteriormente';
                $codServico = '31.01';
                $descrServico = 'Servicos tecnicos em edificacoes, eletronica, eletrotecnica, mecanica, telecomunicacoes e congeneres.';

            case '07319099':
            case '17.06':
                $descrCNAE = 'Outras atividades de publicidade nao especificadas anteriormente';
                $codServico = '17.06';
                $descrServico = 'Propaganda e publicidade, inclusive promocao de vendas, planejamento de campanhas ou sistemas de publicidade, elaboracao de desenhos, textos e demais materiais publicitarios.';

            case '07490105':
            case '10.03':
                $descrCNAE = 'Agenciamento de profissionais para atividades esportivas, culturais e artisticas';
                $codServico = '10.03';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de direitos de propriedade industrial, artistica ou literaria.';

            case '07719501':
            case '00.00':
                $descrCNAE = 'Locacao de embarcacoes sem tripulacao, exceto para fins recreativos';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '07732202':
            case '03.05':
                $descrCNAE = 'Aluguel de andaimes';
                $codServico = '03.05';
                $descrServico = 'Cessao de andaimes, palcos, coberturas e outras estruturas de uso temporario.';

            case '08121400':
            case '07.10':
                $descrCNAE = 'Limpeza em predios e em domicilios';
                $codServico = '07.10';
                $descrServico = 'Limpeza, manutencao e conservacao de vias e logradouros publicos, imoveis, chamines, piscinas, parques, jardins e congeneres.';

            case '08592999':
            case '08.02':
                $descrCNAE = 'Ensino de arte e cultura nao especificado anteriormente';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08610101':
            case '04.03':
                $descrCNAE = 'Atividades de atendimento hospitalar, exceto pronto-socorro e unidades para atendimento a urgencias';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08640212':
            case '04.09':
                $descrCNAE = 'Servicos de hemoterapia';
                $codServico = '04.09';
                $descrServico = 'Terapias de qualquer especie destinadas ao tratamento fisico, organico e mental.';

            case '08690999':
            case '04.19':
                $descrCNAE = 'Outras atividades de atencao a saude humana nao especificadas anteriormente';
                $codServico = '04.19';
                $descrServico = 'Bancos de sangue, leite, pele, olhos, ovulos, semen e congeneres.';

            case '09001903':
            case '12.13':
                $descrCNAE = 'Producao de espetaculos de danca';
                $codServico = '12.13';
                $descrServico = 'Producao, mediante ou sem encomenda previa, de eventos, espetaculos, entrevistas, shows, ballet, dancas, desfiles, bailes, teatros, operas, concertos, recitais, festivais e congeneres';

            case '09603302':
            case '25.02':
                $descrCNAE = 'Servicos de cremacao';
                $codServico = '25.02';
                $descrServico = 'Translado intramunicipal e cremacao de corpos e partes de corpos cadavericos.';

            case '09609204':
            case '13.03':
                $descrCNAE = 'Exploracao de maquinas de servicos pessoais acionados po moeda';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '09609205':
            case '06.03':
                $descrCNAE = 'Atividades de sauna e banhos';
                $codServico = '06.03';
                $descrServico = 'Banhos, duchas, sauna, massagens e congeneres.';

            case '01413402':
            case '14.09':
                $descrCNAE = 'Confeccao, sob medida, de roupas profissionais';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '04616800':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de texteis, vestuario, calcados e artigos de viagem';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05099801':
            case '16.02':
                $descrCNAE = 'Transporte aquaviario para passeios turisticos';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05229002':
            case '14.14':
                $descrCNAE = 'Servicos de reboque de veiculos';
                $codServico = '14.14';
                $descrServico = 'Guincho intramunicipal, guindaste e icamento.';

            case '05231102':
            case '11.04':
                $descrCNAE = 'Operacoes de terminais';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '05310502':
            case '17.08':
                $descrCNAE = 'Atividades de franqueadas do Correio Nacional';
                $codServico = '17.08';
                $descrServico = 'Franquia (franchising).';

            case '06209100':
            case '01.07':
                $descrCNAE = 'Suporte tecnico, manutencao e outros servicos em tecnologia da informacao';
                $codServico = '01.07';
                $descrServico = 'Suporte tecnico em informatica, inclusive instalacao, configuracao e manutencao de programas de computacao e bancos de dados.';

            case '06424703':
            case '15.04':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.04';
                $descrServico = 'Fornecimento ou emissao de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congeneres.';

            case '06424704':
            case '15.13':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '06511102':
            case '25.03':
                $descrCNAE = 'Planos de auxilio-funeral';
                $codServico = '25.03';
                $descrServico = 'Planos ou convenio funerarios.';

            case '06822600':
            case '17.12':
                $descrCNAE = 'Gestao e administracao da propriedade imobiliaria';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '07119703':
            case '32.01':
                $descrCNAE = 'Servicos de desenho tecnico relacionados a arquitetura e engenharia';
                $codServico = '32.01';
                $descrServico = 'Servicos de desenhos tecnicos.';

            case '07420005':
            case '13.04':
                $descrCNAE = 'Servicos de microfilmagem';
                $codServico = '13.04';
                $descrServico = 'Reprografia, microfilmagem e digitalizacao.';

            case '07490104':
            case '10.04':
                $descrCNAE = 'Atividades de intermediacao e agenciamento de servicos e negocios em geral, exceto imobiliarios';
                $codServico = '10.04';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de contratos de arrendamento mercantil (leasing), de franquia (franchising) e de faturizacao (factoring).';

            case '07719502':
            case '00.00':
                $descrCNAE = 'Locacao de aeronaves sem tripulacao';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08129000':
            case '07.10':
                $descrCNAE = 'Atividades de limpeza nao especificadas anteriormente';
                $codServico = '07.10';
                $descrServico = 'Limpeza, manutencao e conservacao de vias e logradouros publicos, imoveis, chamines, piscinas, parques, jardins e congeneres.';

            case '08591100':
            case '06.04':
                $descrCNAE = 'Ensino de esportes';
                $codServico = '06.04';
                $descrServico = 'Ginastica, danca, esportes, natacao, artes marciais e demais atividades fisicas.';

            case '08593700':
            case '08.02':
                $descrCNAE = 'Ensino de idiomas';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08610102':
            case '04.03':
                $descrCNAE = 'Atividades de atendimento em pronto-socorro e unidades hospitalares para atendimento a urgencias';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08640202':
            case '04.20':
                $descrCNAE = 'Laboratorios clinicos';
                $codServico = '04.20';
                $descrServico = 'Coleta de sangue, leite, tecidos, semen, orgaos e materiais biologicos de qualquer especie.';

            case '08640299':
            case '04.09':
                $descrCNAE = 'Atividades de servicos de complementacao diagnostica e terapeutica nao especificadas anteriormente';
                $codServico = '04.09';
                $descrServico = 'Terapias de qualquer especie destinadas ao tratamento fisico, organico e mental.';

            case '09001904':
            case '12.13':
                $descrCNAE = 'Producao de espetaculos circenses, de marionetes e similares';
                $codServico = '12.13';
                $descrServico = 'Producao, mediante ou sem encomenda previa, de eventos, espetaculos, entrevistas, shows, ballet, dancas, desfiles, bailes, teatros, operas, concertos, recitais, festivais e congeneres';

            case '01413403':
            case '14.09':
                $descrCNAE = 'Faccao de roupas profissionais';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '04512902':
            case '10.05':
                $descrCNAE = 'Comercio sob consignacao de veiculos automotores';
                $codServico = '10.05';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de bens moveis ou imoveis, nao abrangidos em outros itens ou subitens, inclusive aqueles realizados no ambito de Bolsas de Mercadorias e Futuros, por quaisquer meios.';

            case '04617600':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de produtos alimenticios, bebidas e fumo';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05112999':
            case '16.02':
                $descrCNAE = 'Outros servicos de transporte aereo de passageiros nao-regular';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05250804':
            case '11.04':
                $descrCNAE = 'Organizacao logistica do transporte de carga';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '05911199':
            case '12.13':
                $descrCNAE = 'Atividades de producao cinematografica, de videos e de programas de televisao nao especificadas anteriormente';
                $codServico = '12.13';
                $descrServico = 'Producao, mediante ou sem encomenda previa, de eventos, espetaculos, entrevistas, shows, ballet, dancas, desfiles, bailes, teatros, operas, concertos, recitais, festivais e congeneres';

            case '06201501':
            case '01.08':
                $descrCNAE = 'Desenvolvimento de programas de computador sob encomenda';
                $codServico = '01.08';
                $descrServico = 'Planejamento, confeccao, manutencao e atualizacao de paginas eletronicas.';

            case '06421200':
            case '15.01':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06424704':
            case '15.04':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.04';
                $descrServico = 'Fornecimento ou emissao de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congeneres.';

            case '06438701':
            case '15.13':
                $descrCNAE = 'Bancos de cambio';
                $codServico = '15.13';
                $descrServico = 'Servicos relacionados a operacoes de cambio em geral, edicao, alteracao, prorrogacao, cancelamento e baixa de contrato de cambio;emissao de registro de exportacao ou de credito;cobranca ou deposito no exterior;emissao, fornecimento e cancelamento de ch';

            case '07410203':
            case '32.01':
                $descrCNAE = 'Design de produto';
                $codServico = '32.01';
                $descrServico = 'Servicos de desenhos tecnicos.';

            case '07719599':
            case '00.00':
                $descrCNAE = 'Locacao de outros meios de transporte nao especificados anteriormente, sem condutor';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '07740300':
            case '17.12':
                $descrCNAE = 'Gestao de ativos intangiveis nao-financeiros';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros.';

            case '08219901':
            case '13.04':
                $descrCNAE = 'Fotocopias';
                $codServico = '13.04';
                $descrServico = 'Reprografia, microfilmagem e digitalizacao.';

            case '08592901':
            case '06.04':
                $descrCNAE = 'Ensino de danca';
                $codServico = '06.04';
                $descrServico = 'Ginastica, danca, esportes, natacao, artes marciais e demais atividades fisicas.';

            case '08599601':
            case '08.02':
                $descrCNAE = 'Formacao de condutores';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08621601':
            case '04.21':
                $descrCNAE = 'UTI movel';
                $codServico = '04.21';
                $descrServico = 'Unidade de atendimento, assistencia ou tratamento movel e congeneres.';

            case '08630501':
            case '04.03':
                $descrCNAE = 'Atividade medica ambulatorial com recursos para realizacao de procedimentos cirurgicos';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08650007':
            case '04.09':
                $descrCNAE = 'Atividades de terapia de nutricao enteral e parenteral';
                $codServico = '04.09';
                $descrServico = 'Terapias de qualquer especie destinadas ao tratamento fisico, organico e mental.';

            case '09603301':
            case '25.04':
                $descrCNAE = 'Gestao e manutencao de cemiterios';
                $codServico = '25.04';
                $descrServico = 'Manutencao e conservacao de jazigos e cemiterios.';

            case '09700500':
            case '07.10':
                $descrCNAE = 'Servicos domesticos';
                $codServico = '07.10';
                $descrServico = 'Limpeza, manutencao e conservacao de vias e logradouros publicos, imoveis, chamines, piscinas, parques, jardins e congeneres.';

            case '01531902':
            case '14.09':
                $descrCNAE = 'Acabamento de calcados de couro sob contrato';
                $codServico = '14.09';
                $descrServico = 'Alfaiataria e costura, quando o material for fornecido pelo usuario final, exceto aviamento.';

            case '01741901':
            case '13.05':
                $descrCNAE = 'Fabricacao de formularios continuos';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '04618401':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de medicamentos, cosmeticos e produtos de perfumaria';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '05229002':
            case '16.02':
                $descrCNAE = 'Servicos de reboque de veiculos';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05250803':
            case '10.05':
                $descrCNAE = 'Agenciamento de cargas, exceto para o transporte maritimo';
                $codServico = '10.05';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de bens moveis ou imoveis, nao abrangidos em outros itens ou subitens, inclusive aqueles realizados no ambito de Bolsas de Mercadorias e Futuros, por quaisquer meios.';

            case '06021700':
            case '12.13':
                $descrCNAE = 'Atividades de televisao aberta';
                $codServico = '12.13';
                $descrServico = 'Producao, mediante ou sem encomenda previa, de eventos, espetaculos, entrevistas, shows, ballet, dancas, desfiles, bailes, teatros, operas, concertos, recitais, festivais e congeneres';

            case '06201502':
            case '01.08':
                $descrCNAE = 'Web design';
                $codServico = '01.08';
                $descrServico = 'Planejamento, confeccao, manutencao e atualizacao de paginas eletronicas';

            case '06421200':
            case '15.05':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.05';
                $descrServico = 'Cadastro, elaboracao de ficha cadastral, renovacao cadastral e congeneres, inclusao ou exclusao no Cadastro de Emitentes de Cheques sem Fundos ¿ CCF ou em quaisquer outros bancos cadastrais.';

            case '06422100':
            case '15.01':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '07410202':
            case '07.11':
                $descrCNAE = 'Decoracao de interiores';
                $codServico = '07.11';
                $descrServico = 'Decoracao e jardinagem, inclusive corte e poda de arvores.';

            case '07410299':
            case '32.01':
                $descrCNAE = 'Atividades de design nao especificadas anteriormente';
                $codServico = '32.01';
                $descrServico = 'Servicos de desenhos tecnicos.';

            case '07721700':
            case '00.00':
                $descrCNAE = 'Aluguel de equipamentos recreativos e esportivos';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08423000':
            case '17.12':
                $descrCNAE = 'Justica';
                $codServico = '17.12';
                $descrServico = 'Administracao em geral, inclusive de bens e negocios de terceiros';

            case '08599602':
            case '08.02':
                $descrCNAE = 'Cursos de pilotagem';
                $codServico = '08.02';
                $descrServico = 'Instrucao, treinamento, orientacao pedagogica e educacional, avaliacao de conhecimentos de qualquer natureza.';

            case '08621602':
            case '04.21':
                $descrCNAE = 'Servicos moveis de atendimento a urgencias, exceto por UTI movel';
                $codServico = '04.21';
                $descrServico = 'Unidade de atendimento, assistencia ou tratamento movel e congeneres.';

            case '08690901':
            case '04.09':
                $descrCNAE = 'Atividades de praticas integrativas e complementares em saude humana';
                $codServico = '04.09';
                $descrServico = 'Terapias de qualquer especie destinadas ao tratamento fisico, organico e mental.';

            case '09001901':
            case '12.01':
                $descrCNAE = 'Producao teatral';
                $codServico = '12.01';
                $descrServico = 'Espetaculos teatrais.';

            case '09313100':
            case '06.04':
                $descrCNAE = 'Atividades de condicionamento fisico';
                $codServico = '06.04';
                $descrServico = 'Ginastica, danca, esportes, natacao, artes marciais e demais atividades fisicas.';

            case '00161003':
            case '07.16':
                $descrCNAE = 'Servico de preparacao de terreno, cultivo e colheita';
                $codServico = '07.16';
                $descrServico = 'Florestamento, reflorestamento, semeadura, adubacao, reparacao de solo, plantio, silagem, colheita, corte e descascamento de arvores, silvicultura, exploracao florestal e dos servicos congeneres indissociaveis da formacao, manutencao e colheita de florestas, para quaisquer fins e por quaisquer meios.';

            case '00162802':
            case '05.08':
                $descrCNAE = 'Servico de tosquiamento de ovinos';
                $codServico = '05.08';
                $descrServico = 'Guarda, tratamento, amestramento, embelezamento, alojamento e congeneres.';

            case '00322107':
            case '17.01':
                $descrCNAE = 'Atividades de apoio a aquicultura em agua doce';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '01340502':
            case '14.10':
                $descrCNAE = 'Alvejamento, tingimento e torcao em fios, tecidos, artefatos texteis e pecas do vestuario';
                $codServico = '14.10';
                $descrServico = 'Tinturaria e lavanderia.';

            case '01811302':
            case '13.05':
                $descrCNAE = 'Impressao de livros, revistas e outras publicacoes periodicas';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '02391503':
            case '14.05':
                $descrCNAE = 'Aparelhmanto de placas e execucao de trabalhos em marmore, granito, ardosia e outras pedras';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '02930103':
            case '14.01':
                $descrCNAE = 'Fabricacao de cabines, carrocerias e reboques para outros veiculos automotores, exceto caminhoes e onibus';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03240002':
            case '00.00':
                $descrCNAE = 'Fabricacao de mesas de bilhar, de sinuca e acessorios nao associada a locacao';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '03314703':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de valvulas industriais';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314714':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e equipamentos para a prospeccao e extracao de petroleo';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03316301':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de aeronaves, exceto a manutencao na pista';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04120400':
            case '07.02':
                $descrCNAE = 'Construcao de edificios';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04292801':
            case '07.02':
                $descrCNAE = 'Montagem de estruturas metalicas';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04322301':
            case '07.05':
                $descrCNAE = 'Instalacoes hidraulicas, sanitarias e de gas';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04322303':
            case '07.02':
                $descrCNAE = 'Instalacoes de sistema de prevencao contra incendio';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04330405':
            case '07.07':
                $descrCNAE = 'Aplicacao de revestimentos e de resinas em interiores e exteriores';
                $codServico = '07.07';
                $descrServico = 'Recuperacao, raspagem, polimento e lustracao de pisos e congeneres.';

            case '04399105':
            case '07.02':
                $descrCNAE = 'Perfuracao e construcao de pocos de agua';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04520003':
            case '14.01':
                $descrCNAE = 'Servicos de manutencao e reparacao eletrica de veiculos automotores';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04912402':
            case '16.01':
                $descrCNAE = 'Transporte ferroviario de passageiros municipal e em regiao metropolitana';
                $codServico = '16.01';
                $descrServico = 'Servicos de transporte coletivo municipal rodoviario, metroviario, ferroviario e aquaviario de passageiros.';

            case '05211799':
            case '20.01':
                $descrCNAE = 'Depositos de mercadorias para terceiros, exceto armazens gerais e guardamoveis';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05310501':
            case '26.01':
                $descrCNAE = 'Atividades do Correio Nacional';
                $codServico = '26.01';
                $descrServico = 'Servicos de coleta, remessa ou entrega de correspondencias, documentos, objetos, bens ou valores, inclusive pelos correios e suas agencias franqueadas;courrier e congeneres.';

            case '05510802':
            case '09.01':
                $descrCNAE = 'Apart-hoteis';
                $codServico = '09.01';
                $descrServico = 'Hospedagem de qualquer natureza em hoteis, apart-service condominiais, flat, apart-hoteis, hoteis residencia, residence-service, suite service, hotelaria maritima, moteis, pensoes e congeneres;ocupacao por temporada com fornecimento de servico (o valor d';

            case '05914600':
            case '12.16':
                $descrCNAE = 'Atividades de exibicao cinematografica';
                $codServico = '12.16';
                $descrServico = 'Exibicao de filmes, entrevistas, musicais, espetaculos, shows, concertos, desfiles, operas, competicoes esportivas, de destreza intelectual ou congeneres.';

            case '06319400':
            case '01.09':
                $descrCNAE = 'Portais, provedores de conteudo e outros servicos de informacao na internet';
                $codServico = '01.09';
                $descrServico = 'Disponibilizacao, sem cessao definitiva, de conteudos de audio, video, imagem e texto por meio da internet, respeitada a imunidade de livros, jornais e periodicos (exceto a distribuicao de conteudos pelas prestadoras de Servico de Acesso Condicionado, de que trata a Lei no 12.485, de 12 de setembro de 2011, sujeita ao ICMS).';

            case '06421200':
            case '15.14':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.14';
                $descrServico = 'Fornecimento, emissao, reemissao, renovacao e manutencao de cartao magnetico, cartao de credito, cartao de debito, cartao salario e congeneres.';

            case '06421200':
            case '15.16':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06422100':
            case '15.07':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06422100':
            case '15.08':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06422100':
            case '15.10':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06423900':
            case '15.05':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.05';
                $descrServico = 'Cadastro, elaboracao de ficha cadastral, renovacao cadastral e congeneres, inclusao ou exclusao no Cadastro de Emitentes de Cheques sem Fundos ¿ CCF ou em quaisquer outros bancos cadastrais.';

            case '06424703':
            case '15.02':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06424704':
            case '15.11':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.11';
                $descrServico = 'Devolucao de titulos, protesto de titulos, sustacao de protesto, manutencao de titulos, reapresentacao de titulos, e demais servicos a eles relacionados.';

            case '06424704':
            case '15.17':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.17';
                $descrServico = 'emissao, fornecimento, devolucao, sustacao, cancelamento e oposicao de cheques quaisquer, avulso ou por talao.';

            case '06432800':
            case '15.01':
                $descrCNAE = 'Bancos de investimento';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06437900':
            case '15.08':
                $descrCNAE = 'Sociedades de credito ao microempreendedor';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06619303':
            case '10.09':
                $descrCNAE = 'Representacoes de bancos estrangeiros';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '06621501':
            case '17.09':
                $descrCNAE = 'Peritos e avaliadores de seguros';
                $codServico = '17.09';
                $descrServico = 'Pericias, laudos, exames tecnicos e analises tecnicas.';

            case '06622300':
            case '10.01':
                $descrCNAE = 'Corretores e agentes de seguros, de planos de previdencia complementar e de saude';
                $codServico = '10.01';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de cambio, de seguros, de cartoes de credito, de planos de saude e de planos de previdencia privada.';

            case '06821802':
            case '10.05':
                $descrCNAE = 'Corretagem no aluguel de imoveis';
                $codServico = '10.05';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de bens moveis ou imoveis, nao abrangidos em outros itens ou subitens, inclusive aqueles realizados no ambito de Bolsas de Mercadorias e Futuros, por quaisquer meios.';

            case '06912500':
            case '21.01':
                $descrCNAE = 'Cartorios';
                $codServico = '21.01';
                $descrServico = 'Servicos de registros publicos, cartorarios e notariais.';

            case '07490102':
            case '07.21':
                $descrCNAE = 'Escafandria e mergulho';
                $codServico = '07.21';
                $descrServico = 'Pesquisa, perfuracao, cimentacao, mergulho, perfilagem, concretacao, testemunhagem, pescaria, estimulacao e outros servicos relacionados com a exploracao e explotacao de petroleo, gas natural e de outros recursos minerais';

            case '07732201':
            case '00.00':
                $descrCNAE = 'Aluguel de maquinas e equipamentos para construcao sem operador, exceto andaimes';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08211300':
            case '17.02':
                $descrCNAE = 'Servicos combinados de escritorio e apoio administrativo';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '08220200':
            case '17.02':
                $descrCNAE = 'Atividades de teleatendimento';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '08599699':
            case '17.24':
                $descrCNAE = 'Outras atividades de ensino nao especificadas anteriormente';
                $codServico = '17.24';
                $descrServico = 'Apresentacao de palestras, conferencias, seminarios e congeneres.';

            case '08630502':
            case '04.01':
                $descrCNAE = 'Atividade medica ambulatorial com recursos para realizacao de exames complementares';
                $codServico = '04.01';
                $descrServico = 'Medicina e biomedicina.';

            case '08630506':
            case '04.03':
                $descrCNAE = 'Servicos de vacinacao e imunizacao humana';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08711502':
            case '04.17':
                $descrCNAE = 'Instituicoes de longa permanencia para idosos';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09001902':
            case '12.07':
                $descrCNAE = 'Producao musical';
                $codServico = '12.07';
                $descrServico = 'Shows, ballet, dancas, desfiles, bailes, operas, concertos, recitais, festivais e congeneres.';

            case '09102301':
            case '38.01':
                $descrCNAE = 'Atividades de museus e de exploracao de lugares e predios historicos e atracoes similares';
                $codServico = '38.01';
                $descrServico = 'Servicos de museologia.';

            case '09529103':
            case '14.01':
                $descrCNAE = 'Reparacao de relogios';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '09609299':
            case '14.05':
                $descrCNAE = 'Outras atividades de servicos pessoais nao especificadas anteriormente';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '00162803':
            case '05.08':
                $descrCNAE = 'Servico de manejo de animais';
                $codServico = '05.08';
                $descrServico = 'Guarda, tratamento, amestramento, embelezamento, alojamento e congeneres.';

            case '00220906':
            case '07.16':
                $descrCNAE = 'Conservacao de florestas nativas';
                $codServico = '07.16';
                $descrServico = 'Florestamento, reflorestamento, semeadura, adubacao, reparacao de solo, plantio, silagem, colheita, corte e descascamento de arvores, silvicultura, exploracao florestal e dos servicos congeneres indissociaveis da formacao, manutencao e colheita de florestas, para quaisquer fins e por quaisquer meios.';

            case '01340599':
            case '14.10':
                $descrCNAE = 'Outros servicos de acabamento em fios, tecidos, artefatos texteis e pecas do vestuario';
                $codServico = '14.10';
                $descrServico = 'Tinturaria e lavanderia.';

            case '01812100':
            case '13.05':
                $descrCNAE = 'Impressao de material de seguranca';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '02539001':
            case '14.05':
                $descrCNAE = 'Servicos de usinagem, tornearia e solda';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '03211601':
            case '39.01':
                $descrCNAE = 'Lapidacao de gemas';
                $codServico = '39.01';
                $descrServico = 'Servicos de ourivesaria e lapidacao (quando o material for fornecido pelo tomador do servico).';

            case '03240003':
            case '00.00':
                $descrCNAE = 'Fabricacao de mesas de bilhar, de sinuca e acessorios associada a locacao';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '03311200':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de tanques, reservatorios metalicos e caldeiras, exceto para veiculos';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314704':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de compressores';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314715':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e equipamentos para uso na extracao mineral, exceto na extracao de petroleo';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03316302':
            case '14.01':
                $descrCNAE = 'Manutencao de aeronaves na pista';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03321000':
            case '14.06':
                $descrCNAE = 'Instalacao de maquinas e equipamentos industriais';
                $codServico = '14.06';
                $descrServico = 'Instalacao e montagem de aparelhos, maquinas e equipamentos, inclusive montagem industrial, prestados ao usuario final, exclusivamente com material por ele fornecido.';

            case '04211101':
            case '07.02':
                $descrCNAE = 'Construcao de rodovias e ferrovias';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04292802':
            case '07.02':
                $descrCNAE = 'Obras de montagem industrial';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04329103':
            case '07.02':
                $descrCNAE = 'Instalacao, manutencao e reparacao de elevadores, escadas e esteiras rolantes, exceto de fabricacao propria';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04329105':
            case '07.08':
                $descrCNAE = 'Tratamentos termicos, acusticos ou de vibracao';
                $codServico = '07.08';
                $descrServico = 'Calafetacao.';

            case '04330403':
            case '07.05':
                $descrCNAE = 'Obras de acabamento em gesso e estuque';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04399199':
            case '07.02':
                $descrCNAE = 'Servicos especializados para construcao nao especificados anteriormente';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04520004':
            case '14.01':
                $descrCNAE = 'Servicos de alinhamento e balanceamento de veiculos automotores';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04912403':
            case '16.01':
                $descrCNAE = 'Transporte metroviario';
                $codServico = '16.01';
                $descrServico = 'Servicos de transporte coletivo municipal rodoviario, metroviario, ferroviario e aquaviario de passageiros.';

            case '05212500':
            case '20.01':
                $descrCNAE = 'Carga e descarga';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05221400':
            case '22.01':
                $descrCNAE = 'Concessionarias de rodovias, pontes, tuneis e servicos relacionados';
                $codServico = '22.01';
                $descrServico = 'Servicos de exploracao de rodovia mediante cobranca de preco ou pedagio dos usuarios, envolvendo execucao de servicos de conservacao, manutencao, melhoramentos para adequacao de capacidade e seguranca de transito, operacao, monitoracao, assistencia aos us';

            case '05229001':
            case '17.02':
                $descrCNAE = 'Servicos de apoio ao transporte por taxi, inclusive centrais de chamada';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '05310502':
            case '26.01':
                $descrCNAE = 'Atividades de franqueadas do Correio Nacional';
                $codServico = '26.01';
                $descrServico = 'Servicos de coleta, remessa ou entrega de correspondencias, documentos, objetos, bens ou valores, inclusive pelos correios e suas agencias franqueadas;courrier e congeneres.';

            case '05510803':
            case '09.01':
                $descrCNAE = 'Moteis';
                $codServico = '09.01';
                $descrServico = 'Hospedagem de qualquer natureza em hoteis, apart-service condominiais, flat, apart-hoteis, hoteis residencia, residence-service, suite service, hotelaria maritima, moteis, pensoes e congeneres;ocupacao por temporada com fornecimento de servico (o valor d';

            case '05913800':
            case '10.10':
                $descrCNAE = 'Distribuicao cinematografica, de video e de programas de televisao';
                $codServico = '10.10';
                $descrServico = 'Distribuicao de bens de terceiros.';

            case '06399200':
            case '17.01':
                $descrCNAE = 'Outras atividades de prestacao de servicos de informacao nao especificadas anteriormente';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '06421200':
            case '15.12':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06421200':
            case '15.18':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06422100':
            case '15.14':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.14';
                $descrServico = 'Fornecimento, emissao, reemissao, renovacao e manutencao de cartao magnetico, cartao de credito, cartao de debito, cartao salario e congeneres.';

            case '06422100':
            case '15.16':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06423900':
            case '15.07':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06423900':
            case '15.08':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06423900':
            case '15.10':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06424701':
            case '15.05':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.05';
                $descrServico = 'Cadastro, elaboracao de ficha cadastral, renovacao cadastral e congeneres, inclusao ou exclusao no Cadastro de Emitentes de Cheques sem Fundos ¿ CCF ou em quaisquer outros bancos cadastrais.';

            case '06424704':
            case '15.02':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06433600':
            case '15.01':
                $descrCNAE = 'Bancos de desenvolvimento';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06499905':
            case '15.08':
                $descrCNAE = 'Concessao de credito pelas oscip';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06612601':
            case '10.02':
                $descrCNAE = 'Corretoras de titulos e valores mobiliarios';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '06911702':
            case '17.09':
                $descrCNAE = 'Atividades auxiliares da justica';
                $codServico = '17.09';
                $descrServico = 'Pericias, laudos, exames tecnicos e analises tecnicas.';

            case '07210000':
            case '02.01':
                $descrCNAE = 'Pesquisa e desenvolvimento experimental em ciencias fisicas e naturais';
                $codServico = '02.01';
                $descrServico = 'Servicos de pesquisas e desenvolvimento de qualquer natureza.';

            case '07490199':
            case '07.22':
                $descrCNAE = 'Outras atividades profissionais, cientificas e tecnicas nao especificadas anteriormente';
                $codServico = '07.22';
                $descrServico = 'Nucleacao e bombardeamento de nuvens e congeneres';

            case '07733100':
            case '00.00':
                $descrCNAE = 'Aluguel de maquinas e equipamentos para escritorios';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08219999':
            case '17.02':
                $descrCNAE = 'Preparacao de documentos e servicos especializados de apoio administrativo nao especificados anteriormente';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '08299702':
            case '10.05':
                $descrCNAE = 'Emissao de vales-alimentacao, vales-transporte e similares';
                $codServico = '10.05';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de bens moveis ou imoveis, nao abrangidos em outros itens ou subitens, inclusive aqueles realizados no ambito de Bolsas de Mercadorias e Futuros, por quaisquer meios.';

            case '08630503':
            case '04.01':
                $descrCNAE = 'Atividade medica ambulatorial restrita a consultas';
                $codServico = '04.01';
                $descrServico = 'Medicina e biomedicina.';

            case '08640201':
            case '04.03':
                $descrCNAE = 'Laboratorios de anatomia patologica e citologica';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08711503':
            case '04.17':
                $descrCNAE = 'Atividades de assistencia a deficientes fisicos, imunodeprimidos e convalescentes';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09001902':
            case '12.16':
                $descrCNAE = 'Producao musical';
                $codServico = '12.16';
                $descrServico = 'Exibicao de filmes, entrevistas, musicais, espetaculos, shows, concertos, desfiles, operas, competicoes esportivas, de destreza intelectual ou congeneres.';

            case '09001903':
            case '12.07':
                $descrCNAE = 'Producao de espetaculos de danca';
                $codServico = '12.07';
                $descrServico = 'Shows, ballet, dancas, desfiles, bailes, operas, concertos, recitais, festivais e congeneres.';

            case '09529104':
            case '14.01':
                $descrCNAE = 'Reparacao de bicicletas, triciclos e outros veiculos nao-motorizados';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '07312200':
            case '17.25':
                $descrCNAE = 'Agenciamento de espacos para publicidade, exceto em veiculos de comunicacao';
                $codServico = '17.25';
                $descrServico = 'Insercao de textos, desenhos e outros materiais de propaganda e publicidade, em qualquer meio (exceto em livros, jornais, periodicos e nas modalidades de servicos de radiodifusao sonora e de sons e imagens de recepcao livre e gratuita).';

            case '00230600':
            case '07.16':
                $descrCNAE = 'Atividades de apoio a producao florestal';
                $codServico = '07.16';
                $descrServico = 'Florestamento, reflorestamento, semeadura, adubacao, reparacao de solo, plantio, silagem, colheita, corte e descascamento de arvores, silvicultura, exploracao florestal e dos servicos congeneres indissociaveis da formacao, manutencao e colheita de florestas, para quaisquer fins e por quaisquer meios.';

            case '01813001':
            case '13.05':
                $descrCNAE = 'Impressao de material para uso publicitario';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '02539002':
            case '14.05':
                $descrCNAE = 'Servicos de tratamento e revestimento em metais';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '03312102':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de aparelhos e instrumentos de medida, teste e controle';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314705':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de equipamentos de transmissao para fins industriais';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314716':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de tratores, exceto agricolas';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03317101':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de embarcacoes e estruturas flutuantes';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03329599':
            case '14.06':
                $descrCNAE = 'Instalacao de outros equipamentos nao especificados anteriormente';
                $codServico = '14.06';
                $descrServico = 'Instalacao e montagem de aparelhos, maquinas e equipamentos, inclusive montagem industrial, prestados ao usuario final, exclusivamente com material por ele fornecido.';

            case '04211102':
            case '07.02':
                $descrCNAE = 'Pintura para sinalizacao em pistas rodoviarias e aeroportos';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04299501':
            case '07.02':
                $descrCNAE = 'Construcao de instalacoes esportivas e recreativas';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04329199':
            case '07.02':
                $descrCNAE = 'Outras obras de instalacoes em construcoes nao especificadas anteriormente';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04330404':
            case '07.05':
                $descrCNAE = 'Servicos de pintura de edificios em geral';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04330405':
            case '07.08':
                $descrCNAE = 'Aplicacao de revestimentos e de resinas em interiores e exteriores';
                $codServico = '07.08';
                $descrServico = 'Calafetacao.';

            case '04520005':
            case '14.01':
                $descrCNAE = 'Servicos de lavagem, lubrificacao e polimento de veiculos automotores';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04921301':
            case '16.01':
                $descrCNAE = 'Transporte rodoviario coletivo de passageiros, com itinerario fixo, municipal';
                $codServico = '16.01';
                $descrServico = 'Servicos de transporte coletivo municipal rodoviario, metroviario, ferroviario e aquaviario de passageiros.';

            case '04921301':
            case '30.45':
                $descrCNAE = 'Transporte rodoviario coletivo de passageiros, com itinerario fixo, municipal';
                $codServico = '16.01';
                $descrServico = 'Servicos de transporte coletivo municipal rodoviario, metroviario, ferroviario e aquaviario de passageiros.';

            case '04929902':
            case '00.00':
                $descrCNAE = 'TRANSPORTE RODOVIaRIO COLETIVO DE PASSAGEIROS, SOB REGIME DE FRETAMENTO, INTERMUNICIPAL, INTERESTADUAL E INTERNACIONAL';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05223100':
            case '11.01':
                $descrCNAE = 'Estacionamento de veiculos';
                $codServico = '11.01';
                $descrServico = 'Guarda e estacionamento de veiculos terrestres automotores, de aeronaves e de embarcacoes.';

            case '05231101':
            case '20.01':
                $descrCNAE = 'Administracao da infra-estrutura portuaria';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05232000':
            case '10.06':
                $descrCNAE = 'Atividades de agenciamento maritimo';
                $codServico = '10.06';
                $descrServico = 'Agenciamento maritimo.';

            case '05320201':
            case '26.01':
                $descrCNAE = 'Servicos de malote nao realizados pelo Correio Nacional';
                $codServico = '26.01';
                $descrServico = 'Servicos de coleta, remessa ou entrega de correspondencias, documentos, objetos, bens ou valores, inclusive pelos correios e suas agencias franqueadas;courrier e congeneres.';

            case '05590601':
            case '09.01':
                $descrCNAE = 'Albergues, exceto assistenciais';
                $codServico = '09.01';
                $descrServico = 'Hospedagem de qualquer natureza em hoteis, apart-service condominiais, flat, apart-hoteis, hoteis residencia, residence-service, suite service, hotelaria maritima, moteis, pensoes e congeneres;ocupacao por temporada com fornecimento de servico (o valor d';

            case '05811500':
            case '17.02':
                $descrCNAE = 'Edicao de livros';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '06421200':
            case '15.09':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06422100':
            case '15.12':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06422100':
            case '15.18':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06423900':
            case '15.14':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.14';
                $descrServico = 'Fornecimento, emissao, reemissao, renovacao e manutencao de cartao magnetico, cartao de credito, cartao de debito, cartao salario e congeneres.';

            case '06423900':
            case '15.16':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06424701':
            case '15.07':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06424701':
            case '15.08':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06424701':
            case '15.10':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06424703':
            case '15.05':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.05';
                $descrServico = 'Cadastro, elaboracao de ficha cadastral, renovacao cadastral e congeneres, inclusao ou exclusao no Cadastro de Emitentes de Cheques sem Fundos ¿ CCF ou em quaisquer outros bancos cadastrais.';

            case '06433600':
            case '15.02':
                $descrCNAE = 'Bancos de desenvolvimento';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06434400':
            case '15.01':
                $descrCNAE = 'Agencias de fomento';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06612602':
            case '10.02':
                $descrCNAE = 'Distribuidoras de titulos e valores mobiliarios';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '06621501':
            case '18.01':
                $descrCNAE = 'Peritos e avaliadores de seguros';
                $codServico = '18.01';
                $descrServico = 'Servicos de regulacao de sinistros vinculados a contratos de seguros;inspecao e avaliacao de riscos para cobertura de contratos de seguros;prevencao e gerencia de riscos seguraveis e congeneres.';

            case '06920602':
            case '17.01':
                $descrCNAE = 'Atividades de consultoria e auditoria contabil e tributaria';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '06920602':
            case '17.09':
                $descrCNAE = 'Atividades de consultoria e auditoria contabil e tributaria';
                $codServico = '17.09';
                $descrServico = 'Pericias, laudos, exames tecnicos e analises tecnicas.';

            case '07112000':
            case '07.03':
                $descrCNAE = 'Servicos de engenharia';
                $codServico = '07.03';
                $descrServico = 'Elaboracao de planos diretores, estudos de viabilidade, estudos organizacionais e outros, relacionados com obras e servicos de engenharia;elaboracao de anteprojetos, projetos basicos e projetos executivos para trabalhos de engenharia';

            case '07220700':
            case '02.01':
                $descrCNAE = 'Pesquisa e desenvolvimento experimental em ciencias sociais e humanas';
                $codServico = '02.01';
                $descrServico = 'Servicos de pesquisas e desenvolvimento de qualquer natureza.';

            case '07410201':
            case '39.01':
                $descrCNAE = 'Design';
                $codServico = '39.01';
                $descrServico = 'Servicos de ourivesaria e lapidacao (quando o material for fornecido pelo tomador do servico).';

            case '07410203':
            case '23.01':
                $descrCNAE = 'Design de produto';
                $codServico = '23.01';
                $descrServico = 'Servicos de programacao e comunicacao visual, desenho industrial e congeneres.';

            case '07739001':
            case '00.00':
                $descrCNAE = 'Aluguel de maquinas e equipamentos para extracao de minerios e petroleo, sem operador';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08011102':
            case '05.08':
                $descrCNAE = 'Servicos de adestramento de caes de guarda';
                $codServico = '05.08';
                $descrServico = 'Guarda, tratamento, amestramento, embelezamento, alojamento e congeneres.';

            case '08230001':
            case '12.08':
                $descrCNAE = 'Servicos de organizacao de feiras, congressos, exposicoes e festas';
                $codServico = '12.08';
                $descrServico = 'Feiras, exposicoes, congressos e congeneres.';

            case '08299799':
            case '17.02':
                $descrCNAE = 'Outras atividades de servicos prestados principalmente as empresas nao especificadas anteriormente';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '08512100':
            case '08.01':
                $descrCNAE = 'Educacao infantil - pre-escola';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08630599':
            case '04.01':
                $descrCNAE = 'Atividades de atencao ambulatorial nao especificadas anteriormente';
                $codServico = '04.01';
                $descrServico = 'Medicina e biomedicina.';

            case '08640202':
            case '04.03':
                $descrCNAE = 'Laboratorios clinicos';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08711504':
            case '04.17':
                $descrCNAE = 'Centros de apoio a pacientes com cancer e com AIDS';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09329899':
            case '12.17':
                $descrCNAE = 'Outras atividades de recreacao e lazer nao especificadas anteriormente';
                $codServico = '12.17';
                $descrServico = 'Recreacao e animacao, inclusive em festas e eventos de qualquer natureza.';

            case '09529105':
            case '14.01':
                $descrCNAE = 'Reparacao de artigos do mobiliario';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '09601701':
            case '14.10':
                $descrCNAE = 'Lavanderias';
                $codServico = '14.10';
                $descrServico = 'Tinturaria e lavanderia.';

            case '01813099':
            case '13.05':
                $descrCNAE = 'Impressao de material para outros usos';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '01830001':
            case '13.02':
                $descrCNAE = 'Reproducao de som em qualquer suporte';
                $codServico = '13.02';
                $descrServico = 'Fonografia ou gravacao de sons, inclusive trucagem, dublagem, mixagem e congeneres.';

            case '02599302':
            case '14.05':
                $descrCNAE = 'Servicos de corte e dobra de metais';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '03312103':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de aparelhos eletromedicos e eletroterapeuticos e equipamentos de irradiacao';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314706':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas, aparelhos e equipamentos para instalacoes termicas';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314717':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e equipamentos de terraplenagem, pavimentacao e construcao, exceto tratores';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03317102':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de embarcacoes para esporte e lazer';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03811400':
            case '07.09':
                $descrCNAE = 'Coleta de residuos nao-perigosos';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04212000':
            case '07.02':
                $descrCNAE = 'Construcao de obras-de-arte especiais';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04299599':
            case '07.02':
                $descrCNAE = 'Outras obras de engenharia civil nao especificadas anteriormente';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04299599':
            case '07.17':
                $descrCNAE = 'Outras obras de engenharia civil nao especificadas anteriormente';
                $codServico = '07.17';
                $descrServico = 'Escoramento, contencao de encostas e servicos congeneres.';

            case '04311801':
            case '07.04':
                $descrCNAE = 'Demolicao de edificios e outras estruturas';
                $codServico = '07.04';
                $descrServico = 'Demolicao.';

            case '04322303':
            case '14.06':
                $descrCNAE = 'Instalacoes de sistema de prevencao contra incendio';
                $codServico = '14.06';
                $descrServico = 'Instalacao e montagem de aparelhos, maquinas e equipamentos, inclusive montagem industrial, prestados ao usuario final, exclusivamente com material por ele fornecido.';

            case '04330401':
            case '07.02':
                $descrCNAE = 'Impermeabilizacao em obras de engenharia civil';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04330405':
            case '07.05':
                $descrCNAE = 'Aplicacao de revestimentos e de resinas em interiores e exteriores';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04520007':
            case '14.01':
                $descrCNAE = 'Servicos de instalacao, manutencao e reparacao de acessorios para veiculos automotores';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04923001':
            case '16.02':
                $descrCNAE = 'Servico de taxi';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05011401':
            case '00.00':
                $descrCNAE = 'Transporte maritimo de cabotagem - carga';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05231102':
            case '20.01':
                $descrCNAE = 'Operacoes de terminais';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05240199':
            case '11.01':
                $descrCNAE = 'Atividades auxiliares dos transportes aereos, exceto operacao dos aeroportos e campos de aterrissagem';
                $codServico = '11.01';
                $descrServico = 'Guarda e estacionamento de veiculos terrestres automotores, de aeronaves e de embarcacoes.';

            case '05320202':
            case '26.01':
                $descrCNAE = 'Servicos de entrega rapida';
                $codServico = '26.01';
                $descrServico = 'Servicos de coleta, remessa ou entrega de correspondencias, documentos, objetos, bens ou valores, inclusive pelos correios e suas agencias franqueadas;courrier e congeneres.';

            case '05590602':
            case '09.01':
                $descrCNAE = 'Campings';
                $codServico = '09.01';
                $descrServico = 'Hospedagem de qualquer natureza em hoteis, apart-service condominiais, flat, apart-hoteis, hoteis residencia, residence-service, suite service, hotelaria maritima, moteis, pensoes e congeneres;ocupacao por temporada com fornecimento de servico (o valor d';

            case '05812300':
            case '17.02':
                $descrCNAE = 'Edicao de jornais';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '06391700':
            case '10.07':
                $descrCNAE = 'Agencias de noticias';
                $codServico = '10.07';
                $descrServico = 'Agenciamento de noticias.';

            case '06422100':
            case '15.09':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06423900':
            case '15.12':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06423900':
            case '15.18':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06424701':
            case '15.14':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.14';
                $descrServico = 'Fornecimento, emissao, reemissao, renovacao e manutencao de cartao magnetico, cartao de credito, cartao de debito, cartao salario e congeneres.';

            case '06424701':
            case '15.16':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06424703':
            case '15.07':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06424703':
            case '15.08':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06424703':
            case '15.10':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06424704':
            case '15.05':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.05';
                $descrServico = 'Cadastro, elaboracao de ficha cadastral, renovacao cadastral e congeneres, inclusao ou exclusao no Cadastro de Emitentes de Cheques sem Fundos ¿ CCF ou em quaisquer outros bancos cadastrais.';

            case '06435202':
            case '15.02':
                $descrCNAE = 'Associacoes de poupanca e emprestimo';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06435203':
            case '15.01':
                $descrCNAE = 'Companhias hipotecarias';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06612604':
            case '10.02':
                $descrCNAE = 'Corretoras de contratos de mercadorias';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '06629100':
            case '18.01':
                $descrCNAE = 'Atividades auxiliares dos seguros, da previdencia complementar e dos planos de saude nao especificadas anteriorme';
                $codServico = '18.01';
                $descrServico = 'Servicos de regulacao de sinistros vinculados a contratos de seguros;inspecao e avaliacao de riscos para cobertura de contratos de seguros;prevencao e gerencia de riscos seguraveis e congeneres.';

            case '07020400':
            case '17.01':
                $descrCNAE = 'Atividades de consultoria em gestao empresarial, exceto consultoria tecnica especifica';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '07020400':
            case '17.03':
                $descrCNAE = 'Atividades de consultoria em gestao empresarial, exceto consultoria tecnica especifica';
                $codServico = '17.03';
                $descrServico = 'Planejamento, coordenacao, programacao ou organizacao tecnica, financeira ou administrativa.';

            case '07112000':
            case '17.09':
                $descrCNAE = 'Servicos de engenharia';
                $codServico = '17.09';
                $descrServico = 'Pericias, laudos, exames tecnicos e analises tecnicas.';

            case '07410299':
            case '23.01':
                $descrCNAE = 'Atividades de design nao especificadas anteriormente';
                $codServico = '23.01';
                $descrServico = 'Servicos de programacao e comunicacao visual, desenho industrial e congeneres.';

            case '07739002':
            case '00.00':
                $descrCNAE = 'ALUGUEL DE EQUIPAMENTOS CIENTiFICOS, MeDICOS E HOSPITALARES, SEM OPERADOR';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '07740300':
            case '03.02':
                $descrCNAE = 'Gestao de ativos intangiveis nao-financeiros';
                $codServico = '03.02';
                $descrServico = 'Cessao de direito de uso de marcas e de sinais de propaganda.';

            case '08511200':
            case '08.01':
                $descrCNAE = 'Educacao infantil – creche';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08640201':
            case '04.02':
                $descrCNAE = 'Laboratorios de anatomia patologica e citologica';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08640203':
            case '04.03':
                $descrCNAE = 'Servicos de dialise e nefrologia';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08711505':
            case '04.17':
                $descrCNAE = 'Condominios residenciais para idosos';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09002701':
            case '40.01':
                $descrCNAE = 'Atividades de artistas plasticos, jornalistas independentes e escritores';
                $codServico = '40.01';
                $descrServico = 'Obras de arte sob encomenda.';

            case '09200399':
            case '12.09':
                $descrCNAE = 'Exploracao de jogos de azar e apostas nao especificados anteriormente';
                $codServico = '12.09';
                $descrServico = 'Bilhares, boliches e diversoes eletronicas ou nao.';

            case '09529106':
            case '14.01':
                $descrCNAE = 'Reparacao de joias';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '09601702':
            case '14.10':
                $descrCNAE = 'Tinturarias';
                $codServico = '14.10';
                $descrServico = 'Tinturaria e lavanderia.';

            case '09609207':
            case '05.08':
                $descrCNAE = 'Alojamento de animais domesticos';
                $codServico = '05.08';
                $descrServico = 'Guarda, tratamento, amestramento, embelezamento, alojamento e congeneres.';

            case '01821100':
            case '13.05':
                $descrCNAE = 'Servicos de pre-impressao';
                $codServico = '13.05';
                $descrServico = 'Composicao grafica, inclusive confeccao de impressos graficos, fotocomposicao, clicheria, zincografia, litografia e fotolitografia, exceto se destinados a posterior operacao de comercializacao ou industrializacao, ainda que incorporados, de qualquer forma, a outra mercadoria que deva ser objeto de posterior circulacao, tais como bulas, rotulos, etiquetas, caixas, cartuchos, embalagens e manuais tecnicos e de instrucao, quando ficarao sujeitos ao ICMS.';

            case '02722802':
            case '14.05':
                $descrCNAE = 'Recondicionamento de baterias e acumuladores para veiculos automotores';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '03312104':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de equipamentos e instrumentos opticos';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314707':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e aparelhos de refrigeracao e ventilacao para uso industrial e comercial';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314718':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas para a industria metalurgica, exceto maquinas-ferramenta';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03319800':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de equipamentos e produtos nao especificados anteriormente';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03812200':
            case '07.09':
                $descrCNAE = 'Coleta de residuos perigosos';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '03900500':
            case '07.18':
                $descrCNAE = 'Descontaminacao e outros servicos de gestao de residuos';
                $codServico = '07.18';
                $descrServico = 'Limpeza e dragagem de rios, portos, canais, baias, lagos, lagoas, represas, acudes e congeneres.';

            case '04120400':
            case '07.05':
                $descrCNAE = 'Construcao de edificios';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04213800':
            case '07.02':
                $descrCNAE = 'Obras de urbanizacao - ruas, pracas e calcadas';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04311802':
            case '07.02':
                $descrCNAE = 'Preparacao de canteiro e limpeza de terreno';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04329102':
            case '14.06':
                $descrCNAE = 'Instalacao de equipamentos para orientacao a navegacao maritima, fluvial e lacustre';
                $codServico = '14.06';
                $descrServico = 'Instalacao e montagem de aparelhos, maquinas e equipamentos, inclusive montagem industrial, prestados ao usuario final, exclusivamente com material por ele fornecido.';

            case '04330403':
            case '07.02':
                $descrCNAE = 'Obras de acabamento em gesso e estuque';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04330499':
            case '07.05':
                $descrCNAE = 'Outras obras de acabamento da construcao';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04543900':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de motocicletas e motonetas';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04923002':
            case '16.02':
                $descrCNAE = 'Servico de transporte de passageiros - locacao de automoveis com motorista';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05011402':
            case '00.00':
                $descrCNAE = 'TRANSPORTE MARiTIMO DE CABOTAGEM - PASSAGEIROS';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05239700':
            case '20.01':
                $descrCNAE = 'Atividades auxiliares dos transportes aquaviarios nao especificadas anteriormente';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05590603':
            case '09.01':
                $descrCNAE = 'Pensoes (alojamento)';
                $codServico = '09.01';
                $descrServico = 'Hospedagem de qualquer natureza em hoteis, apart-service condominiais, flat, apart-hoteis, hoteis residencia, residence-service, suite service, hotelaria maritima, moteis, pensoes e congeneres;ocupacao por temporada com fornecimento de servico (o valor d';

            case '05812301':
            case '17.02':
                $descrCNAE = 'Edicao de jornais diarios';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '05912001':
            case '13.02':
                $descrCNAE = 'Servicos de dublagem';
                $codServico = '13.02';
                $descrServico = 'Fonografia ou gravacao de sons, inclusive trucagem, dublagem, mixagem e congeneres.';

            case '06010100':
            case '99.99':
                $descrCNAE = 'Atividades de radio';
                $codServico = '99.99';
                $descrServico = 'Veiculacao de publicidade e outras situacoes de nao incidencia.';

            case '06421200':
            case '15.06':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.06';
                $descrServico = 'Emissao, reemissao e fornecimento de avisos, comprovantes e documentos em geral;abono de firmas;coleta e entrega de documentos, bens e valores;comunicacao com outra agencia ou com a administracao central;licenciamento eletronico de veiculos;transfere';

            case '06423900':
            case '15.09':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06424701':
            case '15.12':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06424701':
            case '15.18':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06424703':
            case '15.14':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.14';
                $descrServico = 'Fornecimento, emissao, reemissao, renovacao e manutencao de cartao magnetico, cartao de credito, cartao de debito, cartao salario e congeneres.';

            case '06424703':
            case '15.16':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06424704':
            case '15.07':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06424704':
            case '15.08':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06424704':
            case '15.10':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06450600':
            case '15.02':
                $descrCNAE = 'Sociedades de capitalizacao';
                $codServico = '15.02';
                $descrServico = 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicacao e caderneta de poupanca, no Pais e no exterior, bem como a manutencao das referidas contas ativas e inativas.';

            case '06470101':
            case '15.01':
                $descrCNAE = 'Fundos de investimento, exceto previdenciarios e imobiliarios';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06612605':
            case '10.02':
                $descrCNAE = 'Agentes de investimentos em aplicacoes financeiras';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '07119704':
            case '17.09':
                $descrCNAE = 'Servicos de pericia tecnica relacionados a seguranca do trabalho';
                $codServico = '17.09';
                $descrServico = 'Pericias, laudos, exames tecnicos e analises tecnicas.';

            case '07312200':
            case '10.08':
                $descrCNAE = 'Agenciamento de espacos para publicidade, exceto em veiculos de comunicacao';
                $codServico = '10.08';
                $descrServico = 'Agenciamento de publicidade e propaganda, inclusive o agenciamento de veiculacao por quaisquer meios.';

            case '07319004':
            case '17.01':
                $descrCNAE = 'Consultoria em publicidade';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '07490199':
            case '23.01':
                $descrCNAE = 'Outras atividades profissionais, cientificas e tecnicas nao especificadas anteriormente';
                $codServico = '23.01';
                $descrServico = 'Servicos de programacao e comunicacao visual, desenho industrial e congeneres.';

            case '07739099':
            case '00.00':
                $descrCNAE = 'Aluguel de outras maquinas e equipamentos comerciais e industriais nao especificados anteriormente, sem operador';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '08012900':
            case '26.01':
                $descrCNAE = 'Atividades de transporte de valores';
                $codServico = '26.01';
                $descrServico = 'Servicos de coleta, remessa ou entrega de correspondencias, documentos, objetos, bens ou valores, inclusive pelos correios e suas agencias franqueadas;courrier e congeneres.';

            case '08211300':
            case '03.03':
                $descrCNAE = 'Servicos combinados de escritorio e apoio administrativo';
                $codServico = '03.03';
                $descrServico = 'Exploracao de saloes de festas, centro de convencoes, escritorios virtuais, stands, quadras esportivas, estadios, ginasios, auditorios, casas de espetaculos, parques de diversoes, canchas e congeneres, para realizacao de eventos ou negocios de qualquer na';

            case '08211300':
            case '17.03':
                $descrCNAE = 'Servicos combinados de escritorio e apoio administrativo';
                $codServico = '17.03';
                $descrServico = 'Planejamento, coordenacao, programacao ou organizacao tecnica, financeira ou administrativa.';

            case '08299706':
            case '19.01':
                $descrCNAE = 'Casas lotericas';
                $codServico = '19.01';
                $descrServico = 'Servicos de distribuicao e venda de bilhetes e demais produtos de loteria, bingos, cartoes, pules ou cupons de apostas, sorteios, premios, inclusive os decorrentes de titulos de capitalizacao e congeneres.';

            case '08513900':
            case '08.01':
                $descrCNAE = 'Ensino fundamental';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08640202':
            case '04.02':
                $descrCNAE = 'Laboratorios clinicos';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08640213':
            case '04.03':
                $descrCNAE = 'Servicos de litotripsia';
                $codServico = '04.03';
                $descrServico = 'Hospitais, clinicas, laboratorios, sanatorios, manicomios, casas de saude, prontos-socorros, ambulatorios e congeneres.';

            case '08720401':
            case '04.17':
                $descrCNAE = 'Atividades de centros de assistencia psicossocial';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09329802':
            case '12.09':
                $descrCNAE = 'Exploracao de boliches';
                $codServico = '12.09';
                $descrServico = 'Bilhares, boliches e diversoes eletronicas ou nao.';

            case '09329899':
            case '11.01':
                $descrCNAE = 'Outras atividades de recreacao e lazer nao especificadas anteriormente';
                $codServico = '11.01';
                $descrServico = 'Guarda e estacionamento de veiculos terrestres automotores, de aeronaves e de embarcacoes.';

            case '09529199':
            case '14.01':
                $descrCNAE = 'Reparacao e manutencao de outros objetos e equipamentos pessoais e domesticos nao especificados anteriormente';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '09601703':
            case '14.10':
                $descrCNAE = 'Toalheiros';
                $codServico = '14.10';
                $descrServico = 'Tinturaria e lavanderia.';

            case '09609208':
            case '05.08':
                $descrCNAE = 'Higiene e embelezamento de animais domesticos';
                $codServico = '05.08';
                $descrServico = 'Guarda, tratamento, amestramento, embelezamento, alojamento e congeneres.';

            case '03250709':
            case '14.05':
                $descrCNAE = 'Servicos de laboratorios opticos';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '03299003':
            case '24.01':
                $descrCNAE = 'Fabricacao de letras, letreiros e placas de qualquer material, exceto luminosos';
                $codServico = '24.01';
                $descrServico = 'Servicos de chaveiros, confeccao de carimbos, placas, sinalizacao visual, banners, adesivos e congeneres.';

            case '03313901':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de geradores, transformadores e motores eletricos';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314708':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas, equipamentos e aparelhos para transporte e elevacao de cargas';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314719':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e equipamentos para as industrias de alimentos, bebidas e fumo';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03821100':
            case '07.09':
                $descrCNAE = 'Tratamento e disposicao de residuos nao-perigosos';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04211101':
            case '07.05':
                $descrCNAE = 'Construcao de rodovias e ferrovias';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04221901':
            case '07.02':
                $descrCNAE = 'Construcao de barragens e represas para geracao de energia eletrica';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04291000':
            case '07.18':
                $descrCNAE = 'Obras portuarias, maritimas e fluviais';
                $codServico = '07.18';
                $descrServico = 'Limpeza e dragagem de rios, portos, canais, baias, lagos, lagoas, represas, acudes e congeneres.';

            case '04312600':
            case '07.02':
                $descrCNAE = 'Perfuracoes e sondagens';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04322302':
            case '14.01':
                $descrCNAE = 'Instalacao e manutencao de sistemas centrais de ar condicionado, de ventilacao e refrigeracao';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04329104':
            case '14.06':
                $descrCNAE = 'Montagem e instalacao de sistemas e equipamentos de iluminacao e sinalizacao em vias publicas, portos e aeroportos';
                $codServico = '14.06';
                $descrServico = 'Instalacao e montagem de aparelhos, maquinas e equipamentos, inclusive montagem industrial, prestados ao usuario final, exclusivamente com material por ele fornecido.';

            case '04330404':
            case '07.02':
                $descrCNAE = 'Servicos de pintura de edificios em geral';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04399103':
            case '07.05':
                $descrCNAE = 'Obras de alvenaria';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04520008':
            case '14.11':
                $descrCNAE = 'Servicos de capotaria';
                $codServico = '14.11';
                $descrServico = 'Tapecaria e reforma de estofamentos em geral.';

            case '04751202':
            case '14.01':
                $descrCNAE = 'Recarga de cartuchos para equipamentos de informatica';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04924800':
            case '16.02':
                $descrCNAE = 'Transporte escolar';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '05012201':
            case '00.00':
                $descrCNAE = 'TRANSPORTE MARiTIMO DE LONGO CURSO - CARGA';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05250805':
            case '20.01':
                $descrCNAE = 'Operador de transporte multimodal - otm';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '05590699':
            case '09.01':
                $descrCNAE = 'Outros alojamentos nao especificados anteriormente';
                $codServico = '09.01';
                $descrServico = 'Hospedagem de qualquer natureza em hoteis, apart-service condominiais, flat, apart-hoteis, hoteis residencia, residence-service, suite service, hotelaria maritima, moteis, pensoes e congeneres;ocupacao por temporada com fornecimento de servico (o valor d';

            case '05812302':
            case '17.02':
                $descrCNAE = 'Edicao de jornais nao diarios';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '05912002':
            case '13.02':
                $descrCNAE = 'Servicos de mixagem sonora em producao audiovisual';
                $codServico = '13.02';
                $descrServico = 'Fonografia ou gravacao de sons, inclusive trucagem, dublagem, mixagem e congeneres.';

            case '06021700':
            case '99.99':
                $descrCNAE = 'Atividades de televisao aberta';
                $codServico = '99.99';
                $descrServico = 'Veiculacao de publicidade e outras situacoes de nao incidencia.';

            case '06201501':
            case '01.01':
                $descrCNAE = 'Desenvolvimento de programas de computador sob encomenda';
                $codServico = '01.01';
                $descrServico = 'Analise e desenvolvimento de sistemas.';

            case '06421200':
            case '15.03':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.03';
                $descrServico = 'Locacao e manutencao de cofres particulares, de terminais eletronicos, de terminais de atendimento e de bens e equipamentos em geral.';

            case '06422100':
            case '15.06':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.06';
                $descrServico = 'Emissao, reemissao e fornecimento de avisos, comprovantes e documentos em geral;abono de firmas;coleta e entrega de documentos, bens e valores;comunicacao com outra agencia ou com a administracao central;licenciamento eletronico de veiculos;transfere';

            case '06424701':
            case '15.09':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06424703':
            case '15.12':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06424703':
            case '15.18':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06424704':
            case '15.14':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.14';
                $descrServico = 'Fornecimento, emissao, reemissao, renovacao e manutencao de cartao magnetico, cartao de credito, cartao de debito, cartao salario e congeneres.';

            case '06424704':
            case '15.16':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06431000':
            case '15.08':
                $descrCNAE = 'Bancos multiplos, sem carteira comercial';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06432800':
            case '15.07':
                $descrCNAE = 'Bancos de investimento';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06470102':
            case '15.01':
                $descrCNAE = 'Fundos de investimento previdenciarios';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06550200':
            case '05.09':
                $descrCNAE = 'Planos de saude';
                $codServico = '05.09';
                $descrServico = 'Planos de atendimento e assistencia medico-veterinaria.';

            case '06619301':
            case '15.10':
                $descrCNAE = 'Servicos de liquidacao e custodia';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06619399':
            case '10.02':
                $descrCNAE = 'Outras atividades auxiliares dos servicos financeiros nao especificadas anteriormente';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '07120100':
            case '17.09':
                $descrCNAE = 'Testes e analises tecnicas';
                $codServico = '17.09';
                $descrServico = 'Pericias, laudos, exames tecnicos e analises tecnicas.';

            case '07320300':
            case '17.01':
                $descrCNAE = 'Pesquisas de mercado e de opiniao publica';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '07490104':
            case '10.08':
                $descrCNAE = 'Atividades de intermediacao e agenciamento de servicos e negocios em geral, exceto imobiliarios';
                $codServico = '10.08';
                $descrServico = 'Agenciamento de publicidade e propaganda, inclusive o agenciamento de veiculacao por quaisquer meios.';

            case '07810800':
            case '17.04':
                $descrCNAE = 'Selecao e agenciamento de mao-de-obra';
                $codServico = '17.04';
                $descrServico = 'Recrutamento, agenciamento, selecao e colocacao de mao-de-obra.';

            case '08011101':
            case '11.02':
                $descrCNAE = 'Atividades de vigilancia e seguranca privada';
                $codServico = '11.02';
                $descrServico = 'Vigilancia, seguranca ou monitoramento de bens, pessoas e semoventes.';

            case '08230002':
            case '03.03':
                $descrCNAE = 'Casas de festas e eventos';
                $codServico = '03.03';
                $descrServico = 'Exploracao de saloes de festas, centro de convencoes, escritorios virtuais, stands, quadras esportivas, estadios, ginasios, auditorios, casas de espetaculos, parques de diversoes, canchas e congeneres, para realizacao de eventos ou negocios de qualquer na';

            case '08520100':
            case '08.01':
                $descrCNAE = 'Ensino medio';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08640204':
            case '04.02':
                $descrCNAE = 'Servicos de tomografia';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08650099':
            case '04.04':
                $descrCNAE = 'Atividades de profissionais da area de saude nao especificadas anteriormente';
                $codServico = '04.04';
                $descrServico = 'Instrumentacao cirurgica';

            case '08720499':
            case '04.17':
                $descrCNAE = 'Atividades de assistencia psicossocial e a saude a portadores de disturbios psiquicos, deficiencia mental e dependencia quimica nao especificadas anteriormente';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '08800600':
            case '27.01':
                $descrCNAE = 'Servicos de assistencia social sem alojamento';
                $codServico = '27.01';
                $descrServico = 'Servicos de assistencia social.';

            case '09200301':
            case '19.01':
                $descrCNAE = 'Casas de bingo';
                $codServico = '19.01';
                $descrServico = 'Servicos de distribuicao e venda de bilhetes e demais produtos de loteria, bingos, cartoes, pules ou cupons de apostas, sorteios, premios, inclusive os decorrentes de titulos de capitalizacao e congeneres.';

            case '09329803':
            case '12.09':
                $descrCNAE = 'Exploracao de jogos de sinuca, bilhar e similares';
                $codServico = '12.09';
                $descrServico = 'Bilhares, boliches e diversoes eletronicas ou nao.';

            case '09609299':
            case '14.01':
                $descrCNAE = 'Outras atividades de servicos pessoais nao especificadas anteriormente';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03299004':
            case '24.01':
                $descrCNAE = 'Fabricacao de paineis e letreiros luminosos';
                $codServico = '24.01';
                $descrServico = 'Servicos de chaveiros, confeccao de carimbos, placas, sinalizacao visual, banners, adesivos e congeneres.';

            case '03313902':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de baterias e acumuladores eletricos, exceto para veiculos';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314709':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas de escrever, calcular e de outros equipamentos nao-eletronicos para escritorio';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314720':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e equipamentos para a industria textil, do vestuario, do couro e calcados';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03822000':
            case '07.09':
                $descrCNAE = 'Tratamento e disposicao de residuos perigosos';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04211102':
            case '07.05':
                $descrCNAE = 'Pintura para sinalizacao em pistas rodoviarias e aeroportos';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04221902':
            case '07.02':
                $descrCNAE = 'Construcao de estacoes e redes de distribuicao de energia eletrica';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04313400':
            case '07.02':
                $descrCNAE = 'Obras de terraplenagem';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04322303':
            case '14.01':
                $descrCNAE = 'Instalacoes de sistema de prevencao contra incendio';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04330405':
            case '07.02':
                $descrCNAE = 'Aplicacao de revestimentos e de resinas em interiores e exteriores';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04399199':
            case '07.05':
                $descrCNAE = 'Servicos especializados para construcao nao especificados anteriormente';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04512901':
            case '10.09':
                $descrCNAE = 'Representantes comerciais e agentes do comercio de veiculos automotores';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '04520002':
            case '14.05':
                $descrCNAE = 'Servicos de lanternagem ou funilaria e pintura de veiculos automotores';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '04929901':
            case '16.02':
                $descrCNAE = 'Transporte rodoviario coletivo de passageiros, sob regime de fretamento, municipal';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '04929903':
            case '09.02':
                $descrCNAE = 'Organizacao de excursoes em veiculos rodoviarios proprios, municipal';
                $codServico = '09.02';
                $descrServico = 'Agenciamento, organizacao, promocao, intermediacao e execucao de programas de turismo, passeios, viagens, excursoes, hospedagens e congeneres.';

            case '05012202':
            case '00.00':
                $descrCNAE = 'TRANSPORTE MARiTIMO DE LONGO CURSO - PASSAGEIROS';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05240101':
            case '20.02':
                $descrCNAE = 'Operacao dos aeroportos e campos de aterrissagem';
                $codServico = '20.02';
                $descrServico = 'Servicos aeroportuarios, utilizacao de aeroporto, movimentacao de passageiros, armazenagem de qualquer natureza, capatazia, movimentacao de aeronaves, servicos de apoio aeroportuarios, servicos acessorios, movimentacao de mercadorias, logistica e congener';

            case '05813100':
            case '17.02':
                $descrCNAE = 'Edicao de revistas';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '05920100':
            case '13.02':
                $descrCNAE = 'Atividades de gravacao de som e de edicao de musica';
                $codServico = '13.02';
                $descrServico = 'Fonografia ou gravacao de sons, inclusive trucagem, dublagem, mixagem e congeneres.';

            case '06022501':
            case '99.99':
                $descrCNAE = 'Programadoras';
                $codServico = '99.99';
                $descrServico = 'Veiculacao de publicidade e outras situacoes de nao incidencia.';

            case '06190699':
            case '14.01':
                $descrCNAE = 'Outras atividades de telecomunicacoes nao especificadas anteriormente';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '06190699':
            case '14.06':
                $descrCNAE = 'Outras atividades de telecomunicacoes nao especificadas anteriormente';
                $codServico = '14.06';
                $descrServico = 'Instalacao e montagem de aparelhos, maquinas e equipamentos, inclusive montagem industrial, prestados ao usuario final, exclusivamente com material por ele fornecido.';

            case '06201501':
            case '01.02':
                $descrCNAE = 'Desenvolvimento de programas de computador sob encomenda';
                $codServico = '01.02';
                $descrServico = 'Programacao.';

            case '06421200':
            case '15.15':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.15';
                $descrServico = 'Compensacao de cheques e titulos quaisquer;servicos relacionados a deposito, inclusive deposito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusive em terminais eletronicos e de atendimento.';

            case '06422100':
            case '15.03':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.03';
                $descrServico = 'Locacao e manutencao de cofres particulares, de terminais eletronicos, de terminais de atendimento e de bens e equipamentos em geral.';

            case '06423900':
            case '15.06':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.06';
                $descrServico = 'Emissao, reemissao e fornecimento de avisos, comprovantes e documentos em geral;abono de firmas;coleta e entrega de documentos, bens e valores;comunicacao com outra agencia ou com a administracao central;licenciamento eletronico de veiculos;transfere';

            case '06424703':
            case '15.09':
                $descrCNAE = 'Cooperativas de credito mutuo';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06424704':
            case '15.12':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06424704':
            case '15.18':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06432800':
            case '15.08':
                $descrCNAE = 'Bancos de investimento';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06432800':
            case '15.16':
                $descrCNAE = 'Bancos de investimento';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06433600':
            case '15.07':
                $descrCNAE = 'Bancos de desenvolvimento';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06470103':
            case '15.01':
                $descrCNAE = 'Fundos de investimento imobiliarios';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06619302':
            case '15.10':
                $descrCNAE = 'Correspondentes de instituicoes financeiras';
                $codServico = '15.10';
                $descrServico = 'Servicos relacionados a cobrancas, recebimentos ou pagamentos em geral, de titulos quaisquer, de contas ou carnes, de cambio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletronico, automatico ou por maquinas de atendimento;forn';

            case '06621501':
            case '28.01':
                $descrCNAE = 'Peritos e avaliadores de seguros';
                $codServico = '28.01';
                $descrServico = 'Servicos de avaliacao de bens e servicos de qualquer natureza.';

            case '06622300':
            case '10.02':
                $descrCNAE = 'Corretores e agentes de seguros, de planos de previdencia complementar e de saude';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '07112000':
            case '07.19':
                $descrCNAE = 'Servicos de engenharia';
                $codServico = '07.19';
                $descrServico = 'Acompanhamento e fiscalizacao da execucao de obras de engenharia, arquitetura e urbanismo';

            case '07490103':
            case '17.01':
                $descrCNAE = 'Servicos de agronomia e de consultoria as atividades agricolas e pecuarias';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '07820500':
            case '17.05':
                $descrCNAE = 'Locacao de mao-de-obra temporaria';
                $codServico = '17.05';
                $descrServico = 'Fornecimento de mao-de-obra, mesmo em carater temporario, inclusive de empregados ou trabalhadores, avulsos ou temporarios, contratados pelo prestador de servico';

            case '08020000':
            case '11.02':
                $descrCNAE = 'Atividades de monitoramento de sistemas de seguranca';
                $codServico = '11.02';
                $descrServico = 'Vigilancia, seguranca ou monitoramento de bens, pessoas e semoventes.';

            case '08230001':
            case '17.10':
                $descrCNAE = 'Servicos de organizacao de feiras, congressos, exposicoes e festas';
                $codServico = '17.10';
                $descrServico = 'Planejamento, organizacao e administracao de feiras, exposicoes, congressos e congeneres.';

            case '08531700':
            case '08.01':
                $descrCNAE = 'Educacao superior – graduacao';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08640205':
            case '04.02':
                $descrCNAE = 'Servicos de diagnostico por imagem com uso de radiacao ionizante, exceto tomografia';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08690901':
            case '04.05':
                $descrCNAE = 'Atividades de praticas integrativas e complementares em saude humana';
                $codServico = '04.05';
                $descrServico = 'Acupuntura';

            case '08730101':
            case '04.17':
                $descrCNAE = 'Orfanatos';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09003500':
            case '03.03':
                $descrCNAE = 'Gestao de espacos para artes cenicas, espetaculos e outras atividades artisticas';
                $codServico = '03.03';
                $descrServico = 'Exploracao de saloes de festas, centro de convencoes, escritorios virtuais, stands, quadras esportivas, estadios, ginasios, auditorios, casas de espetaculos, parques de diversoes, canchas e congeneres, para realizacao de eventos ou negocios de qualquer na';

            case '09200399':
            case '19.01':
                $descrCNAE = 'Exploracao de jogos de azar e apostas nao especificados anteriormente';
                $codServico = '19.01';
                $descrServico = 'Servicos de distribuicao e venda de bilhetes e demais produtos de loteria, bingos, cartoes, pules ou cupons de apostas, sorteios, premios, inclusive os decorrentes de titulos de capitalizacao e congeneres.';

            case '09329804':
            case '12.09':
                $descrCNAE = 'Exploracao de jogos eletronicos recreativos';
                $codServico = '12.09';
                $descrServico = 'Bilhares, boliches e diversoes eletronicas ou nao.';

            case '09511800':
            case '14.02':
                $descrCNAE = 'Reparacao e manutencao de computadores e de equipamentos perifericos';
                $codServico = '14.02';
                $descrServico = 'Assistencia Tecnica.';

            case '09529105':
            case '14.11':
                $descrCNAE = 'Reparacao de artigos do mobiliario';
                $codServico = '14.11';
                $descrServico = 'Tapecaria e reforma de estofamentos em geral.';

            case '09602501':
            case '06.01':
                $descrCNAE = 'Cabeleireiros';
                $codServico = '06.01';
                $descrServico = 'Barbearia, cabeleireiros, manicuros, pedicuros e congeneres.';

            case '00311604':
            case '20.01':
                $descrCNAE = 'Atividades de apoio a pesca em agua salgada';
                $codServico = '20.01';
                $descrServico = 'Servicos portuarios, ferroportuarios, utilizacao de porto, movimentacao de passageiros, reboque de embarcacoes, rebocador escoteiro, atracacao, desatracacao, servicos de praticagem, capatazia, armazenagem de qualquer natureza, servicos acessorios, movimen';

            case '01629301':
            case '14.07':
                $descrCNAE = 'Fabricacao de artefatos diversos de madeira, exceto moveis';
                $codServico = '14.07';
                $descrServico = 'Colocacao de molduras e congeneres.';

            case '01830002':
            case '13.03':
                $descrCNAE = 'Reproducao de video em qualquer suporte';
                $codServico = '13.03';
                $descrServico = 'Fotografia e cinematografia, inclusive revelacao, ampliacao, copia, reproducao, trucagem e congeneres.';

            case '01830003':
            case '01.03':
                $descrCNAE = 'Reproducao de software em qualquer suporte';
                $codServico = '01.03';
                $descrServico = 'Processamento, armazenamento ou hospedagem de dados, textos, imagens, videos, paginas eletronicas, aplicativos e sistemas de informacao, entre outros formatos, e congeneres.';

            case '03313999':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas, aparelhos e materiais eletricos nao especificados anteriormente';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314710':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e equipamentos para uso geral nao especificados anteriormente';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03314721':
            case '14.01':
                $descrCNAE = 'Manutencao e reparacao de maquinas e aparelhos para a industria de celulose, papel e papelao e artefatos';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '03831901':
            case '07.09':
                $descrCNAE = 'Recuperacao de sucatas de aluminio';
                $codServico = '07.09';
                $descrServico = 'Varricao, coleta, remocao, incineracao, tratamento, reciclagem, separacao e destinacao final de lixo, rejeitos e outros residuos quaisquer.';

            case '04212000':
            case '07.05':
                $descrCNAE = 'Construcao de obras-de-arte especiais';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '04221904':
            case '07.02':
                $descrCNAE = 'Construcao de estacoes e redes de telecomunicacoes';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04319300':
            case '07.02':
                $descrCNAE = 'Servicos de preparacao do terreno nao especificados anteriormente';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04329101':
            case '24.01':
                $descrCNAE = 'Instalacao de paineis publicitarios';
                $codServico = '24.01';
                $descrServico = 'Servicos de chaveiros, confeccao de carimbos, placas, sinalizacao visual, banners, adesivos e congeneres.';

            case '04329103':
            case '14.01':
                $descrCNAE = 'Instalacao, manutencao e reparacao de elevadores, escadas e esteiras rolantes, exceto de fabricacao propria';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '04330499':
            case '07.02':
                $descrCNAE = 'Outras obras de acabamento da construcao';
                $codServico = '07.02';
                $descrServico = 'Execucao, por administracao, empreitada ou subempreitada, de obras de construcao civil, hidraulica ou eletrica e de outras obras semelhantes, inclusive sondagem, perfuracao de pocos, escavacao, drenagem e irrigacao, terraplanagem, pavimentacao, concretag';

            case '04512902':
            case '10.09':
                $descrCNAE = 'Comercio sob consignacao de veiculos automotores';
                $codServico = '10.09';
                $descrServico = 'Representacao de qualquer natureza, inclusive comercial.';

            case '04520002':
            case '14.12':
                $descrCNAE = 'Servicos de lanternagem ou funilaria e pintura de veiculos automotores';
                $codServico = '14.12';
                $descrServico = 'Funilaria e lanternagem.';

            case '04520005':
            case '14.05':
                $descrCNAE = 'Servicos de lavagem, lubrificacao e polimento de veiculos automotores';
                $codServico = '14.05';
                $descrServico = 'Restauracao, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodizacao, corte, recorte, plastificacao, costura, acabamento, polimento e congeneres de objetos quaisquer.';

            case '04929904':
            case '09.02':
                $descrCNAE = 'Organizacao de excursoes em veiculos rodoviarios proprios, intermunicipal, interestadual e internacional';
                $codServico = '09.02';
                $descrServico = 'Agenciamento, organizacao, promocao, intermediacao e execucao de programas de turismo, passeios, viagens, excursoes, hospedagens e congeneres.';

            case '04930201':
            case '16.02':
                $descrCNAE = 'Transporte rodoviario de carga, exceto produtos perigosos e mudancas, municipal';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '00000243':
                $descrCNAE = 'Transporte rodoviario de carga, exceto produtos perigosos e mudancas, municipal';
                $codServico = '16.02';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '04930201':
            case '16.03':
                $descrCNAE = 'Transporte rodoviario de carga, exceto produtos perigosos e mudancas, municipal';
                $codServico = '16.03';
                $descrServico = 'Outros servicos de transporte de natureza municipal.';

            case '24.47':
                $descrCNAE = 'Transporte rodoviario de carga, exceto produtos perigosos e mudancas, municipal';
                $codServico = '24.47';
                $descrServico = 'Transporte de bens ou valores, dentro do territorio do Municipio (inclusive transportes de veiculos)';

            case '04930202':
            case '11.04':
                $descrCNAE = 'Transporte rodoviario de carga, exceto produtos perigosos e mudancas, intermunicipal, interestadual e internacional';
                $codServico = '11.04';
                $descrServico = 'Armazenamento, deposito, carga, descarga, arrumacao e guarda de bens de qualquer especie.';

            case '05021102':
            case '00.00':
                $descrCNAE = 'Transporte por navegacao interior de carga, intermunicipal, interestadual e internacional, exceto travessia';
                $codServico = '00.00';
                $descrServico = 'Locacao de bens moveis';

            case '05240199':
            case '20.02':
                $descrCNAE = 'Atividades auxiliares dos transportes aereos, exceto operacao dos aeroportos e campos de aterrissagem';
                $codServico = '20.02';
                $descrServico = 'Servicos aeroportuarios, utilizacao de aeroporto, movimentacao de passageiros, armazenagem de qualquer natureza, capatazia, movimentacao de aeronaves, servicos de apoio aeroportuarios, servicos acessorios, movimentacao de mercadorias, logistica e congener';

            case '05620102':
            case '17.11':
                $descrCNAE = 'Servicos de alimentacao para eventos e recepcoes – bufe';
                $codServico = '17.11';
                $descrServico = 'Organizacao de festas e recepcoes;bufe (exceto o fornecimento de alimentacao e bebidas, que fica sujeito ao ICMS).';

            case '05819100':
            case '17.02':
                $descrCNAE = 'Edicao de cadastros, listas e outros produtos graficos';
                $codServico = '17.02';
                $descrServico = 'Datilografia, digitacao, estenografia, expediente, secretaria em geral, resposta audivel, redacao, edicao, interpretacao, revisao, traducao, apoio e infra-estrutura administrativa e congeneres.';

            case '06022502':
            case '99.99':
                $descrCNAE = 'Atividades relacionadas a televisao por assinatura, exceto programadoras';
                $codServico = '99.99';
                $descrServico = 'Veiculacao de publicidade e outras situacoes de nao incidencia.';

            case '06421200':
            case '15.11':
                $descrCNAE = 'Bancos comerciais';
                $codServico = '15.11';
                $descrServico = 'Devolucao de titulos, protesto de titulos, sustacao de protesto, manutencao de titulos, reapresentacao de titulos, e demais servicos a eles relacionados.';

            case '06422100':
            case '15.15':
                $descrCNAE = 'Bancos multiplos, com carteira comercial';
                $codServico = '15.15';
                $descrServico = 'Compensacao de cheques e titulos quaisquer;servicos relacionados a deposito, inclusive deposito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusive em terminais eletronicos e de atendimento.';

            case '06423900':
            case '15.03':
                $descrCNAE = 'Caixas economicas';
                $codServico = '15.03';
                $descrServico = 'Locacao e manutencao de cofres particulares, de terminais eletronicos, de terminais de atendimento e de bens e equipamentos em geral.';

            case '06424701':
            case '15.06':
                $descrCNAE = 'Bancos cooperativos';
                $codServico = '15.06';
                $descrServico = 'Emissao, reemissao e fornecimento de avisos, comprovantes e documentos em geral;abono de firmas;coleta e entrega de documentos, bens e valores;comunicacao com outra agencia ou com a administracao central;licenciamento eletronico de veiculos;transfere';

            case '06424704':
            case '15.09':
                $descrCNAE = 'Cooperativas de credito rural';
                $codServico = '15.09';
                $descrServico = 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessao de direitos e obrigacoes, substituicao de garantia, alteracao, cancelamento e registro de contrato, e demais servicos relacionados ao arrendamento mercantil (leasing).';

            case '06431000':
            case '15.12':
                $descrCNAE = 'Bancos multiplos, sem carteira comercial';
                $codServico = '15.12';
                $descrServico = 'Custodia em geral, inclusive de titulos e valores mobiliarios.';

            case '06431000':
            case '15.18':
                $descrCNAE = 'Bancos multiplos, sem carteira comercial';
                $codServico = '15.18';
                $descrServico = 'Servicos relacionados a credito imobiliario, avaliacao e vistoria de imovel ou obra, analise tecnica e juridica, emissao, reemissao, alteracao, transferencia e renegociacao de contrato, emissao e reemissao do termo de quitacao e demais servicos relacionad';

            case '06433600':
            case '15.08':
                $descrCNAE = 'Bancos de desenvolvimento';
                $codServico = '15.08';
                $descrServico = 'Emissao, reemissao, alteracao, cessao, substituicao, cancelamento e registro de contrato de credito;estudo, analise e avaliacao de operacoes de credito;emissao, concessao, alteracao ou contratacao de aval, fianca, anuencia e congeneres;servicos relativ';

            case '06433600':
            case '15.16':
                $descrCNAE = 'Bancos de desenvolvimento';
                $codServico = '15.16';
                $descrServico = 'Emissao, reemissao, liquidacao, alteracao, cancelamento e baixa de ordens de pagamento, ordens de credito e similares, por qualquer meio ou processo;servicos relacionados a transferencia de valores, dados, fundos, pagamentos e similares, inclusive entre';

            case '06435203':
            case '15.07':
                $descrCNAE = 'Companhias hipotecarias';
                $codServico = '15.07';
                $descrServico = 'Acesso, movimentacao, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-simile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas;acesso a outro banco e a rede compartil';

            case '06499901':
            case '15.01':
                $descrCNAE = 'Clubes de investimento';
                $codServico = '15.01';
                $descrServico = 'Administracao de fundos quaisquer, de consorcio, de cartao de credito ou debito e congeneres, de carteira de clientes, de cheques predatados e congeneres.';

            case '06821801':
            case '28.01':
                $descrCNAE = 'Corretagem na compra e venda e avaliacao de imoveis';
                $codServico = '28.01';
                $descrServico = 'Servicos de avaliacao de bens e servicos de qualquer natureza.';

            case '07119701':
            case '07.20':
                $descrCNAE = 'Servicos de cartografia, topografia e geodesia';
                $codServico = '07.20';
                $descrServico = 'Aerofotogrametria (inclusive interpretacao), cartografia, mapeamento, levantamentos topograficos, batimetricos, geograficos, geodesicos, geologicos, geofisicos e congeneres';

            case '07490102':
            case '14.01':
                $descrCNAE = 'Escafandria e mergulho';
                $codServico = '14.01';
                $descrServico = 'Lubrificacao, limpeza, lustracao, revisao, carga e recarga, conserto, restauracao, blindagem, manutencao e conservacao de maquinas, veiculos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto pecas e partes empregadas, que ficam s';

            case '07490104':
            case '10.02':
                $descrCNAE = 'Atividades de intermediacao e agenciamento de servicos e negocios em geral, exceto imobiliarios';
                $codServico = '10.02';
                $descrServico = 'Agenciamento, corretagem ou intermediacao de titulos em geral, valores mobiliarios e contratos quaisquer.';

            case '07490199':
            case '17.01':
                $descrCNAE = 'Outras atividades profissionais, cientificas e tecnicas nao especificadas anteriormente';
                $codServico = '17.01';
                $descrServico = 'Assessoria ou consultoria de qualquer natureza, nao contida em outros itens desta lista;analise, exame, pesquisa, coleta, compilacao e fornecimento de dados e informacoes de qualquer natureza, inclusive cadastro e similares.';

            case '07830200':
            case '17.05':
                $descrCNAE = 'Fornecimento e gestao de recursos humanos para terceiros';
                $codServico = '17.05';
                $descrServico = 'Fornecimento de mao-de-obra, mesmo em carater temporario, inclusive de empregados ou trabalhadores, avulsos ou temporarios, contratados pelo prestador de servico';

            case '08020001':
            case '11.02':
                $descrCNAE = 'Atividades de monitoramento de sistemas de seguranca eletronico';
                $codServico = '11.02';
                $descrServico = 'Vigilancia, seguranca ou monitoramento de bens, pessoas e semoventes.';

            case '08532500':
            case '08.01':
                $descrCNAE = 'Educacao superior - graduacao e pos-graduacao';
                $codServico = '08.01';
                $descrServico = 'Ensino regular pre-escolar, fundamental, medio e superior.';

            case '08640206':
            case '04.02':
                $descrCNAE = 'Servicos de ressonancia magnetica';
                $codServico = '04.02';
                $descrServico = 'Analises clinicas, patologia, eletricidade medica, radioterapia, quimioterapia, ultra-sonografia, ressonancia magnetica, radiologia, tomografia e congeneres.';

            case '08690903':
            case '04.05':
                $descrCNAE = 'Atividades de acumputura';
                $codServico = '04.05';
                $descrServico = 'Acupuntura';

            case '08690904':
            case '06.01':
                $descrCNAE = 'Atividades de podologia';
                $codServico = '06.01';
                $descrServico = 'Barbearia, cabeleireiros, manicuros, pedicuros e congeneres.';

            case '08730102':
            case '04.17':
                $descrCNAE = 'Albergues assistencias';
                $codServico = '04.17';
                $descrServico = 'Casas de repouso e de recuperacao, creches, asilos e congeneres.';

            case '09001905':
            case '12.10':
                $descrCNAE = 'Producao de espetaculos de rodeios, vaquejadas e similares';
                $codServico = '12.10';
                $descrServico = 'Corridas e competicoes de animais.';

            case '09102302':
            case '07.05':
                $descrCNAE = 'Restauracao e conservacao de lugares e predios historicos';
                $codServico = '07.05';
                $descrServico = 'Reparacao, conservacao e reforma de edificios, estradas, pontes, portos e congeneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos servicos, fora do local da prestacao dos servicos, que fica sujeito ao ICMS)';

            case '09311500':
            case '03.03':
                $descrCNAE = 'Gestao de instalacoes de esportes';
                $codServico = '03.03';
                $descrServico = 'Exploracao de saloes de festas, centro de convencoes, escritorios virtuais, stands, quadras esportivas, estadios, ginasios, auditorios, casas de espetaculos, parques de diversoes, canchas e congeneres, para realizacao de eventos ou negocios de qualquer na';

            case '09512600':
            case '14.02':
                $descrCNAE = 'Reparacao e manutencao de equipamentos de comunicacao';
                $codServico = '14.02';
                $descrServico = 'Assistencia Tecnica.';

            case '08650003':
            case '04.16':
                $descrCNAE = 'Atividades de psicologia e psicanalise';
                $codServico = '04.16';
                $descrServico = 'Psicologia';

            case '07500100':
            case '05.05':
                $descrCNAE = 'Atividades veterinarias';
                $codServico = '05.05';
                $descrServico = 'Bancos de sangue e de orgaos e congeneres.';

            case '07500100':
            case '05.06':
                $descrCNAE = 'Atividades veterinarias';
                $codServico = '05.06';
                $descrServico = 'Coleta de sangue, leite, tecidos, semen, orgaos e materiais biologicos de qualquer especie.';

            default:
                $descrCNAE = '';
                $codServico = '';
                $descrServico = '';
        }

        return [
            'descricaoCNAE' => $descrCNAE,
            'codigoServico' => $codServico,
            'descricaoServico' => $descrServico,
        ];
    }
}
