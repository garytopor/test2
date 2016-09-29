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
                'showInMenu' => 'SMALLINT(2) NULL DEFAULT \'1\'',
                'icon' => 'VARCHAR(50) NULL',
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
                'lang' => 'VARCHAR(5) NOT NULL',
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
                'lang' => 'VARCHAR(5) NOT NULL',
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


        $this->createIndex('idx_idCategory_3288_00','category_lang','idCategory',0);
        $this->createIndex('idx_idCategory_3288_01','category_lang','idCategory',0);
        $this->createIndex('idx_alias_3308_02','field','alias',0);
        $this->createIndex('idx_idCategory_3348_03','page','idCategory',0);
        $this->createIndex('idx_alias_3348_04','page','alias',0);
        $this->createIndex('idx_aliasPage_3368_05','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_3368_06','page_field','aliasField',0);
        $this->createIndex('idx_aliasPage_3368_07','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_3368_08','page_field','aliasField',0);
        $this->createIndex('idx_idPage_3408_09','page_image','idPage',0);
        $this->createIndex('idx_idPage_3588_10','page_lang','idPage',0);
        $this->createIndex('idx_UNIQUE_username_3688_11','user','username',1);
        $this->createIndex('idx_UNIQUE_email_3688_12','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_3688_13','user','password_reset_token',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_category_3278_00','{{%category_lang}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_category_3338_01','{{%page}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_3398_02','{{%page_image}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_3578_03','{{%page_lang}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%category}}',['id'=>'1','alias'=>'home','sort'=>'1','showInMenu'=>'1','icon'=>'icon-home4']);
        $this->insert('{{%category}}',['id'=>'2','alias'=>'about_company','sort'=>'2','showInMenu'=>'1','icon'=>'icon-brain']);
        $this->insert('{{%category}}',['id'=>'3','alias'=>'our_services','sort'=>'3','showInMenu'=>'1','icon'=>'icon-anchor']);
        $this->insert('{{%category}}',['id'=>'4','alias'=>'clients_and_partners','sort'=>'4','showInMenu'=>'1','icon'=>'icon-people']);
        $this->insert('{{%category}}',['id'=>'5','alias'=>'contacts','sort'=>'5','showInMenu'=>'1','icon'=>'icon-list']);
        $this->insert('{{%category_lang}}',['id'=>'1','idCategory'=>'1','lang'=>'en','val'=>'home']);
        $this->insert('{{%category_lang}}',['id'=>'2','idCategory'=>'1','lang'=>'ru','val'=>'главная']);
        $this->insert('{{%category_lang}}',['id'=>'3','idCategory'=>'1','lang'=>'cn','val'=>'家']);
        $this->insert('{{%category_lang}}',['id'=>'4','idCategory'=>'2','lang'=>'en','val'=>'about company']);
        $this->insert('{{%category_lang}}',['id'=>'5','idCategory'=>'2','lang'=>'ru','val'=>'о компании']);
        $this->insert('{{%category_lang}}',['id'=>'6','idCategory'=>'2','lang'=>'cn','val'=>'关于公司']);
        $this->insert('{{%category_lang}}',['id'=>'7','idCategory'=>'3','lang'=>'en','val'=>'our services']);
        $this->insert('{{%category_lang}}',['id'=>'8','idCategory'=>'3','lang'=>'ru','val'=>'наши услуги']);
        $this->insert('{{%category_lang}}',['id'=>'9','idCategory'=>'3','lang'=>'cn','val'=>'我们的服务']);
        $this->insert('{{%category_lang}}',['id'=>'10','idCategory'=>'4','lang'=>'en','val'=>'clients and partners']);
        $this->insert('{{%category_lang}}',['id'=>'11','idCategory'=>'4','lang'=>'ru','val'=>'клиенты и партнеры']);
        $this->insert('{{%category_lang}}',['id'=>'12','idCategory'=>'4','lang'=>'cn','val'=>'客户和合作伙伴']);
        $this->insert('{{%category_lang}}',['id'=>'13','idCategory'=>'5','lang'=>'en','val'=>'contacts']);
        $this->insert('{{%category_lang}}',['id'=>'14','idCategory'=>'5','lang'=>'ru','val'=>'контакты']);
        $this->insert('{{%category_lang}}',['id'=>'15','idCategory'=>'5','lang'=>'cn','val'=>'往来']);
        $this->insert('{{%user}}',['id'=>'1','username'=>'admin','auth_key'=>'XaQFqmmIzWse3zjGUR7nOZ4TfhI3UIyW','password_hash'=>'$2y$13$u.4MgIhMdC62rQ9hIC634ucuNjc0B.jL/n2nQiu0iRdN7x/TtzGOK','password_reset_token'=>'','email'=>'admin@email.com','status'=>'10','created_at'=>'1475080941','updated_at'=>'1475080941']);
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
