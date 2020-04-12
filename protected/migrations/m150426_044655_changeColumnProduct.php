<?php

class m150426_044655_changeColumnProduct extends CDbMigration
{
    public function up()
    {

        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','p_numberOrders', 'p_numberOrders');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','Product_Tool_id', 'ToolId');

    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','p_numberOrders', 'p_numberOrders');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','ToolId', 'Product_Tool_id');
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