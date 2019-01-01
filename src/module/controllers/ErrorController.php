<?php

namespace yii2module\error\module\controllers;

use yii\web\Controller;

/**
 * Error controller
 */
class ErrorController extends Controller
{

	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii2module\error\module\actions\ErrorAction',
			],
		];
	}
	
}
