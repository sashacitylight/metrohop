<?php

class m150520_064902_changeColumnComments extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_ProductID', 'cProductID');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_name', 'cName');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_reiting', 'cReiting');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_text', 'cText');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','cProductID', 'c_ProductID');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','cName', 'c_name');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','cReiting', 'c_reiting');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','cText', 'c_text');
	}


}