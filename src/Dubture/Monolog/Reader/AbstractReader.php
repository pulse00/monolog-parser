<?php

/*
 * This file is part of the monolog-parser package.
 *
 * (c) Robert Gruendler <r.gruendler@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dubture\Monolog\Reader;

use Dubture\Monolog\Parser\LineLogParser;

/**
 * @author Robert Gruendler <r.gruendler@gmail.com>
 */
class AbstractReader
{
    protected $defaultParserPattern;
    
    /**
     * Constructor
     * @param string $defaultParserPattern
     */
    public function __construct($defaultParserPattern)
    {
        $this->defaultParserPattern = $defaultParserPattern;
    }
    
    /**
     * @return \Dubture\Monolog\Parser\LineLogParser
     */
    protected function getDefaultParser()
    {
        return new LineLogParser($this->defaultParserPattern);
    }
}
