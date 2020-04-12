<?php

class m150428_065844_changeColumnPropertiesList extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','tools_id', 'id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','tools_size_id', 'propertiesID');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','number', 'number');

    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','id', 'tools_id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','propertiesID', 'tools_size_id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_propertieslist','number', 'number');
    }

}