<?php

class m150426_041622_changeColumnFirm extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_sluzba', 'firm_service');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_service', 'firm_sluzba');
    }
}