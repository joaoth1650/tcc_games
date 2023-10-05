<?php

namespace App\Enums;

enum SituacaoEnum: string
{
    case Aberta = 'Aberto';
    case Pago = 'Pago';
    case Cancelado = 'Cancelado';
    case Aguardando_pagamento = 'Aguardando';
}
?>