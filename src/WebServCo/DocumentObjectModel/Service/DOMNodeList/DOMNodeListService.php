<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Service\DOMNodeList;

use DOMElement;
use DOMNodeList;
use WebServCo\DocumentObjectModel\Contract\DOMNodeList\DOMNodeListServiceInterface;

final class DOMNodeListService implements DOMNodeListServiceInterface
{
    /**
     * Psalm/phpstan conflict.
     *
     * @psalm-suppress TooManyTemplateParams
     * @param \DOMNodeList<\DOMNode> $domNodeList
     */
    public function getFirstDOMElementFromDOMNodeList(DOMNodeList $domNodeList): ?DOMElement
    {
        /**
         * `DOMNodeList::item` officially returns DOMNode,
         * however it actually returns DOMElement.
         * https://www.php.net/manual/en/class.domnodelist.php
         */
        $domElement = $domNodeList->item(0);
        if (!$domElement instanceof DOMElement) {
            /**
             * No element at that index.
             * There was probably a problem retrieving the node list by query
             * (element not found).
             * Return null instead of throwing exception
             * as it seems it's common for nodes to be missing if there is no data.
             */
            return null;
        }

        return $domElement;
    }
}
