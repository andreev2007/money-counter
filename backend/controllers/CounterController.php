<?php

namespace backend\controllers;

use Yii;
use common\models\Counter;
use common\models\Job;
use common\models\JobSearch;
use common\models\CounterSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CounterController implements the CRUD actions for Counter model.
 */
class CounterController extends Controller
{
    /**
     * {@inheritdoc}
     *
     */

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update','delete','create','view','set-job'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
        ];
    }

    /**
     * Lists all Counter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new CounterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSetJob($id){
        $this->layout = 'admin';
        $counter = $this->findModel($id);
        $selectedJob = $counter->job->id;
        $jobs = ArrayHelper::map(Job::find()->all() , 'id', 'title');

        if (Yii::$app->request->isPost){
            $job = Yii::$app->request->post('job');
            $counter->saveJob($job);
            return $this->redirect(['view', 'id' => $counter->id]);
        }

        return $this->render('job', [
            'counter' => $counter,
            'selectedJob' => $selectedJob,
            'jobs' => $jobs
        ]);
    }

    /**
     * Displays a single Counter model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Counter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Counter();
        $this->layout = 'admin';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Counter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->layout = 'admin';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Counter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = 'admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Counter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Counter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = "admin";
        if (($model = Counter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRole(){
//        $admin = Yii::$app->authManager->createRole('admin');
//        $admin->description = 'Big boss';
//        Yii::$app->authManager->add($admin);
//
//        $content = Yii::$app->authManager->createRole('content');
//        $content->description = 'Small manager';
//        Yii::$app->authManager->add($content);
//
//        $user = Yii::$app->authManager->createRole('user');
//        $user->description = 'Small person';
//        Yii::$app->authManager->add($user);
//
//        $ban = Yii::$app->authManager->createRole('banned');
//        $ban->description = 'Shit';
//        Yii::$app->authManager->add($ban);
//        $permit = Yii::$app->authManager->createPermission('canAdmin');
//        $permit->description = 'Go in adminka';
//        Yii::$app->authManager->add($permit);

//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_c = Yii::$app->authManager->getRole('content');
//        $permit = Yii::$app->authManager->getPermission('canAdmin');
//        Yii::$app->authManager->addChild($role_a, $permit);
//        Yii::$app->authManager->addChild($role_c, $permit);
//
//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, 1);
        return 1213;
    }
}
