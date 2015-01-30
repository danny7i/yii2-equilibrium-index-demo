<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex($array, $strict = '')
    {
//        var_dump([$array, $strict = '', Yii::$app->request]);
        $result = Yii::$app->equilibriumIndex->calculate(explode(',', $array), $strict == 'strict');
        return $this->render('index', ['result' => $result]);
    }
}
