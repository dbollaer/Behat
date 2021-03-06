<?php

namespace Behat\Behat\Definition\Callee;

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Behat\Behat\Definition\Callee\Definition;

/**
 * "Given" definition.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class Given extends Definition
{
    /**
     * Initializes definition.
     *
     * @param string      $pattern
     * @param Callable    $callback
     * @param null|string $description
     */
    public function __construct($pattern, $callback, $description = null)
    {
        parent::__construct('Given', $pattern, $callback, $description);
    }
}
