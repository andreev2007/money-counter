<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bought".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 */
class Bought extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bought';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['price'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'price' => 'Price',
            'date' => 'Date',
        ];
    }

    public function getDate(){
        return Yii::$app->formatter->asDate($this->date);
    }
}
