<?php

namespace alikdex\crawlerdetect;

use Yii;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class CrawlerDetect extends \yii\base\Component
{

	private $_crawlerDetect;

	/**
	 *	@var bool seo bot detection result.
	 */
	private $_isCrawler = null;

	// Automatically set view parameters based on device type
	public $setParams = false;

	public function __call($name, $parameters) {
		return call_user_func_array(
			array($this->_crawlerDetect, $name),
			$parameters
		);
	}

	public function __construct($config = array()) {
		parent::__construct($config);
	}

	public function init() {
		$this->_crawlerDetect = new CrawlerDetect();
		parent::init();

		$this->_isCrawler = $this->_crawlerDetect->isCrawler();

		if ($this->setParams)
			Yii::$app->params['isCrawler'] = $this->_isCrawler;
	}

	/**
	 * Check seo bot.
	 */
	public function getIsCrawler()
	{
		if (null === $this->_isCrawler) {
			$this->_isCrawler = $this->_crawlerDetect->isCrawler();
		}

		return $this->_isCrawler;
	}
}
