<?php

use yii\db\Migration;
use common\models\User;

/**
 * Class m190127_091614_add_users
 */
class m190127_091614_add_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'user1',
            'auth_key' => Yii::$app->security->generateRandomString(32),
            'password_hash' => Yii::$app->security->generatePasswordHash('user1'),
            'email' => 'user1@test.test',
            'status' => User::STATUS_ACTIVE
        ]);

        $this->insert('user', [
            'username' => 'user2',
            'auth_key' => Yii::$app->security->generateRandomString(32),
            'password_hash' => Yii::$app->security->generatePasswordHash('user2'),
            'email' => 'user2@test.test',
            'status' => User::STATUS_ACTIVE
        ]);

        $this->insert('user', [
            'username' => 'user3',
            'auth_key' => Yii::$app->security->generateRandomString(32),
            'password_hash' => Yii::$app->security->generatePasswordHash('user3'),
            'email' => 'user3@test.test',
            'status' => User::STATUS_ACTIVE
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'user3']);

        $this->delete('user', ['username' => 'user2']);

        $this->delete('user', ['username' => 'user1']);
    }
}
