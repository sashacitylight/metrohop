<?php

class m150428_061640_renameTbl_tools_size_color extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameTable('tbl_tools_size_color', 'tbl_properties');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameTable('tbl_properties', 'tbl_tools_size_color');
    }

}