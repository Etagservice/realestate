<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "re_term".
 *
 * @property integer $id
 * @property integer $term_type
 * @property string $term_name
 * @property string $term_desc
 * @property integer $_status
 * @property string $date_created
 * @property integer $created_by
 * @property string $date_modified
 * @property integer $modified_by
 *
 * @property PropertyTerm[] $propertyTerms
 * @property Lookup $termType
 */
class Term extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 're_term';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['term_type', '_status', 'created_by', 'modified_by'], 'integer'],
            [['term_desc'], 'string'],
            [['date_created', 'date_modified'], 'safe'],
            [['term_name'], 'string', 'max' => 200],
            [['term_type'], 'exist', 'skipOnError' => true, 'targetClass' => Lookup::className(), 'targetAttribute' => ['term_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'term_type' => 'Term Type',
            'term_name' => 'Term Name',
            'term_desc' => 'Term Desc',
            '_status' => 'Status',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
            'date_modified' => 'Date Modified',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertyTerms()
    {
        return $this->hasMany(PropertyTerm::className(), ['fk_term_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTermType()
    {
        return $this->hasOne(Lookup::className(), ['id' => 'term_type']);
    }
}
