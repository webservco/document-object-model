<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Service\DOMXPath;

use DOMElement;
use DOMNodeList;
use DOMXPath;
use Generator;
use UnexpectedValueException;
use WebServCo\DocumentObjectModel\Contract\DOMNodeList\DOMNodeListServiceInterface;
use WebServCo\DocumentObjectModel\Contract\DOMXPath\DOMXPathServiceInterface;

final class DOMXPathService implements DOMXPathServiceInterface
{
    public function __construct(private DOMNodeListServiceInterface $domNodeListService)
    {
    }

    public function getFirstDOMElementFromDOMXPath(DOMXPath $domXPath, string $query): ?DOMElement
    {
        /**
         * Note: attempted separate method
         * protected function getDOMNodeList(DOMXPath $domXPath, string $query): DOMNodeList
         * however it degenerated in a static analysis "generics" nightmare.
         * PHPStan and Psalm gave conflicting errors.
         */
        $domNodeList = $domXPath->query($query);

        if (!$domNodeList instanceof DOMNodeList) {
            throw new UnexpectedValueException('Invalid instance.');
        }

        return $this->domNodeListService->getFirstDOMElementFromDOMNodeList($domNodeList);
    }

    /**
     * @return \Generator<\DOMElement>
     */
    public function iterateDOMElementsFromDOMXPath(DOMXPath $domXPath, string $query): Generator
    {
        /**
         * Note: attempted separate method
         * protected function getDOMNodeList(DOMXPath $domXPath, string $query): DOMNodeList
         * however it degenerated in a static analysis "generics" nightmare.
         * PHPStan and Psalm gave conflicting errors.
         */
        $domNodeList = $domXPath->query($query);

        if (!$domNodeList instanceof DOMNodeList) {
            throw new UnexpectedValueException('Invalid instance.');
        }

        foreach ($domNodeList as $domElement) {
            if (!$domElement instanceof DOMElement) {
                throw new UnexpectedValueException('Item is not a DOMElement instance.');
            }

            yield $domElement;
        }
    }
}
