<?php

namespace App\Services\Towns\Etransparencia\Methods;

trait CANCELARNOTAELETRONICA
{

    private string $operation;

    public function CANCELARNOTAELETRONICA($data): string|int|array
    {
        $this->operation = __FUNCTION__;
        $dataMsg = parent::composeMessage(self::$operation);
        $dataMsg->CodigoUsuario = $data['codigoUsuario'];
        $dataMsg->CodigoContribuinte = $data['codigoContribuinte'];
        $dataMsg->SerieNota = $data['serieNota'];
        $dataMsg->NumeroNota = $data['numeroNota'];
        $dataMsg->SerieRps = $data['serieRps'];
        $dataMsg->NumeroRps = $data['numeroRps'];
        $dataMsg->ValorNota = $data['valorNota'];
        $dataMsg->MotivoCancelamento = $data['motivoCancelamento'];
        $dataMsg->PodeCancelarGuia = $data['podeCancelarGuia'];

        self::mountMensage($dataMsg);

        return $this->pendingRequest->post(
            parent::$url,
            self::$mountMessage->asXML(),
            self::getHeaders(),
        )->json();
    }

}
