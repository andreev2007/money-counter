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
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
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

    public function getJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'job_id']);
    }

    public function saveJob($job_id)
    {
        $job = Job::findOne($job_id);
        if ($job != null) {
            $this->link('job', $job);
            return true;
        }
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getRecent()
    {
        return Counter::find()->orderBy(['date' => SORT_DESC])->limit(4)->all();
    }

    public static function getRecentPagination()
    {
        return Counter::find()->orderBy(['date' => SORT_DESC])->limit(4)->all();
    }

    public static function getAll()
    {
        $query = Counter::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 6]);

        $counters = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['counters'] = $counters;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function colorsSet()
    {
        return [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(70, 130, 180)',
            'rgba(218, 165, 32)',
            'rgba(165, 42, 42)',
            'rgba(255, 0, 255)',
            'rgba(255, 255, 0)',
            'rgba(139, 69, 19)',
            'rgba(255, 218, 185)',
        ];
    }

    public static function getProgramDataChart()
    {

        $data = $dataset = [];
        $labels = [];
        $models = self::getPriceByJobs();
        foreach ($models as $key => $model) {
            $labels[] = $key;
        }
        $data['labels'] = $labels;
        $dataset['label'] = 'Programming money';
        $dataset['backgroundColor'] = self::colorsSet();
        $dataset['borderColor'] = self::colorsSet();
        $dataset['data'] = [];
        foreach ($models as $model) {
            $dataset['data'][] = $model;
        }
        $data['datasets'] = [$dataset];
        return $data;
    }

    public static function getPriceByJobs() {
        $data = [];
        foreach (Counter::find()->with('job')->all() as $coun) {
            $data[$coun->job->title] = ($data[$coun->job->title]??0)+ $coun->price;
        }
        return $data;
    }

}
