<?php

class m150520_085152_DropColumnsOrder extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->dropColumn('tbl_order','type_product');
        $this->getDbConnection()->createCommand()->dropColumn('tbl_order','color_product');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->addColumn('tbl_order','type_product','varchar(255)');
        $this->getDbConnection()->createCommand()->addColumn('tbl_order','color_product','varchar(255)');
    }
}