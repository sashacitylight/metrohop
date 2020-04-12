<?php

class m150426_061856_changeColumnPictures extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_pictures','pic_id', 'id');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_pictures','id', 'pic_id');
    }

}