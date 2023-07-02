<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Contract\DOMXPath;

use DOMElement;
use DOMXPath;
use Generator;

interface DOMXPathServiceInterface
{
    public function getFirstDOMElementFromDOMXPath(DOMXPath $domXPath, string $query): ?DOMElement;

    /**
     * @return \Generator<\DOMElement>
     */
    public function iterateDOMElementsFromDOMXPath(DOMXPath $domXPath, string $query): Generator;
}
