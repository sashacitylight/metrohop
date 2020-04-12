<?php

class m150412_115726_addColumnUser extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_user','adress','varchar(255)');
	}

	public function down()
	{

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}