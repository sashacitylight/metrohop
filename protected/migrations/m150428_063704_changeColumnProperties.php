<?php

class m150428_063704_changeColumnProperties extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','number_id', 'ProductID');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','ProductID', 'number_id');
    }
}