Yii::$app stubs generator for Yii 2
===================================
[![Latest Stable Version](https://poser.pugx.org/bazilio/yii2-stubs-generator/v/stable)](https://packagist.org/packages/bazilio/yii2-stubs-generator) 
[![Total Downloads](https://poser.pugx.org/bazilio/yii2-stubs-generator/downloads)](https://packagist.org/packages/bazilio/yii2-stubs-generator) 
[![Latest Unstable Version](https://poser.pugx.org/bazilio/yii2-stubs-generator/v/unstable)](https://packagist.org/packages/bazilio/yii2-stubs-generator) 
[![License](https://poser.pugx.org/bazilio/yii2-stubs-generator/license)](https://packagist.org/packages/bazilio/yii2-stubs-generator)

This extension provides no-more-butthurt components autocomplete generator command for Yii 2.

![in action](https://monosnap.com/file/oHUjBSw7oIJHYAEpQKs4mVVJLfMLrM.png)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --dev --prefer-dist bazilio/yii2-stubs-generator
```

or add

```json
"bazilio/yii2-stubs-generator": "~1"
```

to the `require-dev` section of your `composer.json`.


Usage
-----

To use this extension, simply add the following code in your application configuration (console.php):

```php
'controllerMap' => [
    'stubs' => [
        'class' => 'bazilio\stubsgenerator\StubsController',
    ],
],
```

```
# generate stubs for console application
php yii stubs console/config/main.php

# to generate stubs for several apps
php yii stubs console/config/main.php common/config/main.php frontend/config/main.php
```

File with stubs by default located in vendor directory.

Usage with PhpStorm
-------------------

1. Install `File Watchers` JetBrains plugin
2. Open `File Watchers` plugin config and import [watcher.xml](watcher.xml)
3. Edit imported watcher for your needs
4. Add scope to limit trigger to config files: ![](https://monosnap.com/file/9UdEAsZUxO6XcOxINgm1sucWxuuYu4.png)
