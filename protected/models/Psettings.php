<?php

class Psettings extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{tbl_portal_settings}}';
    }

}
