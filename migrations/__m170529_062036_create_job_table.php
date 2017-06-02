<?php

use yii\db\Migration;

/**
 * Handles the creation of table `job`.
 */
class m170529_062036_create_job_table extends Migration
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
//	
	$this->createTable('job_user', [
            'jobid' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'about' => $this->text()->defaultValue(null),
            'hobbies' => $this->text()->defaultValue(null),
            'references' => $this->text()->defaultValue(null),
        ],$tableOptions);
	
	$this->createTable('job_education', [
            'jobid' => $this->integer(11)->notNull(),
            'university' => $this->string(255)->notNull(),
            'major' => $this->string(255)->notNull(),
            'admission' => $this->integer(4)->notNull(),
            'lern_now' => $this->boolean()->defaultValue(0),
            'graduation' => $this->integer(4)->defaultValue(0),
        ],$tableOptions);
	
	$this->createTable('job_skills', [
            'jobid' => $this->integer(11)->notNull(),
            'skills_place' => $this->integer(255)->notNull(),
            'description' => $this->string(255)->notNull(),
        ],$tableOptions);
	
	$this->createTable('job_skills_place', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ],$tableOptions);
	
	$this->insert('job_skills_place', ['id' => null,'title' => 'Skills']);
	$this->insert('job_skills_place', ['id' => null,'title' => 'Office skills']);
	$this->insert('job_skills_place', ['id' => null,'title' => 'Computer skills']);
	
	$this->createTable('job_experience', [
            'experienceid' => $this->primaryKey(),
            'categories' => $this->integer(11)->notNull(),
            'jobid' => $this->integer(11)->notNull(),
            'title' => $this->string(255)->notNull(),
            'position' => $this->string(255)->notNull(),
            'hiring' => $this->integer(4)->notNull(),
            'today' => $this->boolean()->defaultValue(0),
            'dismissal' => $this->integer(4)->defaultValue(null),
        ],$tableOptions);
	
	$this->createTable('job_experience_duties', [
            'experienceid' => $this->integer(11)->notNull(),
            'description' => $this->string(255)->notNull(),
        ],$tableOptions);
	
	
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('job_category');
        $this->dropTable('job_user');
        $this->dropTable('job_education');
        $this->dropTable('job_skills');
        $this->dropTable('job_skills_place');
        $this->dropTable('job_experience');
        $this->dropTable('job_experience_duties');
	
    }
}
