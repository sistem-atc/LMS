<?php

namespace App\Traits;

use SimpleXMLElement;
use App\Models\Branch;
use App\Helpers\XmlSigner;
use Illuminate\Support\Facades\Auth;

trait SignXml
{

    protected function Sign_XML(string $xmlNoSigned): SimpleXMLElement
    {
        $xmlSigner = new XmlSigner(Branch::where('id', '=', Auth::user()->employee->branch['id']));
        return simplexml_load_string($xmlSigner::Sign_XML($xmlNoSigned));
    }

}
