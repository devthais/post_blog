<?php

namespace app\controllers;

use yii\web\Controller;

class HelloController extends Controller
{
    // ...código existente...

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
}
