# cologne-phonetic
[![Build Status](https://travis-ci.org/patrickschur/cologne-phonetic.svg?branch=master)](https://travis-ci.org/patrickschur/cologne-phonetic)
[![codecov](https://codecov.io/gh/patrickschur/cologne-phonetic/branch/master/graph/badge.svg)](https://codecov.io/gh/patrickschur/cologne-phonetic)
[![Version](https://img.shields.io/packagist/v/patrickschur/cologne-phonetic.svg?style=flat-square)](https://packagist.org/packages/patrickschur/cologne-phonetic)
[![Total Downloads](https://img.shields.io/packagist/dt/patrickschur/cologne-phonetic.svg?style=flat-square)](https://packagist.org/packages/patrickschur/cologne-phonetic)
[![Maintenance](https://img.shields.io/maintenance/yes/2017.svg?style=flat-square)](https://github.com/patrickschur/cologne-phonetic)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-FF.svg?style=flat-square)](http://php.net/)
[![License](https://img.shields.io/packagist/l/patrickschur/cologne-phonetic.svg?style=flat-square)](https://opensource.org/licenses/MIT)

Implementation of Cologne Phonetics (Kölner Phonetik) in PHP.

Install via Composer
-
```bash
$ composer require patrickschur/cologne-phonetic
```

Basic Usage
-
```php
use ColognePhonetic\ColognePhonetic;
 
$n = new ColognePhonetic;
 
echo $n->convert('Wikipedia'); // outputs "3412"
```