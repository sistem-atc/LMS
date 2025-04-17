<?php

namespace App\Enums;

enum CotationMode: string
{

    case SIMULATION = 'simulation';
    case REAL = 'real';
    case TABLE = 'table';

}
