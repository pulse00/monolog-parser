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

use Dubture\Monolog\Reader\LogReader;
use PHPUnit;

/**
 * Class LogReaderTest
 * @package Dubture\Monolog\Reader\Test
 */
class LogReaderTest extends PHPUnit\Framework\TestCase
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

    public function testIterator()
    {
        // the test.log file contains 2 log lines
        $file = __DIR__ . '/../../../../files/test.log';
        $reader = new LogReader($file);
        $lines = array();
        $keys = array();

        $this->assertTrue($reader->offsetExists(0));
        $this->assertTrue($reader->offsetExists(1));

        $this->assertFalse($reader->offsetExists(2));
        $this->assertFalse($reader->offsetExists(3));

        $this->assertEquals(2, count($reader));

        foreach ($reader as $i => $log) {
            $test = $reader[0];
            $lines[] = $log;
            $keys[] = $i;
        }

        $this->assertEquals(array(0, 1), $keys);
        $this->assertEquals('test', $lines[0]['logger']);
        $this->assertEquals('aha', $lines[1]['logger']);

    }

    /**
     * @expectedException RuntimeException
     */
    public function testException()
    {
        $file = __DIR__ . '/../../../../files/test.log';
        $reader = new LogReader($file);
        $reader[5] = 'foo';

    }
}
