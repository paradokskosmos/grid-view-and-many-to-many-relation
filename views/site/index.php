<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
$this->title = 'test task';
?>
<div class="site-index">
<?= GridView::widget([
    'dataProvider' => $provider,
    'filterModel' => $model,
    'columns' => [
        'lastname',
        'position',
        [
         'label' => 'groups',
         'value' => function($model)
        {
            $names = '';
            foreach ($model->groups as $value)
            {
                 $names = $value->name_of_group ;
            }
            return $names;
        },
        ],
        [
         'label' => 'skills',
         'value' => function($model)
        {
            $names = '';
            foreach ($model->skills as $value)
            {
                 $names = $value->name_of_skill  ;
            }
            return $names;
        },
        ]
    ],
]);  
?>    
    
    
</div>
