<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Post;
use common\models\User;

/* @var $this yii\web\View */

$this->title = 'Статьи';

$this->params['header'] = $this->title;
$this->params['breadcrumbs'] = [$this->title];

    echo Html::a(
        '<i class="fa fa-plus-circle"></i> Создать', Url::to(['post/create']),
        ['class' => 'gridview-create-btn btn btn-success']
    )

?>
<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
//                [
//                    'headerOptions' => [
//                        'width' => 50,
//                    ],
//                    'class' => CheckboxColumn::class,
//                ],
                [
                    'attribute' => 'author_id',
                    'value' => function (Post $model) {
                        $author = User::findOne(['id' => $model->author_id]);
                        return $author->username;
                    }
                ],
                [
                    'attribute' => 'text',
                    'value' => function (Post $model) {
                        return substr($model->text, 0 ,100);
                    }
                ],
                'created_at',
                'updated_at',
                [
                    'class' => \yii\grid\ActionColumn::class,
                    'template' => '{update} {delete}',
                    'visibleButtons'=> [
                        'update' => function ($model) {
                            return $model->author_id === Yii::$app->user->id;
                        },
                        'delete' => function ($model) {
                            return $model->author_id === Yii::$app->user->id;
                        },
                    ]
                ]
            ],
        ])?>
    </div>
</div>
