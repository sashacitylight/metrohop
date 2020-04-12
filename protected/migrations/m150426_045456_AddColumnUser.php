<?php

class m150426_045456_AddColumnUser extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->addColumn('tbl_user','Created','integer(11)');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->dropColumn('tbl_user','Created');
	}

}