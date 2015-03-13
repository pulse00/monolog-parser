<?php

/*
 * This file is part of the monolog-parser package.
 *
 * (c) Robert Gruendler <r.gruendler@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dubture\Monolog\Reader\Test;

use Dubture\Monolog\Parser\LineLogParser;

/**
 * Class ParserTest
 * @package Dubture\Monolog\Reader\Test
 */
class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testLineFormatter()
    {
        $parser = new LineLogParser();
        $log = $parser->parse('[2013-03-16 14:19:51] test.INFO: foobar {"foo":"bar"} []');

        $this->assertInstanceOf('\DateTime', $log['date']);
        $this->assertEquals('test', $log['logger']);
        $this->assertEquals('INFO', $log['level']);
        $this->assertEquals('foobar', $log['message']);
        $this->assertArrayHasKey('foo', $log['context']);

    }
}
