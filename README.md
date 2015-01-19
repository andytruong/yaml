YAML [![Build Status](https://api.travis-ci.org/atphp/yaml.svg?branch=v0.1)](https://travis-ci.org/atphp/yaml) [![Latest Stable Version](https://poser.pugx.org/atphp/yaml/v/stable.png)](https://packagist.org/packages/atphp/yaml) [![Dependency Status](https://www.versioneye.com/php/atphp:yaml/0.1/badge.svg)](https://www.versioneye.com/php/atphp:yaml/0.1) [![License](https://poser.pugx.org/atphp/yaml/license.png)](https://packagist.org/packages/atphp/yaml)
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
