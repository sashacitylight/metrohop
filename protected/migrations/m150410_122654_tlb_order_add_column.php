<?php

class m150410_122654_tlb_order_add_column extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_order','userID','integer(11)');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->dropColumn('tbl_order','userID');
	}

}