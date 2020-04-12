<?php

class m150426_041043_changeColumnComments extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_Product_number_comment', 'c_ProductID');
    }

	public function down()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_ProductID', 'c_Product_number_comment');
    }

}