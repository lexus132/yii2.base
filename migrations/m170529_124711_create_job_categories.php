<?php

use yii\db\Migration;

class m170529_124711_create_job_categories extends Migration
{
    public function safeUp()
    {
	$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('job_category', [
            'id' => $this->primaryKey(),
            'category_item' => $this->string(255)->notNull(),
        ],$tableOptions);
	$this->insert('job_category', ['id' => null,'category_item' => 'IT - software development']);
	$this->insert('job_category', ['id' => null,'category_item' => 'IT-consulting / Services / Production of equipment']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Automotive and Auto Business']);
	$this->insert('job_category', ['id' => null,'category_item' => 'AIC (Agro-industrial complex)']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Architectural and design offices']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Banks']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Government sector']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Publishers and Polygraphy']);
	$this->insert('job_category', ['id' => null,'category_item' => 'The Internet']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Consulting / Audit']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Beauty / Fitness / Sports']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Media / Media']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Medicine and Healthcare']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Non-governmental organizations / NGO']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Real Estate and Development']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Education']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Hotels / Restaurants / Entertaining complexes']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Security & Safety']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Industry and Manufacturing']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Advertising and PR-services']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Insurance']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Building']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Telecommunications / Communications']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Trade wholesale / Distribution / Import-export']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Retailing / Retail']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Transport and logistic']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Tourism / Travel / Passenger transportations']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Services for business - other']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Services for the population']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Pharmaceuticals']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Financial services']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Show Business']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Electronics and electrical engineering']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Power and Energy']);
	$this->insert('job_category', ['id' => null,'category_item' => 'Legal services']);
//	$this->insert('job_category', ['id' => null,'category_item' => 'Other']);
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
        $this->dropTable('job_category');
    }
}
