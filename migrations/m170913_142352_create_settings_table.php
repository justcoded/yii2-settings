<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m170913_142352_create_settings_table extends Migration
{
	/**
	 * @inheritdoc
	 */
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci.
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('settings', [
			'section_name' => $this->string()->notNull(),
			'key' => $this->string()->notNull(),
			'value' => $this->binary(),
		], $tableOptions);
		$this->addPrimaryKey('settings_pk', 'settings', ['section_name', 'key']);
	}
	
	/**
	 * @inheritdoc
	 */
	public function down()
	{
		$this->dropTable('settings');
	}
}
