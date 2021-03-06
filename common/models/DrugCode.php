<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "drug_code".
 *
 * @property integer $id
 * @property string $code
 * @property integer $created_at
 *
 * @property DrugCodeClinic $drugCodeClinic
 */
class DrugCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['created_at'], 'integer'],
            [['code'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'created_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugCodeClinic()
    {
        return $this->hasOne(DrugCodeClinic::className(), ['code' => 'code']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->created_at = time();
            return true;
        } else {
            return false;
        }
    }
}
