Monolog Parser
==============

[![Build Status](https://travis-ci.org/pulse00/monolog-parser.svg?branch=master)](https://travis-ci.org/pulse00/monolog-parser)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pulse00/monolog-parser/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pulse00/monolog-parser/?branch=master)

[![Latest Stable Version](https://poser.pugx.org/pulse00/monolog-parser/v/stable.svg)](https://packagist.org/packages/pulse00/monolog-parser) [![Total Downloads](https://poser.pugx.org/pulse00/monolog-parser/downloads.svg)](https://packagist.org/packages/pulse00/monolog-parser) [![Latest Unstable Version](https://poser.pugx.org/pulse00/monolog-parser/v/unstable.svg)](https://packagist.org/packages/pulse00/monolog-parser) [![License](https://poser.pugx.org/pulse00/monolog-parser/license.svg)](https://packagist.org/packages/pulse00/monolog-parser)


A simple library for parsing [monolog](https://github.com/Seldaek/monolog) logfiles.

## Installation

You can install the library using [composer]('http://getcomposer.org/) by adding  `pulse00/monolog-parser` to your `composer.json`.

## Usage

```php
require_once 'path/to/vendor/autoload.php';
  
use Dubture\Monolog\Reader\LogReader;
    
$logFile = '/path/to/some/monolog.log';
$reader = new LogReader($logFile);
   
foreach ($reader as $log) {
    echo sprintf("The log entry was written at %s. \n", $log['date']->format('Y-m-d h:i:s'));
}
    
$lastLine = $reader[count($reader)-1];
echo sprintf("The last log entry was written at %s. \n", $lastLine['date']->format('Y-m-d h:i:s'));

```
