<?php

class m150520_072304_ChangeColumnsFirm extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_name', 'firmName');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_state', 'firmState');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_fio', 'firmFio');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_time', 'firmTime');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_price', 'firmPrice');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_service', 'firmService');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firm_info', 'firmInfo');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firmName', 'firm_name');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firmState', 'firm_state');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firmFio', 'firm_fio');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firmTime', 'firm_time');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firmPrice', 'firm_price');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firmService', 'firm_service');
        $this->getDbConnection()->createCommand()->renameColumn('tbl_firm','firmInfo', 'firm_info');
    }

}