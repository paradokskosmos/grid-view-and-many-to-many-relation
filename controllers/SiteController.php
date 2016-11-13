<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Employee;
use yii\data\ActiveDataProvider;
use app\models\Groups;
use app\models\Skills;

class SiteController extends Controller
{ 
    public function actionIndex()
    {
        
        $model =  Employee::findOne(24);
         
//        $user = new Employee();
//        
//        $user->firstname = 'first11';
//        $user->lastname = 'last11';
//        $user->email = 'first@last.hi11';
//        $user->save();
//
//        $group = new Groups();
//        $group->name_of_group = 'crazy11';
//        $group->save();
        
//        $skill = new  Skills();
//        $skill->name_of_skill = 'infinity11';
//        $skill->save();
        
//
//        $group->link('employee', $user);
//        $skill->link('employee', $user);
        
        
        $provider = new ActiveDataProvider([
                'query' => Employee::find(),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
//$model = new Employee();       
 $model = $provider->getModels();
      return $this->render('index', ['provider' =>  $provider, 'model' => $model]);
 
    } 
}
