## Logger [![Build Status](https://travis-ci.org/mod/logger.png)](https://travis-ci.org/mod/logger)

A simple logger for PHP

## Usage

### Basic
	
```php
$logger = new Mod\Logger();
$logger->debug('User->%s is logged with params: %s', $username, $params);
// 2013-05-02 13:11:00 - s3f9da -   debug  - User->hfcorriez is logged with params: return=/status
$logger->info('User->:username login to homepage', array(':username' => $username))
// 2013-05-02 13:11:00 - s3f9da -   info   - User->hfcorriez login to homepage
```

### Config

```php
$logger = new Mod\Logger(array(
    'level' => 'info',
    'file'  => '/tmp/app.log'
));
```

### Format

```php
$logger = new Mod\Logger(array(
	'format' => ':time - :level - :text'
));
```

Custom params

```php
$logger = new Mod\Logger(array(
	'format' => ':time - :level - :file - :text'
));
$logger->file = __FILE__;
$logger->info('Some info');	// 2013-05-02 13:11:00 - info - /home/hfcorriez/myfile.php - Some info
```

### Handler

Internal handler

```php
$logger = new Mod\Logger();
$logger->add('debug', new Mod\Logger\Console());
```

Custom handler

```php
class YourCustomHanlder extends Mod\LoggerInterface
{
    public function write()
    {
        if (empty($this->messages)) return;

        $message = join("\n", $this->buildAll()) . "\n";
        
        mail('your@exapmle.com', 'Some error logs', $message);
    }
}

$logger = new Mod\Logger();
$logger->add('error', new YourCustomHanlder());
```

### Events

```php
$logger = new Mod\Logger();
$logger->on('flush', function() {
    // Some thing before the flush
});
```

## License

(The MIT License)

Copyright (c) 2012 hfcorriez &lt;hfcorriez@gmail.com&gt;

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.