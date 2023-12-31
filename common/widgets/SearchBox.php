<?php

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class SearchBox extends Widget
{
    public $targetId;

    public function init()
    {           
        parent::init();
    }

    public function run()
    {
        return $this->render('search-box', [
            'targetId' => $this->targetId,
        ]);
    }
}
