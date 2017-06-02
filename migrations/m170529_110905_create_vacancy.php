<?php

use yii\db\Migration;

class m170529_110905_create_vacancy extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
	$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('job_vacansy', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'category_id' => $this->integer(11)->notNull(),
            'status' => $this->boolean()->defaultValue(true),
            'company_title' => $this->string(255)->notNull(),
            'company_site' => $this->string(255)->defaultValue(null),
            'company_description' => $this->text()->notNull(),
            'company_phone' => $this->text(30)->notNull(),
            'company_email' => $this->text(70)->notNull(),
	    
        ],$tableOptions);
	
	$count = 10;
	for($i = 1;$i <= $count; $i ++ ){
	    $this->insert('job_vacansy', [
		'id' => null,
		'user_id' => $i,
		'category_id' => ($count-$i)+1,
		'status' => ($i%2 == 1)? true : false,
		'company_title' => 'title_'.$i,
		'company_site' => 'www.title_'.$i.'.www',
		'company_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'company_phone' => '+380648201'.$i,
		'company_email' => 'mail'.$i.'@mail.com',
		]);
	}
	
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('job_vacansy');
	
    }
}
