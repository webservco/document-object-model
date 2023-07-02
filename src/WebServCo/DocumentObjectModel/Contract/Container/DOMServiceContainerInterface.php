<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Contract\Container;

use WebServCo\DocumentObjectModel\Contract\DOMDocument\DOMDocumentServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMElement\DOMElementServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMNodeList\DOMNodeListServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMXPath\DOMXPathServiceInterface;

interface DOMServiceContainerInterface
{
    public function getDOMDocumentService(): DOMDocumentServiceInterface;

    public function getDOMElementService(): DOMElementServiceInterface;

    public function getDOMNodeListService(): DOMNodeListServiceInterface;

    public function getDOMXPathService(): DOMXPathServiceInterface;
}
