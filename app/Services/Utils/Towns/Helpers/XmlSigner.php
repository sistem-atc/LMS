<?php

namespace App\Services\Utils\Towns\Helpers;

use DOMDocument;
use App\Models\Branch;
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;

class XmlSigner
{

    protected static string $pathCerticate;
    protected static string $passCertificate;

    public function __construct(Branch $branch)
    {
        self::$passCertificate = file_get_contents(storage_path($branch->branch_matriz->certificatePFX));
        self::$passCertificate = $branch->branch_matriz->password_certificate;
    }

    public static function Sign_XML(string $xmlNoSigned): string
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
            static::$pathCerticate,
            true,
            static::$passCertificate,
        );

        $signature->sign($key);
        $signature->add509Cert(static::$passCertificate);
        $signature->insertSignature($signedXML->documentElement);

        return $signedXML->saveXML();
    }
}
