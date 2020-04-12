<?php

class m150426_033825_changeTable_Author extends CDbMigration
{
	public function up()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_author','ArtistId', 'id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_author','ArtistArtUrl', 'AuthorArtUrl');
    }

	public function down()
	{
        $this->getDbConnection()->createCommand()->renameColumn('tbl_author','id', 'ArtistId');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_author','AuthorArtUrl', 'ArtistArtUrl');
	}

}