<?php

class m150428_061125_change_tbl_tool_Name extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->renameTable('tbl_tools', 'tbl_listproperties');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->renameTable('tbl_listproperties', 'tbl_tools');
	}

}