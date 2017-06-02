<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170528_144925_create_news_table extends Migration
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
        $this->createTable('news', [
            'id' => $this->primaryKey(),
	    'name' => $this->string(64)->notNull(),
	    'type' => $this->integer()->notNull()->defaultValue(10),
	    'description' => $this->text(),
	    'rule_name' => $this->string(64),
	    'data' => $this->text(),
	    'created_at' => $this->datetime()->notNull(),
	    'updated_at' => $this->datetime(),
        ],$tableOptions);
	$count = 5;
	for($i = 0; $i < $count; $i ++ ){
	    $this->insert('news', [
		'id' => null,
		'name' => 'name'.$i,
		'type' => 1,
		'description' => 'description',
		'rule_name' => 'user',
		'data' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
		'created_at' => date('Y-m-d H-i-s',(time()-$i*3600*24)),
		'updated_at' => date('Y-m-d H-i-s',time()),
	    ]);
	}
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
