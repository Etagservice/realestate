<?php

$this->title = 'Real Estate Pro';
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\helpers\Html;

?>

<div class="panel panel-danger">
    
            <div class="panel-body">
                <h2>Shambas for SALE </h2>
                <div class="row">
                    <?php 
                    $dataProvider = new ActiveDataProvider([
                         'query' => \app\models\Property::find(),
                     ]);
                    $dataProvider->pagination->pageSize=12;
                   echo  ListView::widget([
                             'dataProvider' => $dataProvider,
                             'itemOptions' => ['class' => 'item col-lg-3'],
                             'itemView' => function ($model, $key, $index, $widget) {
                                     return $model->propertyPost();
                             },
                     ]); 
                ?>     
                </div>
            </div>
        
            
        </div>

