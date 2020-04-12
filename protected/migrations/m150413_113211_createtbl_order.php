<?php

class m150413_113211_createtbl_order extends CDbMigration
{
	public function up()
	{

        $this -> createTable ('tbl_order', array(
            'id' => 'pk',
            'userID' => 'integer NOT NULL',
            'username'=> 'string NOT NULL',
            'created'=>'datetime NOT NULL',
            'email' =>'string NOT NULL',
            'telefone' =>'string  NOT NULL',
            'adress' => 'string NOT NULL',
            'productID'=> 'string NOT NULL',
            'type_product'=> 'string NOT NULL',
            'color_product' => 'string NOT NULL',
            'number'=>'integer NOT NULL',
        ),'ENGINE=InnoDB DEFAULT CHARSET=utf8');

	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->dropTable('tbl_order');
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