<?php

class m150426_043509_deleteColumnProduct extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->dropColumn('tbl_product', 'new_product');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->addColumn('tbl_product', 'new_product', 'integer');
	}
}