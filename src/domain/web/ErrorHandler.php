<?php

namespace yii2module\error\domain\web;

use yii2lab\extension\scenario\collections\ScenarioCollection;
use yii2lab\extension\scenario\helpers\ScenarioHelper;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2module\error\domain\helpers\UnProcessibleHelper;

class ErrorHandler extends \yii\web\ErrorHandler
{
	
	public $filters = [];
	
	protected function convertExceptionToArray($exception)
	{
		if ($exception instanceof UnprocessableEntityHttpException) {
			$errors = $exception->getErrors();
			return UnProcessibleHelper::assoc2indexed($errors);
		}
		$this->runFilters($exception);
		return parent::convertExceptionToArray($exception);
	}

	protected function renderException($exception) {
		$this->runFilters($exception);
		parent::renderException($exception);
	}
	
	private function runFilters(\Throwable $exception) {
		$filterCollection = new ScenarioCollection($this->filters);
		$filterCollection->runAll($exception);
	}
	
}
