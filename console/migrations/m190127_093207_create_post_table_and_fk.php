<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m190127_093207_create_post_table_and_fk
 */
class m190127_093207_create_post_table_and_fk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'text' => $this->text(),
            'created_at' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()')),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->addForeignKey(
            'fk-post-author_id',
            'post',
            'author_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-post-author_id', 'post');

        $this->dropTable('post');
    }
}
