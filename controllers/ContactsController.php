<?php

namespace app\controllers;

use app\components\MainController;

class ContactsController extends MainController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
