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

        $xmlSigner = new XmlSigner(
            branch: Branch::where(
                column: 'id',
                operator: '=',
                value: Auth::user()->employee->branch['id']
            )->first()
        );

        return simplexml_load_string(
            data: $xmlSigner->Sign_XML(
                xmlNoSigned: $xmlNoSigned
            )
        );
    }

}
