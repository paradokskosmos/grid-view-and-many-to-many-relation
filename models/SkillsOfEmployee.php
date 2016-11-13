<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skills_of_employee".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property integer $skill_id
 *
 * @property Employee $employee
 * @property Skills $skill
 */
class SkillsOfEmployee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills_of_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'skill_id'], 'required'],
            [['employee_id', 'skill_id'], 'integer'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['skill_id'], 'exist', 'skipOnError' => true, 'targetClass' => Skills::className(), 'targetAttribute' => ['skill_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'skill_id' => 'Skill ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasMany(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasMany(Skills::className(), ['id' => 'skill_id']);
    }
}
