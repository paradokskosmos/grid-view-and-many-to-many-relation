<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property integer $position
 * @property string $email
 *
 * @property GroupsOfEmployee[] $groupsOfEmployees
 * @property SkillsOfEmployee[] $skillsOfEmployees
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'email'], 'required'],
            [['position'], 'integer'],
            [['firstname', 'lastname'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'position' => 'Position',
            'email' => 'Email',
        ];
    }
//public function getGroups()
//{
// return $this->hasMany(Groups::className(), ['id' => 'group_id'])
// ->viaTable('groups_of_employee', ['employee_id' => 'id']);
//}
    public function getGroupsOfEmployee()
    {
        return $this->hasMany(GroupsOfEmployee::className(), ['group_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['id' => 'employee_id'])->via('groupsOfEmployee');
                //->viaTable('groups_of_employee', ['group_id' => 'id']);
    }

   
    
    
    ////
    public function getSkillsOfEmployee()
    {
        return $this->hasMany(SkillsOfEmployee::className(), ['skill_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skills::className(), ['id' => 'employee_id'])->via('skillsOfEmployee');
                //->viaTable('groups_of_employee', ['group_id' => 'id']);
    }
}
