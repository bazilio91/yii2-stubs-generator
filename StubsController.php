<?php

namespace bazilio\stubsgenerator;

use yii\console\Controller;
use yii\console\Exception;

class StubsController extends Controller
{
    public $outputFile = null;

    protected function getTemplate()
    {
        return <<<TPL
<?php
/**
 * Yii bootstrap file.
 *
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

require(__DIR__ . '/BaseYii.php');

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It extends from [[\yii\BaseYii]] which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of [[\yii\BaseYii]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */

class Yii extends \yii\BaseYii
{
    /**
     * @var BaseApplication|WebApplication|ConsoleApplication the application instance
     */
    public static \$app;
}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::\$classMap = require(__DIR__ . '/classes.php');
Yii::\$container = new yii\di\Container();

/** Created by Offout's fork of bazilio/yii2-stubs-generator */
/**{stubs}
 **/
abstract class BaseApplication extends yii\base\Application
{
}

/**{stubs}
 **/
class WebApplication extends yii\web\Application
{
}

/**{stubs}
 **/
class ConsoleApplication extends yii\console\Application
{
}
TPL;
    }

    public function actionIndex()
    {
        $path = \Yii::$app->getVendorPath().'/yiisoft/yii2/Yii.php';

        $components = [];

        foreach (\Yii::$app->requestedParams as $configPath) {
            if (!file_exists($configPath)) {
                throw new Exception('Config file doesn\'t exists: ' . $configPath);
            }

            $config = include($configPath);

            foreach ($config['components'] as $name => $component) {
                if (!isset($component['class'])) {
                    continue;
                }

                $components[$name][] = $component['class'];
            }
        }

        $stubs = '';
        foreach ($components as $name => $classes) {
            $classes = implode('|', array_unique($classes));
            $stubs .= "\n * @property {$classes} \$$name";
        }

        $content = str_replace('{stubs}', $stubs, $this->getTemplate());
        $content = str_replace('{time}', date(DATE_ISO8601), $content);

        if($content!=@file_get_contents($path)) {
            file_put_contents($path, $content);
        }
    }
}
