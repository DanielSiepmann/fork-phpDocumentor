<?php
declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2018 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\DomainModel;

use Webmozart\Assert\Assert;

/**
 * Value Object for paths.
 * This can be absolute or relative.
 */
final class Path
{
    /** @var string */
    private $path;

    /**
     * Initializes the path.
     */
    public function __construct(string $path)
    {
        Assert::stringNotEmpty($path);

        $this->path = $path;
    }

    /**
     * Verifies if another Path object has the same identity as this one.
     */
    public function equals(self $otherPath): bool
    {
        return $this->path === (string) $otherPath;
    }

    /**
     * returns a string representation of the path.
     */
    public function __toString(): string
    {
        return $this->path;
    }
}
