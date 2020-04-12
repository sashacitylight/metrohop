<?php

class m150428_065037_changeColumnsProperties extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_properties','size_color_id', 'id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_properties','size_color_name', 'feature1');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_properties','size_color_color', 'feature2');

    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_properties','id', 'size_color_id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_properties','feature1', 'size_color_name');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_properties','feature2', 'size_color_color');
    }

}