<?php

class m150426_042007_changeColumnProduct extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','p_Discount', 'pDiscount');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','overall_rating', 'overallRating');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','p_commentsNumber', 'pCommentsNumber');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','pDiscount', 'p_Discount');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','overallRating', 'overall_rating');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_product','pCommentsNumber', 'p_commentsNumber');
    }
}