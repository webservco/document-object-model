<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Contract\DOMDocument;

use DOMDocument;
use DOMElement;

interface DOMDocumentServiceInterface
{
    public function createDOMDocumentFromDOMElement(DOMElement $domElement): DOMDocument;
}
