<?php

namespace common\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property int $counter_id
 * @property string $title
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','description'], 'required'],
            [['counter_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'counter_id' => 'Counter ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    public function getCounter(){
        return $this->hasMany(Counter::className(), ['counter_id' => 'id']);
    }

    public function getCounterCount(){
        return $this->getCounter()->count();
    }

    public static function getCounterByJob($id)
    {
        // build a DB query to get all articles
        $query = Counter::find()->where(['job_id'=>$id]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>6]);

        // limit the query using the pagination and retrieve the articles
        $counters = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['counters'] = $counters;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getAll()
    {
        return Job::find()->all();
    }

}
