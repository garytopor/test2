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
                'createdAt' => 'DATETIME NULL DEFAULT \'CURRENT_TIMESTAMP\'',
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


        $this->createIndex('idx_idCategory_5165_00','category_lang','idCategory',0);
        $this->createIndex('idx_idLang_5165_01','category_lang','idLang',0);
        $this->createIndex('idx_idCategory_5165_02','category_lang','idCategory',0);
        $this->createIndex('idx_alias_5345_03','field','alias',0);
        $this->createIndex('idx_idCategory_5595_04','page','idCategory',0);
        $this->createIndex('idx_alias_5595_05','page','alias',0);
        $this->createIndex('idx_aliasPage_5705_06','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_5705_07','page_field','aliasField',0);
        $this->createIndex('idx_aliasPage_5705_08','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_5705_09','page_field','aliasField',0);
        $this->createIndex('idx_idPage_5925_10','page_image','idPage',0);
        $this->createIndex('idx_idPage_6105_11','page_lang','idPage',0);
        $this->createIndex('idx_idLang_6105_12','page_lang','idLang',0);
        $this->createIndex('idx_UNIQUE_username_6165_13','user','username',1);
        $this->createIndex('idx_UNIQUE_email_6165_14','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_6165_15','user','password_reset_token',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_category_5165_00','{{%category_lang}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'RESTRICT' );
        $this->addForeignKey('fk_lang_5165_01','{{%category_lang}}', 'idLang', '{{%lang}}', 'id', 'CASCADE', 'RESTRICT' );
        $this->addForeignKey('fk_category_5585_02','{{%page}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'RESTRICT' );
        $this->addForeignKey('fk_page_5915_03','{{%page_image}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'RESTRICT' );
        $this->addForeignKey('fk_page_6105_04','{{%page_lang}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'RESTRICT' );
        $this->addForeignKey('fk_lang_6105_05','{{%page_lang}}', 'idLang', '{{%lang}}', 'id', 'CASCADE', 'RESTRICT' );
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
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
