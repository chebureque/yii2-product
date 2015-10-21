<?php

use nullref\admin\models\Admin;
use yii\db\Schema;
use yii\db\Migration;
use yii\rbac\BaseManager;

class m150920_102400_create_product_table extends Migration
{
    use \nullref\core\traits\MigrationTrait;

    protected $tableName = '{{%product}}';

    public function up()
    {
        if (!$this->tableExist($this->tableName)) {
            $tableOptions = null;
            if (\Yii::$app->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
            }
            $this->createTable($this->tableName, [
                'id' => Schema::TYPE_PK,
                'title' => Schema::TYPE_STRING,
                'image' => Schema::TYPE_STRING,
                'description' => Schema::TYPE_TEXT,
                'price' => Schema::TYPE_DECIMAL . '(10,2)',
                'status' => Schema::TYPE_INTEGER,
                'createdAt' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updatedAt' => Schema::TYPE_INTEGER . ' NOT NULL',
                'deleted' => Schema::TYPE_SMALLINT,
            ], $tableOptions);
        }
    }

    public function down()
    {
        if ($this->tableExist($this->tableName)) {
            $this->dropTable($this->tableName);
        }
        return true;
    }

}