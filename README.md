Monolog Parser
==============

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