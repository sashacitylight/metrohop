<?php

class m150426_032755_renametbl_Artist extends CDbMigration
{
	public function up()
	{
        return $this->renameTable('tbl_artist','tbl_author');
	}

	public function down()
	{
        return $this->renameTable('tbl_author','tbl_artist');
    }

}