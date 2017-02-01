<?php

use yii\db\Migration;

/**
 * Handles the creation of table `worker_log`.
 */
class m170201_193746_create_worker_log_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('worker_log', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('NOW()')->comment('Дата создания'),
            'command' => $this->string(255)->notNull()->comment('Команда'),
            'params' => 'JSON',
            'response' => 'JSON',
            'status' => $this->string(255)->notNull()->comment('Статус'),
            'generation_time' => $this->float()->comment('Время выполнения'),
            'error_details' => 'JSON'
        ]);

        $this->addCommentOnColumn('worker_log', 'params', 'Параметры');
        $this->addCommentOnColumn('worker_log', 'response', 'Ответ');
        $this->addCommentOnColumn('worker_log', 'error_details', 'Детали ошибки');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('worker_log');
    }
}
