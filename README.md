# webservco/document-object-model

A PHP component/library. Please see [webservco/sandbox](https://webservco.github.io/sandbox/) for an example project using these types of components.

Typed helpers around PHP's DOM classes, for parsing XML and HTML without an instanceof check after every XPath query.

- Requires: `ext-dom`

---

## Installation

```shell
composer require webservco/document-object-model
```

---

## Usage

```php
use WebServCo\DocumentObjectModel\Container\DOMServiceContainer;

$domDocument = new DOMDocument();
$domDocument->loadXML($xml);
$domXPath = new DOMXPath($domDocument);

// \WebServCo\DocumentObjectModel\Contract\Container\DOMServiceContainerInterface
$domServiceContainer = new DOMServiceContainer();

foreach ($domServiceContainer->getDOMXPathService()->iterateDOMElementsFromDOMXPath($domXPath, '//release') as $release) {
    // ?DOMElement: null when the release has no <title>.
    $title = $domServiceContainer->getDOMElementService()->getDOMElementFromDOMElementByTagName($release, 'title');
}

// ?DOMElement
$firstArtist = $domServiceContainer->getDOMXPathService()->getFirstDOMElementFromDOMXPath($domXPath, '//artist');
```

---

## Contracts

| Interface | Implementation | Purpose |
| --- | --- | --- |
| `Contract\Container\DOMServiceContainerInterface` | `Container\DOMServiceContainer` | Gives access to the services below. |
| `Contract\DOMXPath\DOMXPathServiceInterface` | `Service\DOMXPath\DOMXPathService` | First element, or a generator of elements, for a query. |
| `Contract\DOMElement\DOMElementServiceInterface` | `Service\DOMElement\DOMElementService` | First child element with a tag name. |
| `Contract\DOMNodeList\DOMNodeListServiceInterface` | `Service\DOMNodeList\DOMNodeListService` | First element of a node list. |
| `Contract\DOMDocument\DOMDocumentServiceInterface` | `Service\DOMDocument\DOMDocumentService` | Copies an element into a new document of its own. |

Namespaces are relative to `WebServCo\DocumentObjectModel\`.

---

## Notes

Methods that look for one element return `null` when nothing matches. An invalid XPath query throws an `UnexpectedValueException`. A query that matches text or attribute nodes gives `null` from the first-element methods, and makes `iterateDOMElementsFromDOMXPath()` throw. Write queries that select elements.

Appending a node that belongs to another document fails with "Wrong Document Error". `createDOMDocumentFromDOMElement()` imports the node first to get around that.

---

## Development

```shell
# Start project.
ddev start
# Install dependencies.
ddev c u
# Run all validations.
ddev c c
# Run unit tests.
ddev c test:dox
```

---

## License

[MIT](LICENSE.md)
