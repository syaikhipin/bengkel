<?php

namespace app\models\base;

class MotorJenis extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return "motor_jenis";
    }
    public function rules()
    {
        return array(array(array("kode", "nama"), "required"), array(array("status", "created_by", "updated_by"), "integer"), array(array("created_at", "updated_at"), "safe"), array(array("kode"), "string", "max" => 30), array(array("nama"), "string", "max" => 50));
    }
    public function attributeLabels()
    {
        return array("id" => "ID", "kode" => "Kode", "nama" => "Nama", "status" => "Status", "created_at" => "Created At", "updated_at" => "Updated At", "created_by" => "Created By", "updated_by" => "Updated By");
    }
    public function getCheckpoints()
    {
        return $this->hasMany(\app\models\Checkpoint::className(), array("motor_jenis_id" => "id"));
    }
    public function getCheckpointItems()
    {
        return $this->hasMany(\app\models\CheckpointItem::className(), array("motor_jenis_id" => "id"));
    }
    public function getCreatedBy()
    {
        return $this->hasOne(\app\models\User::className(), array("id" => "created_by"));
    }
    public function getUpdatedBy()
    {
        return $this->hasOne(\app\models\User::className(), array("id" => "updated_by"));
    }
}

?>