<?php

namespace App\Traits;

use SimpleXMLElement;
use Illuminate\Support\Str;

trait XmlHandler
{

    protected ?string $baseDir = null;

    protected function assembleMessage(string $replaceOperation = '', string $version = ''): SimpleXMLElement
    {

        $content = $version ?
            file_get_contents($this->getBaseDir() . '/schemas/AssembleMensage' . $version . '.xml') :
            file_get_contents($this->getBaseDir() . '/schemas/AssembleMensage.xml');

        if (strpos($content, '[Mount_Mensage]') !== false) {
            $content = Str::replace('[Mount_Mensage]', $replaceOperation, $content);
        }

        return new SimpleXMLElement($content);
    }

    protected function composeHeader(string $headerVersion = ''): SimpleXMLElement
    {

        $content = new SimpleXMLElement(file_get_contents($this->getBaseDir() . '/schemas/ComposeHeader.xml'));
        $content->attributes()->versao = $headerVersion;
        $content->versaoDados = $headerVersion;

        return $content;
    }

    protected function composeMessage(string $type): SimpleXMLElement|null
    {
        return new SimpleXMLElement(file_get_contents($this->getBaseDir() . '/schemas/' . $type . '.xml'));
    }

    private function getBaseDir(): string
    {
        if ($this->baseDir === null) {
            $reflect = new \ReflectionClass($this);
            $this->baseDir = dirname($reflect->getFileName());
        }

        return $this->baseDir;
    }
}
