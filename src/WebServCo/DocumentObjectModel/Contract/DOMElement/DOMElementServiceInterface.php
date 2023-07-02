<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Contract\DOMElement;

use DOMElement;

interface DOMElementServiceInterface
{
    public function getDOMElementFromDOMElementByTagName(DOMElement $domElement, string $tagName): ?DOMElement;
}
