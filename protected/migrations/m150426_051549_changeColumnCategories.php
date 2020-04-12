<?php

class m150426_051549_changeColumnCategories extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_categories','id', 'id');

    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_categories','id', 'id');
    }

}