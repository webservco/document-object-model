<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Service\DOMElement;

use DOMElement;
use WebServCo\DocumentObjectModel\Contract\DOMElement\DOMElementServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMNodeList\DOMNodeListServiceInterface;

final class DOMElementService implements DOMElementServiceInterface
{
    public function __construct(private DOMNodeListServiceInterface $domNodeListService)
    {
    }

    public function getDOMElementFromDOMElementByTagName(DOMElement $domElement, string $tagName): ?DOMElement
    {
        $domNodeList = $domElement->getElementsByTagName($tagName);

        return $this->domNodeListService->getFirstDOMElementFromDOMNodeList($domNodeList);
    }
}
