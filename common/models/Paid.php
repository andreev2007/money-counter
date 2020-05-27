<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paid".
 *
 * @property int $id
 * @property int $price
 */
class Paid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [['price'], 'integer'],
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
        ];
    }
}
