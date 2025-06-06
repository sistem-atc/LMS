<?php

namespace App\Utils\Services;

use DOMDocument;
use Filament\Facades\Filament;
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;

class XmlSigner
{

    protected string $pathCerticate;
    protected string $passCertificate;

    public function __construct()
    {

        $branch_logged = Filament::auth()->user()->branch_logged;
        $branch = $branch_logged ? $branch_logged->id : null;

        $this->pathCerticate = file_get_contents(storage_path($branch->branch_matriz->certificatePFX));
        $this->passCertificate = $branch->branch_matriz->password_certificate;
    }

    public function Sign_XML(string $xmlNoSigned): string
    {

        $signedXML = new DOMDocument();
        $signedXML->load($xmlNoSigned);

        $signature = new XMLSecurityDSig();
        $signature->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);
        $signature->addReference(
            $signedXML,
            XMLSecurityDSig::SHA1,
            ['http://www.w3.org/2000/09/xmldsig#enveloped-signature'],
            ['force_uri' => true],
        );

        $key = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1 . ['type' => 'private']);
        $key->loadKey(
            $this->pathCerticate,
            true,
            false,
        );

        $signature->sign($key);
        $signature->add509Cert($this->passCertificate);
        $signature->insertSignature($signedXML->documentElement);

        return $signedXML->saveXML();
    }
}
