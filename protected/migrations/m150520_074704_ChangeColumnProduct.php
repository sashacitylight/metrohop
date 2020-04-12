<?php

class m150520_074704_ChangeColumnProduct extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','firm_id', 'pFirmID');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','p_Discount', 'pDiscount');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','p_numberOrders', 'pNumberOrders');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','overall_rating', 'overallRating');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','p_commentsNumber', 'pCommentsNumber');

    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','firmID', 'firm_id');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','pDiscount', 'p_Discount');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','pNumberOrders', 'p_numberOrders');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','overallRating', 'overall_rating');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','pCommentsNumber', 'p_commentsNumber');

    }
}