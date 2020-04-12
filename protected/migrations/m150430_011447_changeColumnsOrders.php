<?php

class m150430_011447_changeColumnsOrders extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->addColumn('tbl_order', 'PropertyID', 'integer');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->dropColumn('tbl_order', 'PropertyID');
	}

}