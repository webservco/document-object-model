<?php

declare(strict_types=1);

namespace WebServCo\DocumentObjectModel\Service\DOMDocument;

use DOMDocument;
use DOMElement;
use UnexpectedValueException;
use WebServCo\DocumentObjectModel\Contract\DOMDocument\DOMDocumentServiceInterface;

final class DOMDocumentService implements DOMDocumentServiceInterface
{
    public function createDOMDocumentFromDOMElement(DOMElement $domElement): DOMDocument
    {
        $domDocument = new DOMDocument();
        $domDocument->preserveWhiteSpace = false;
        $domDocument->formatOutput = true;
        /**
         * Note: without "importNode" in some situation an exception is thrown: "Wrong Document Error".
         * Seems the error happens if the method is called from an outside class,
         * for example `FileNodesProcessor` that iterates the source data file.
         */
        $domNode = $domDocument->importNode($domElement, true);
        if ($domNode === false) {
            throw new UnexpectedValueException('Invalid instance.');
        }
        $domDocument->appendChild($domNode);

        return $domDocument;
    }
}
