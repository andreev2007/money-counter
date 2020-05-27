<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $goal_id
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['goal_id'], 'integer'],
            [['title'], 'required'],
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
            'goal_id' => 'Goal ID',
            'title' => 'Title',
        ];
    }

    public function getGoals(){
        return $this->hasMany(Goal::className(), ['category_id' => 'id']);
    }

    public function getArticlesCount(){
        return $this->getGoals()->count();
    }

}
