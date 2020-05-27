<?php

namespace frontend\controllers;

use common\models\Bought;
use common\models\Counter;
use common\models\Goal;
use common\models\Job;
use common\models\Paid;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class CounterController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $data = Counter::getAll(5);
        $recent = Counter::getRecent();
        $jobs = Job::getAll();
        $goals = Goal::find()->all();
        $boughts = Bought::find()->all();
        $paids = Paid::find()->all();

        return $this->render('index',[
            'paids' => $paids,
            'boughts' => $boughts,
            'goals' => $goals,
            'counters'=>$data['counters'],
            'pagination'=>$data['pagination'],
            'recent'=>$recent,
            'jobs'=>$jobs
        ]);
    }


    public function actionSpend()
    {
        $data = Counter::getAll(5);
        $recent = Counter::getRecent();
        $jobs = Job::getAll();
        $goals = Goal::find()->all();
        $boughts = Bought::find()->all();
        $paids = Paid::find()->all();

        return $this->render('spend',[
            'paids' => $paids,
            'boughts' => $boughts,
            'goals' => $goals,
            'counters'=>$data['counters'],
            'pagination'=>$data['pagination'],
            'recent'=>$recent,
            'jobs'=>$jobs
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Counter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionView($id)
    {
        $counter = Counter::findOne($id);
        $recent = Counter::getRecent();
        $jobs = Job::getAll();
        $goals = Goal::find()->all();

        return $this->render('view',[
            'goals' => $goals,
            'counter'=>$counter,
            'recent'=>$recent,
            'jobs'=>$jobs,
        ]);
    }


}
