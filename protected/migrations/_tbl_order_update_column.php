<?php

class m150413_093322_tbl_order_update_columns extends CDbMigration
{
	public function up()
	{
        $this->dropTable('tbl_order');
        $this -> createTable ('tbl_order', array(
            'id' => 'pk',
            'userID' => 'integer NOT NULL',
            'username'=> 'string NOT NULL',
            'created'=>'',
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
        $this->dropTable('tbl_order');
	}

}