<?php

namespace App\Services\Utils\Towns\Bases;

use SimpleXMLElement;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use App\Services\Utils\Towns\Helpers\XmlSigner;

trait SignXml
{

    protected static function Sign_XML(string $xmlNoSigned): SimpleXMLElement
    {
        $xmlSigner = new XmlSigner(Branch::where('id', '=', Auth::user()->employee->branch['id']));
        return simplexml_load_string($xmlSigner::Sign_XML($xmlNoSigned));
    }

}
