<?php

namespace common\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "counter".
 *
 * @property int $id
 * @property int $price
 * @property int $hours
 * @property int $minutes
 * @property int $job_id
 * @property string $date
 */
class Counter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'counter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'hours', 'minutes'], 'required'],
            [['price', 'hours', 'minutes', 'job_id'], 'integer'],
            [['date'], 'safe'],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value'=> date('Y-m-d')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'hours' => 'Hours',
            'minutes' => 'Minutes',
            'date' => 'Date',
        ];
    }

    public function getJob(){
        return $this->hasOne(Job::className(), ['id' => 'job_id']);
    }

    public function saveJob($job_id)
    {
        $job = Job::findOne($job_id);
        if($job != null)
        {
            $this->link('job', $job);
            return true;
        }
    }

    public function getDate(){
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getRecent(){
        return Counter::find()->orderBy(['date' => SORT_DESC])->limit(4)->all();
    }

    public static function getAll(){
        $query = Counter::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 3]);

        $counters = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['counters'] = $counters;
        $data['pagination'] = $pagination;

        return $data;
    }

}
