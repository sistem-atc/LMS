<?php

namespace App\Traits;

use SimpleXMLElement;
use App\Utils\Services\XmlSigner;

trait SignXml
{

    protected function Sign_XML(string $xmlNoSigned): SimpleXMLElement
    {

        $xmlSigner = new XmlSigner();

        return simplexml_load_string(
            data: $xmlSigner->Sign_XML(xmlNoSigned: $xmlNoSigned)
        );
    }

}
