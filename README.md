Common [![Build Status](https://api.travis-ci.org/andytruong/yaml.svg?branch=v0.1)](https://travis-ci.org/andytruong/yaml) [![Latest Stable Version](https://poser.pugx.org/andytruong/yaml/v/stable.png)](https://packagist.org/packages/andytruong/yaml) [![Dependency Status](https://www.versioneye.com/php/andytruong:yaml/2.3.0/badge.svg)](https://www.versioneye.com/php/andytruong:yaml/2.3.0) [![License](https://poser.pugx.org/andytruong/yaml/license.png)](https://packagist.org/packages/andytruong/yaml)
======

Simple wrapper for YAML extension, SpyC, Symfony YAML parser/dumper.

### Parser

```php
<?php
$parser = new \AndyTruong\Yaml\YamlParser();
$parser->parse($yaml_string);
```

### Dumper

```php
<?php
$parser = new \AndyTruong\Yaml\YamlDumper();
$parser->dump($php_array);
```
