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

use Dubture\Monolog\Reader\AbstractReader;

/**
 * @author Robert Gruendler <r.gruendler@gmail.com>
 */
class LogReader extends AbstractReader implements \Iterator, \ArrayAccess
{
    /**
     * @var \SplFileObject
     */
    protected $file;

    /**
     * @var integer
     */
    protected $lineCount;

    /**
     * @var integer
     */
    protected $key;

    /**
     * @var \Dubture\Monolog\Parser\LogParserInterface
     */
    protected $parser;

    /**
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = new \SplFileObject($file, 'r');
        $i = 0;
        while (!$this->file->eof()) {
            $this->file->current();
            $this->file->next();
            $i++;
        }

        $this->lineCount = $i;
        $this->key = 0;
        $this->parser = $this->getDefaultParser();
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->lineCount < $offset;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        $this->file->seek($offset);
        $this->key = $offset;
        return $this->parser->parse($this->file->current());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->key = 0;
        $this->file->rewind();
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->file->next();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->parser->parse($this->file->current());
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        $this->key++;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->file->valid();
    }
}
