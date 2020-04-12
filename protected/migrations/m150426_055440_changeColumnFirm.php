<?php

class m150426_055440_changeColumnFirm extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','id', 'id');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','id', 'id');
    }

}