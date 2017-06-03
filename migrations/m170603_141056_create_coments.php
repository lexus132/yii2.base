<?php

use yii\db\Migration;

class m170603_141056_create_coments extends Migration
{
//    public function safeUp()
//    {
//
//    }
//
//    public function safeDown()
//    {
//        echo "m170603_141056_create_coments cannot be reverted.\n";
//
//        return false;
//    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
	$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
	
	$this->createTable('coments', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'text' => $this->text()->notNull(),
        ],  $tableOptions);
	
	$count = 15;
	for($i = 0; $i < $count; $i ++ ){
	    $this->insert('coments', [
		'id' => null,
		'name' => 'name'.$i,
		'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
	    ]);
	}
    }

    public function down()
    {
       $this->dropTable('coments'); 
    }
    /*
    */
}
