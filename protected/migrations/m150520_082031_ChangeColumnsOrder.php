<?php

class m150520_082031_ChangeColumnsOrder extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_order','user_id', 'userID');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_order','product_id', 'productID');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_order','userID', 'user_id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_order','productID', 'product_id');
    }
}