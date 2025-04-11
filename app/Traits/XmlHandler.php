<?php

namespace App\Traits;

use SimpleXMLElement;
use Illuminate\Support\Str;
use App\Services\Utils\Towns\Helpers\DirectoryHelper;

trait XmlHandler
{

    protected static function assembleMessage(string $replaceOperation = '', string $version = ''): SimpleXMLElement
    {

        $baseDir = DirectoryHelper::getDir();

        $content = $version ?
            file_get_contents($baseDir . '/schemas/AssembleMensage' . $version . '.xml') :
            file_get_contents($baseDir . '/schemas/AssembleMensage.xml');

        if (strpos($content, '[Mount_Mensage]') !== false) {
            $content = Str::replace('[Mount_Mensage]', $replaceOperation, $content);
        }

        return new SimpleXMLElement($content);
    }

    protected static function composeHeader(string $headerVersion = ''): SimpleXMLElement
    {

        $basedir = DirectoryHelper::getDir();
        $content = new SimpleXMLElement(file_get_contents($basedir . '/schemas/ComposeHeader.xml'));
        $content->attributes()->versao = $headerVersion;
        $content->versaoDados = $headerVersion;

        return $content;
    }

    protected static function composeMessage(string $type): SimpleXMLElement | null
    {
        $basedir = DirectoryHelper::getDir();
        return new SimpleXMLElement(file_get_contents($basedir . '/schemas/' . $type . '.xml'));
    }
}
