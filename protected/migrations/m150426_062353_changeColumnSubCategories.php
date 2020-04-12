<?php

class m150426_062353_changeColumnSubCategories extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_subcategories','SubCategoriesId', 'id');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_subcategories','id', 'SubCategoriesId');
    }

}