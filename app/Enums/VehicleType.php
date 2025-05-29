<?php

namespace App\Enums;

enum VehicleType: string
{
    case TRACTOR = 'TRATOR';
    case CARRETA = 'CARRETA';
    case CARRETA_L_LS = 'CARRETA L / LS';
    case CAVALO_SIMPLES = 'CAVALO SIMPLES (25 TONS)';
    case CAVALO_TRUCADO = 'CAVALO TRUCADO (30 TONS)';
    case BITREM = 'BI-TREM';
    case TRUCK = 'TRUCK';
    case BITRUCK = 'BI-TRUCK';
    case CARRETA_SIDER = 'CARRETA SIDER';
    case CARRETA_VANDERLEIA = 'CARRETA VANDERLEIA';
    case FIORINO = 'FIORINO';
    case RODO_TREM = 'RODO-TREM';
    case CAMINHAO_BAU = 'CAMINHAO BAU';
    case CAMINHONETE = 'CAMINHONETE';
    case VUC = 'VUC';
    case VAN = 'VAN';
    case TRES_QUARTOS = '3/4';
    case TRUCK_ABERTO = 'TRUCK ABERTO';
    case GRANELEIRO = 'GRANELEIRO';
    case CACAMBA = 'CACAMBA';
    case BASCULANTE = 'BASCULANTE';
    case GRADE_BAIXA = 'GRADE BAIXA';
    case BOBINEIRA = 'BOBINEIRA';
    case CARRETA_14M = 'CARRETA 14M';
    case CARRETA_GRANELEIRA = 'CARRETA GRANELEIRA';
    case CONTAINER_40HC = 'CONTAINER 40HC';
    case CAVALO_SIMPLES_ABERTO_25_TONS = 'CAVALO SIMPLES ABERTO (25 TONS)';
    case CAVALO_TRUCADO_32_TONS = 'CAVALO TRUCADO (32,5 TONS)';
    case CARRETA_4_EIXO = 'CARRETA 4º EIXOS';
    case RODOTREM_CTNR = 'RODOTREM CTNR';

    public function label(): string
    {
        return match ($this) {
            self::TRACTOR => 'TRATOR',
            self::CARRETA => 'CARRETA',
            self::CARRETA_L_LS => 'CARRETA L / LS',
            self::CAVALO_SIMPLES => 'CAVALO SIMPLES (25 TONS)',
            self::CAVALO_TRUCADO => 'CAVALO TRUCADO (30 TONS)',
            self::BITREM => 'BI-TREM',
            self::TRUCK => 'TRUCK',
            self::BITRUCK => 'BI-TRUCK',
            self::CARRETA_SIDER => 'CARRETA SIDER',
            self::CARRETA_VANDERLEIA => 'CARRETA VANDERLEIA',
            self::FIORINO => 'FIORINO',
            self::RODO_TREM => 'RODO-TREM',
            self::CAMINHAO_BAU => 'CAMINHAO BAU',
            self::CAMINHONETE => 'CAMINHONETE',
            self::VUC => 'VUC',
            self::VAN => 'VAN',
            self::TRES_QUARTOS => '3/4',
            self::TRUCK_ABERTO => 'TRUCK ABERTO',
            self::GRANELEIRO => 'GRANELEIRO',
            self::CACAMBA => 'CACAMBA',
            self::BASCULANTE => 'BASCULANTE',
            self::GRADE_BAIXA => 'GRADE BAIXA',
            self::BOBINEIRA => 'BOBINEIRA',
            self::CARRETA_14M => 'CARRETA 14M',
            self::CARRETA_GRANELEIRA => 'CARRETA GRANELEIRA',
            self::CONTAINER_40HC => 'CONTAINER 40HC',
            self::CAVALO_SIMPLES_ABERTO_25_TONS => 'CAVALO SIMPLES ABERTO (25 TONS)',
            self::CAVALO_TRUCADO_32_TONS => 'CAVALO TRUCADO (32,5 TONS)',
            self::CARRETA_4_EIXO => 'CARRETA 4º EIXOS',
            self::RODOTREM_CTNR => 'RODOTREM CTNR'
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
