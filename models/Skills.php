<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skills".
 *
 * @property integer $id
 * @property string $name_of_skill
 *
 * @property SkillsOfEmployee[] $skillsOfEmployees
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_of_skill'], 'required'],
            [['name_of_skill'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_of_skill' => 'Name Of Skill',
        ];
    }

    public function getSkillsOfEmployee()
    {
        return $this->hasMany(SkillsOfEmployee::className(), ['employee_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasMany(Employee::className(), ['id' => 'skill_id'])->via('skillsOfEmployee');
                //->viaTable('groups_of_employee', ['employee_id' => 'id']);
    }
}
