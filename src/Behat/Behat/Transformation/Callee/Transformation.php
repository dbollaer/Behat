<?php

namespace Behat\Behat\Transformation\Callee;

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Behat\Behat\Callee\Callee;
use Behat\Behat\Snippet\Util\Turnip;
use Behat\Behat\Transformation\TransformationInterface;

/**
 * Step transformation.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class Transformation extends Callee implements TransformationInterface
{
    /**
     * @var string
     */
    private $pattern;
    /**
     * @var string
     */
    private $regex;

    /**
     * Initializes transformation.
     *
     * @param string      $pattern
     * @param Callable    $callable
     * @param null|string $description
     */
    public function __construct($pattern, $callable, $description = null)
    {
        $this->pattern = $pattern;

        $this->regex = $pattern;
        // If it is a turnip pattern - transform it to regex
        if ('/' !== substr($pattern, 0, 1)) {
            $this->regex = Turnip::turnipToRegex($pattern);
        }

        parent::__construct($callable, $description);
    }

    /**
     * Returns transformation pattern exactly as it was defined.
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Returns transformation regex.
     *
     * @return string
     */
    public function getRegex()
    {
        return $this->regex;
    }

    /**
     * Represents transformation as a string.
     *
     * @return string
     */
    public function toString()
    {
        return 'Transform ' . $this->getPattern();
    }
}
