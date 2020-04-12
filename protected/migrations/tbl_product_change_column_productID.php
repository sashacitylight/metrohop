<?php

class m150413_111838_tbl_product_change_column_productID extends CDbMigration
{
	public function up()
	{
        $this->renameColumn('tbl_product','id','ProductId');
	}

	public function down()
	{
        $this->renameColumn('tbl_product','ProductId','id');
	}

}