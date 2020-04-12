<?php

class m150416_161254_change_comments_column extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->alterColumn('tbl_comments','c_date', 'integer(10)');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_date', 'created');
    }

	public function down()
	{
        $this->getDbConnection()->createCommand()->alterColumn('c_date','tbl_comments', 'DATETIME');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','created', 'c_date');
	}

}