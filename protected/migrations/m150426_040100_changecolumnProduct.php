<?php

class m150426_040100_changecolumnProduct extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','ArtistId', 'AuthorId');
	}

	public function down()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','AuthorId', 'ArtistId');
	}

}