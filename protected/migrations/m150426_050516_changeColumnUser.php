<?php

class m150426_050516_changeColumnUser extends CDbMigration
{
    public function up()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_user','Created', 'userCreated');
    }

    public function down()
    {
        $this->getDbConnection()->createCommand()->renameColumn('tbl_user','userCreated', 'Created');
    }

}