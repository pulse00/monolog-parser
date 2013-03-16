Monolog Parser
==============

A simple library for parsing [monolog](https://github.com/Seldaek/monolog) logfiles.

## Installation

You can install the library using [composer]('http://getcomposer.org/) by adding  `pulse00/monolog-parser` to your `composer.json`.

## Usage

```php
    require_once 'path/to/vendor/autoload.php';
    
    use Dubture\Monolog\Reader\LogReader;
    $reader = new LogReader($file);
    
    foreach ($reader as $log) {
        echo sprintf("The log entry was written at %s. \n", $log['date']->format('Y-m-d h:i:s'));
    }

```