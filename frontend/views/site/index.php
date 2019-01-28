<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Список постов!</h2>
    </div>

    <div class="body-content container">

        <div class="row">

            <?php foreach ($posts as $post) : ?>
                <div class="col-lg-12">

                    <?= $post->text ?>

                    <?php if ($post->author_id === Yii::$app->user->id) : ?>
                            <?= Html::a(
                                'Редактировать',
                                Yii::$app->backendUrlManager->createUrl(['post/update', 'id' => $post->id])
                            )?>
                    <?php endif; ?>

                    <hr>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>
