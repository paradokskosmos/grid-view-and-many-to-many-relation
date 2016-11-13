<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string $name_of_group
 *
 * @property GroupsOfEmployee[] $groupsOfEmployees
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_of_group'], 'required'],
            [['name_of_group'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_of_group' => 'Name Of Group',
        ];
    }
     

    public function getGroupsOfEmployee()
    {
        return $this->hasMany(GroupsOfEmployee::className(), ['employee_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasMany(Employee::className(), ['id' => 'group_id'])->via('groupsOfEmployee');
                //->viaTable('groups_of_employee', ['employee_id' => 'id']);
    }
}
