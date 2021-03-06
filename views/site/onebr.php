<?php

$this->title = 'Real Estate Pro';
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\helpers\Html;

?>

<div class="panel panel-danger">
            <div class="panel-heading">One Bedrooms</div>
            <div class="panel-body">
	     <div class="row">
                  <?php 
                    $dataProvider = new ActiveDataProvider([
                         'query' => \app\models\Property::find()->where(['property_type'=>3]),
                        'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
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