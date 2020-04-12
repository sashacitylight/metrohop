<?php

class m150520_080420_ChangeColumnSubCategory extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_subcategories','cat_id', 'catID');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_subcategories','catID', 'cat_id');
    }
}