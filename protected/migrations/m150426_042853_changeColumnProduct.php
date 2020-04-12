<?php

class m150426_042853_changeColumnProduct extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','Tracks', 'AdditionalInfo');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','AdditionalInfo', 'Tracks');
	}
}