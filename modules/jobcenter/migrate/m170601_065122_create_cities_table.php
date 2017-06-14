<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cities`.
 */
class m170601_065122_create_cities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('job_cities', [
            'id' => $this->primaryKey(),
	    'city' => $this->string(255)->notNull()->unique(),
        ]);
	$this->insert('job_cities', ['id' => null,'city' => 'Kiev']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('job_cities');
    }
}
