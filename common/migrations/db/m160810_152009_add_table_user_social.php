<?php

use yii\db\Migration;

class m160810_152009_add_table_user_social extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_social}}',
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(),
                'oauth_client' => $this->string(),
                'oauth_client_user_id' => $this->string(),
            ],
            $tableOptions
        );
        
        $this->addForeignKey('fk_user_social_user_id', '{{%user_social}}', 'user_id', '{{%user}}', 'id', 'cascade','cascade');

    }

    public function down()
    {
        $this->dropForeignKey('fk_user_social_user_id', '{{%user_social}}');
        $this->dropTable('{{%user_social}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
