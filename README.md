Yii::$app stubs generator for Yii 2
===================================

This extension provides no-more-butthurt components autocomplete generator command for Yii 2.

![in action](http://monosnap.com/image/vCnH1SWaXwKXLuchkutNGZXkeeoYWK.png)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist bazilio/yii2-stubs-generator
```

or add

```json
"bazilio/yii2-stubs-generator": "*"
```

to the require section of your composer.json.


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
php yii stubs console

# to generate stubs for several apps
php yii stubs console common frontend
```

File with stubs by default located in vendor directory.

Usage with PhpStorm
-------------------

1. Install `File Watchers` JetBrains plugin
2. Open `File Watchers` plugin config and import [watcher.xml](watcher.xml)
3. Edit imported watcher for your needs
4. Add scope for limit trigger to config files: ![](http://monosnap.com/image/I75MVnqdTuyH0LkYnYjIDcTnMege6I.png)
