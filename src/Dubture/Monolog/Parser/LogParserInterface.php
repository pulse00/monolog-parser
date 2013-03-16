<?php

/*
 * This file is part of the monolog-parser package.
 *
 * (c) Robert Gruendler <r.gruendler@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dubture\Monolog\Parser;

/**
 *
 * @author Robert Gruendler <r.gruendler@gmail.com>
 */
interface LogParserInterface
{
    /**
     * @param string $log
     */
    function parse($log);
}
