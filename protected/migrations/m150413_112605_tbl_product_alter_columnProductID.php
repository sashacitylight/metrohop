<?php

class m150413_112605_tbl_product_alter_columnProductID extends CDbMigration
{
	public function up()
	{
        $this->renameColumn('tbl_product','ProductId','id');
	}

	public function down()
	{
        $this->renameColumn('tbl_product','id','ProductId');
	}

}