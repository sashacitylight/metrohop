<?php

class m150520_073739_ChangeColumnsPictures extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_pictures','pic_Product_id', 'picProductID');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_pictures','pic_url', 'picUrl');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_pictures','picProductID', 'pic_Product_id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_pictures','picUrl', 'pic_url');
    }


}