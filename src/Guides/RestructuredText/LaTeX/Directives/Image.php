<?php

declare(strict_types=1);

namespace phpDocumentor\Guides\RestructuredText\LaTeX\Directives;

use phpDocumentor\Guides\RestructuredText\Directives\Directive;
use phpDocumentor\Guides\RestructuredText\Nodes\Node;
use phpDocumentor\Guides\RestructuredText\Parser;
use Exception;
use function sprintf;

/**
 * Renders an image, example :
 *
 * .. image:: image.jpg
 *      :width: 100
 *      :title: An image
 */
class Image extends Directive
{
    public function getName() : string
    {
        return 'image';
    }

    /**
     * @param string[] $options
     */
    public function processNode(
        Parser $parser,
        string $variable,
        string $data,
        array $options
    ) : ?Node {
        $environment = $parser->getEnvironment();

        $url = $environment->relativeUrl($data);

        if ($url === null) {
            throw new Exception(sprintf('Could not build relative url for %s', $data));
        }

        return $parser->getNodeFactory()->createImageNode($url, $options);
    }
}
