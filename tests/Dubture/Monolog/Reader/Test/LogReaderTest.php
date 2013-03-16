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

use Dubture\Monolog\Reader\ReverseLogReader;
use Dubture\Monolog\Reader\LogReader;


/**
 * @author Robert Gruendler <r.gruendler@gmail.com>
 */
class LogReaderTest extends \PHPUnit_Framework_TestCase
{
    public function testReader()
    {
        $file = __DIR__ . '/../../../../files/test.log';
        $reader = new LogReader($file);

        $log = $reader[0];

        $this->assertInstanceOf('\DateTime', $log['date']);
        $this->assertEquals('test', $log['logger']);
        $this->assertEquals('INFO', $log['level']);
        $this->assertEquals('foobar', $log['message']);
        $this->assertArrayHasKey('foo', $log['context']);

        $log = $reader[1];

        $this->assertInstanceOf('\DateTime', $log['date']);
        $this->assertEquals('aha', $log['logger']);
        $this->assertEquals('DEBUG', $log['level']);
        $this->assertEquals('foobar', $log['message']);
        $this->assertArrayNotHasKey('foo', $log['context']);


    }
}
