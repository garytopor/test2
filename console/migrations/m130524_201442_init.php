<?php
use yii\db\Migration;
class m130524_201442_init extends Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('category', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%category}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'alias' => 'VARCHAR(50) NOT NULL',
                'sort' => 'INT(10) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('category_lang', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%category_lang}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idCategory' => 'INT(11) NOT NULL',
                'idLang' => 'INT(11) NOT NULL',
                'val' => 'VARCHAR(255) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('country', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%country}}', [
                'id' => 'INT(5) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'alias' => 'VARCHAR(50) NOT NULL',
                'sort' => 'INT(5) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('country_lang', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%country_lang}}', [
                'id' => 'INT(5) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'country_id' => 'INT(5) NOT NULL',
                'lang_id' => 'INT(5) NOT NULL',
                'val' => 'VARCHAR(50) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('field', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%field}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'alias' => 'VARCHAR(50) NOT NULL',
                'type' => 'VARCHAR(50) NOT NULL',
                'name' => 'VARCHAR(255) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('lang', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%lang}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'url' => 'VARCHAR(5) NOT NULL',
                'local' => 'VARCHAR(10) NOT NULL',
                'name' => 'VARCHAR(50) NOT NULL',
                'default' => 'SMALLINT(6) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('page', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%page}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idCategory' => 'INT(11) NOT NULL',
                'alias' => 'VARCHAR(50) NOT NULL',
                'createdAt' => 'DATETIME NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('page_field', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%page_field}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'aliasPage' => 'VARCHAR(50) NOT NULL',
                'aliasField' => 'VARCHAR(50) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('page_image', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%page_image}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idPage' => 'INT(11) NOT NULL',
                'type' => 'VARCHAR(50) NOT NULL',
                'device' => 'VARCHAR(50) NOT NULL',
                'src' => 'VARCHAR(255) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('page_lang', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%page_lang}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idPage' => 'INT(11) NOT NULL',
                'idLang' => 'INT(11) NOT NULL',
                'type' => 'VARCHAR(50) NOT NULL',
                'val' => 'TEXT NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('settings', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%settings}}', [
                'id' => 'TINYINT(3) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'name' => 'VARCHAR(255) NOT NULL',
                'val' => 'VARCHAR(255) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        /* MYSQL */
        if (!in_array('user', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%user}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'username' => 'VARCHAR(255) NOT NULL',
                'auth_key' => 'VARCHAR(32) NOT NULL',
                'password_hash' => 'VARCHAR(255) NOT NULL',
                'password_reset_token' => 'VARCHAR(255) NULL',
                'email' => 'VARCHAR(255) NOT NULL',
                'status' => 'SMALLINT(6) NOT NULL DEFAULT \'10\'',
                'created_at' => 'INT(11) NOT NULL',
                'updated_at' => 'INT(11) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
        $this->createIndex('idx_idCategory_9621_00','category_lang','idCategory',0);
        $this->createIndex('idx_idLang_9621_01','category_lang','idLang',0);
        $this->createIndex('idx_idCategory_9621_02','category_lang','idCategory',0);
        $this->createIndex('idx_alias_9701_03','field','alias',0);
        $this->createIndex('idx_idCategory_9771_04','page','idCategory',0);
        $this->createIndex('idx_alias_9771_05','page','alias',0);
        $this->createIndex('idx_aliasPage_9801_06','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_9801_07','page_field','aliasField',0);
        $this->createIndex('idx_aliasPage_9801_08','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_9801_09','page_field','aliasField',0);
        $this->createIndex('idx_idPage_9831_10','page_image','idPage',0);
        $this->createIndex('idx_idPage_9871_11','page_lang','idPage',0);
        $this->createIndex('idx_idLang_9871_12','page_lang','idLang',0);
        $this->createIndex('idx_UNIQUE_username_9921_13','user','username',1);
        $this->createIndex('idx_UNIQUE_email_9921_14','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_9921_15','user','password_reset_token',1);
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_category_9611_00','{{%category_lang}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_lang_9611_01','{{%category_lang}}', 'idLang', '{{%lang}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_category_9761_02','{{%page}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_9831_03','{{%page_image}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_lang_9871_04','{{%page_lang}}', 'idLang', '{{%lang}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_9871_05','{{%page_lang}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
    }
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `category`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `category_lang`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `country`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `country_lang`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `field`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `lang`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `page`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `page_field`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `page_image`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `page_lang`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `settings`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}