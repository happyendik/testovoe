<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Post
 * @package common\models
 */
class Post extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['author_id', 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],
            ['text', 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'Автор',
            'text' => 'Текст'
        ];
    }
}