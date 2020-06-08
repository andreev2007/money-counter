<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "investitions_type".
 *
 * @property int $id
 * @property string $name
 * @property int $investition_id
 */
class InvestitionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investition_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'investition_id'], 'required'],
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
        ];
    }

    public function getInvestition(){
        return $this->hasMany(Investition::className(), ['investition_type_id' => 'id']);
    }
}
