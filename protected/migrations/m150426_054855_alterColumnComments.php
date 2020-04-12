<?php

class m150426_054855_alterColumnComments extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','c_comments_id', 'id');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_comments','id', 'c_comments_id');
    }

}