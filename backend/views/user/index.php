<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'username',
            ['attribute'=>'id',
                'contentOptions'=>['width'=>'30px'],
            ],
            ['attribute'=>'username',
                'contentOptions'=>['width'=>'200px'],
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
//            'email:email',
            ['attribute'=>'email',
                'contentOptions'=>['width'=>'200px'],
            ],
            'mobile',
            // 'status',
            [
                'attribute' => 'status',
                'value' => 'statusStr',
                'filter' => \common\models\User::allStatus(),
            ],
            // 'created_at',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
                'contentOptions'=>['width'=>'200px'],
            ],
            // 'updated_at',
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
                'contentOptions'=>['width'=>'200px'],
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {resetpwd}',
                'buttons'=>[
                    'resetpwd'=>function($url,$model,$key)
                    {
                        $options=[
                            'title'=>Yii::t('yii','重置密码'),
                            'aria-label'=>Yii::t('yii','重置密码'),
                            'data-pjax'=>'0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-lock"></span>',$url,$options);
                    },
                ],
            ],


        ],
    ]); ?>
</div>
