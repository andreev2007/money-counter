<?php

namespace frontend\controllers;

use common\models\Bought;
use common\models\Counter;
use common\models\Goal;
use common\models\Investition;
use common\models\Job;
use common\models\Paid;
use common\models\Type;
use common\models\User;
use Yii;
use yii\data\Pagination;
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

    public function actionMon()
    {
        $data = Counter::getAll(5);
        $recent = Counter::getRecent();
        $jobs = Job::getAll();
        $goals = Goal::find()->all();
        $boughts = Bought::find()->all();
        $paids = Paid::find()->all();

        return $this->render('mon', [
            'paids' => $paids,
            'boughts' => $boughts,
            'goals' => $goals,
            'counters' => $data['counters'],
            'pagination' => $data['pagination'],
            'recent' => $recent,
            'jobs' => $jobs
        ]);
    }

    public function actionInvestition()
    {
        $data = Investition::getAll();
        $recentInvest = Investition::getRecent();
        $jobs = Job::getAll();
        $goals = Goal::find()->all();
        $boughts = Bought::find()->all();
        $paids = Paid::find()->all();
        $query = Investition::find();
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 5]);

        $invests = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('investition', [
            'paids' => $paids,
            'boughts' => $boughts,
            'invests' => $invests,
            'goals' => $goals,
            'pagination' => $data['pagination'],
            'recentInvest' => $recentInvest,
            'jobs' => $jobs,
            'pages' => $pages
        ]);
    }

    public function actionCharacteristics()
    {
        $data = Investition::getAll();
        $recentInvest = Investition::getRecent();
        $jobs = Job::getAll();
        $goals = Goal::find()->all();
        $boughts = Bought::find()->all();
        $paids = Paid::find()->all();
        $invests = Investition::find()->all();

        return $this->render('characteristics', [
            'paids' => $paids,
            'boughts' => $boughts,
            'invests' => $invests,
            'goals' => $goals,
            'pagination' => $data['pagination'],
            'recentInvest' => $recentInvest,
            'jobs' => $jobs
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

        return $this->render('spend', [
            'paids' => $paids,
            'boughts' => $boughts,
            'goals' => $goals,
            'counters' => $data['counters'],
            'pagination' => $data['pagination'],
            'recent' => $recent,
            'jobs' => $jobs
        ]);
    }

    public function actionIndex()
    {
        return $this->render('home', [
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Counter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionType($id)
    {
        $type = Type::findOne($id);
        $recentInvest = Investition::getRecent();
        $data = Type::getInvestitionsByType($id);

        return $this->render('type', [
            'investitions' => $data['investitions'],
            'recentInvest' => $recentInvest,
            'type' => $type,
        ]);
    }
    
    public function actionTypes()
    {
        $types = Type::find()->all();
        $recentInvest = Investition::getRecent();
        return $this->render('types', [
            'recentInvest' => $recentInvest,
            'types' => $types,
        ]);

    }
}
