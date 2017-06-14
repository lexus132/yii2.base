<?php

use yii\db\Migration;

class m170609_133432_create_news_category extends Migration
{
    public function safeUp()
    {
	$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('news_category', [
            'id' => $this->primaryKey(),
            'category_item' => $this->string(255)->notNull()->unique(),
            'parent_id' => $this->integer()->defaultValue(null),
        ],$tableOptions);
	$this->insert('news_category', ['id' => null,'category_item' => 'Sport', 'parent_id' => null]);
	$this->insert('news_category', ['id' => null,'category_item' => 'Politic', 'parent_id' => null]);
	$this->insert('news_category', ['id' => null,'category_item' => 'Culture', 'parent_id' => null]);
    }

    /*
    public function safeDown()
    {
        echo "m170529_124711_create_job_categories cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }
    */

    public function down()
    {
        $this->dropTable('news_category');
    }
}
