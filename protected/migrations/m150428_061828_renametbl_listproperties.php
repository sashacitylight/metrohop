<?php

class m150428_061828_renametbl_listproperties extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameTable('tbl_listproperties', 'tbl_propertieslist');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameTable('tbl_propertieslist', 'tbl_listproperties');
    }

}