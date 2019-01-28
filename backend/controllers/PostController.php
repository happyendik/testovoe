<?php

namespace backend\controllers;

use common\models\Post;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * Class PostController
 * @package backend\controllers
 */
class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->author_id = Yii::$app->user->id;

            $model->save();
            $this->redirect('index');
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * @param integer $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();

            $this->redirect('index');
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * @param integer $id
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->delete();
        $this->redirect('index');
    }

    /**
     * @param integer $id
     * @return Post
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        $model = Post::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $model;
    }
}