<?php

namespace common\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "investitions_type".
 *
 * @property int $id
 * @property string $name
 * @property int $investition_id
 * @property Investition[] $investitions
 * @property Investition $investition
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','description'], 'required'],
            [['investition_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'investition_id' => 'Investition ID',
            'description' => 'Description',
        ];
    }

    public function getInvestitions(){
        return $this->hasMany(Investition::className(), ['type_id' => 'id']);
    }

 public function getInvestition(){
        return $this->hasOne(Investition::className(), ['type_id' => 'id']);
    }

    public static function getInvestitionsByType($id)
    {
        // build a DB query to get all articles
        $query = Investition::find()->where(['type_id'=>$id]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $type_pages = new Pagination(['totalCount' => $count, 'pageSize'=>6]);

        // limit the query using the pagination and retrieve the articles
        $investitions = $query->offset($type_pages->offset)
            ->limit($type_pages->limit)
            ->all();

        $data['investitions'] = $investitions;
        $data['type_pages'] = $type_pages;

        return $data;
    }

    public static function getAll()
    {
        return Type::find()->all();
    }
}
