# yii2-device-detect

Yii2 extension for [CrawlerDetect](https://github.com/JayBizzle/Crawler-Detect) library.

To use it just require this extension in your `composer.json` file:

~~~
"alikdex/yii2-crawler-detect": "1.0",
~~~

And then add it to your components configuration in Yii2:

~~~php
'bootstrap' => ['crawlerdetect'],
'components' => [
	'crawlerdetect' => [
		'class' => 'alikdex\crawlerdetect\CrawlerDetect',
		'setParams' => true, // optional, bootstrap initialize requred
	],
]
~~~

Some basic detections are available in Yii's `params`:

~~~php
var_dump(Yii::$app->params['isCrawler']);

// bool(false)
~~~

You can also use it from anywhere in your code, calling Crawler-Detect's API:

~~~php
\Yii::$app->crawlerdetect->isCrawler;

/*Check all available methods here: https://github.com/JayBizzle/Crawler-Detect */
~~~
