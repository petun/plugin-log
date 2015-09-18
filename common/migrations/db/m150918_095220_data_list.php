<?php

use yii\db\Migration;

class m150918_095220_data_list extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%data_list}}', [
			'id' => $this->primaryKey(),
			'type' => $this->string(45)->notNull(),
			'name' => $this->string(255)->notNull(),
			'position' => $this->integer()->defaultValue(0),
		], $tableOptions);
	}

	public function down()
	{
		$this->dropTable('{{%data_list}}');
	}
}
