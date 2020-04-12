<?php

class m150409_160735_alter_tbl_user_columns extends CDbMigration
{
    ///изменить в таблице пользователь имена колонок
    public function up()
    {
        $this->renameColumn('tbl_user','userID','id');
        $this->renameColumn('tbl_user','login','username');
        $this->renameColumn('tbl_user','pass','password');
        $this->addColumn('tbl_user','role','integer(2)');
        $this->addColumn('tbl_user','ban','integer(2)');
    }

    public function down()
    {
        $this->renameColumn('tbl_user','id','userID');
        $this->renameColumn('tbl_user','username','login');
        $this->renameColumn('tbl_user','password','pass');
    }


}