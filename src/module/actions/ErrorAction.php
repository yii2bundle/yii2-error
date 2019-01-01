<?php

namespace yii2module\error\module\actions;

use yii2module\error\domain\helpers\MessageHelper;

class ErrorAction extends \yii\web\ErrorAction
{
	
	protected function getViewRenderParams()
	{
		return MessageHelper::get($this->exception);
	}
	
}
