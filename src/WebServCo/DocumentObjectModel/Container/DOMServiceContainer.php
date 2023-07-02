<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Container;

use WebServCo\DocumentObjectModel\Contract\Container\DOMServiceContainerInterface;
use WebServCo\DocumentObjectModel\Contract\DOMDocument\DOMDocumentServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMElement\DOMElementServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMNodeList\DOMNodeListServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMXPath\DOMXPathServiceInterface;
use WebServCo\DocumentObjectModel\Service\DOMDocument\DOMDocumentService;
use WebServCo\DocumentObjectModel\Service\DOMElement\DOMElementService;
use WebServCo\DocumentObjectModel\Service\DOMNodeList\DOMNodeListService;
use WebServCo\DocumentObjectModel\Service\DOMXPath\DOMXPathService;

final class DOMServiceContainer implements DOMServiceContainerInterface
{
    private ?DOMDocumentServiceInterface $domDocumentService = null;
    private ?DOMElementServiceInterface $domElementService = null;
    private ?DOMNodeListServiceInterface $domNodeListService = null;
    private ?DOMXPathServiceInterface $domXPathService = null;

    public function getDOMDocumentService(): DOMDocumentServiceInterface
    {
        if ($this->domDocumentService === null) {
            $this->domDocumentService = new DOMDocumentService();
        }

        return $this->domDocumentService;
    }

    public function getDOMElementService(): DOMElementServiceInterface
    {
        if ($this->domElementService === null) {
            $this->domElementService = new DOMElementService($this->getDOMNodeListService());
        }

        return $this->domElementService;
    }

    public function getDOMNodeListService(): DOMNodeListServiceInterface
    {
        if ($this->domNodeListService === null) {
            $this->domNodeListService = new DOMNodeListService();
        }

        return $this->domNodeListService;
    }

    public function getDOMXPathService(): DOMXPathServiceInterface
    {
        if ($this->domXPathService === null) {
            $this->domXPathService = new DOMXPathService($this->getDOMNodeListService());
        }

        return $this->domXPathService;
    }
}
