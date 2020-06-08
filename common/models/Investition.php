<?php

namespace common\models;

use Yii;
use common\models\Type;
use yii\data\Pagination;

/**
 * This is the model class for table "goal".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $category_id
 * @property string $date
 * @property int $is_done
 * @property \common\models\Type type
 */

class Investition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investition';
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

    public static function getDataChart()
    {

        $data = $dataset = [];
        $labels = [];
        $models = self::getPriceByTypes();
        foreach ($models as $key => $model) {
            $labels[] = $key;
        }
        $data['labels'] = $labels;
        $dataset['label'] = 'Stock market money';
        $dataset['backgroundColor'] = self::colorsSet();
        $dataset['borderColor'] = self::colorsSet();
        $dataset['data'] = [];
        foreach ($models as $model) {
            $dataset['data'][] = $model;
        }
        $data['datasets'] = [$dataset];
        return $data;
    }

    public static function getPriceByTypes() {
        $data = [];
        foreach (Investition::find()->with('type')->all() as $inv) {
            $data[$inv->type->name] = ($data[$inv->type->name]??0)+ $inv->got_money / 100 / 100 * 50;
        }
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'bought','sold'], 'required'],
            [['bought', 'sold', 'price', 'got_money','type_id'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'bought' => 'Bought',
            'sold' => 'Sold',
            'price' => 'Price',
            'type_id' => 'Type ID',
            'date' => 'Date',
            'got_money' => 'Got Money',
        ];
    }


    public function getDate(){
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getRecent(){
        return Investition::find()->orderBy(['date' => SORT_DESC])->limit(4)->all();
    }

    public static function getAll(){
        $query = Investition::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 1]);

        $invests = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['invests'] = $invests;
        $data['pagination'] = $pagination;

        return $data;
    }

    public function getType(){
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    public function saveType($type_id)
    {
        $type = Type::findOne($type_id);
        if($type != null)
        {
            $this->link('type', $type);
            return true;
        }
    }
}
