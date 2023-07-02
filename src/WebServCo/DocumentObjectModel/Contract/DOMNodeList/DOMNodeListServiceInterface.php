<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Contract\DOMNodeList;

use DOMElement;
use DOMNodeList;

interface DOMNodeListServiceInterface
{
    /**
     * Psalm/phpstan conflict.
     *
     * @psalm-suppress TooManyTemplateParams
     * @param \DOMNodeList<\DOMNode> $domNodeList
     */
    public function getFirstDOMElementFromDOMNodeList(DOMNodeList $domNodeList): ?DOMElement;
}
