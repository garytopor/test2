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
            ], $tableOptions_mysql);
        }
        }

        /* MYSQL */
        if (!in_array('field_lang', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%field_lang}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idField' => 'INT(11) NOT NULL',
                'lang' => 'VARCHAR(5) NOT NULL',
                'val' => 'VARCHAR(255) NOT NULL',
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


        $this->createIndex('idx_idCategory_7462_00','category_lang','idCategory',0);
        $this->createIndex('idx_idCategory_7462_01','category_lang','idCategory',0);
        $this->createIndex('idx_alias_7482_02','field','alias',0);
        $this->createIndex('idx_idField_7512_03','field_lang','idField',0);
        $this->createIndex('idx_idCategory_7542_04','page','idCategory',0);
        $this->createIndex('idx_alias_7542_05','page','alias',0);
        $this->createIndex('idx_aliasPage_7592_06','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_7592_07','page_field','aliasField',0);
        $this->createIndex('idx_aliasPage_7592_08','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_7592_09','page_field','aliasField',0);
        $this->createIndex('idx_idPage_7652_10','page_image','idPage',0);
        $this->createIndex('idx_idPage_7682_11','page_lang','idPage',0);
        $this->createIndex('idx_UNIQUE_username_7772_12','user','username',1);
        $this->createIndex('idx_UNIQUE_email_7772_13','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_7772_14','user','password_reset_token',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_category_7452_00','{{%category_lang}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_field_7512_01','{{%field_lang}}', 'idField', '{{%field}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_category_7532_02','{{%page}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_7642_03','{{%page_image}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_7682_04','{{%page_lang}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
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
        $this->insert('{{%field}}',['id'=>'1','alias'=>'title','type'=>'text']);
        $this->insert('{{%field_lang}}',['id'=>'1','idField'=>'1','lang'=>'en','val'=>'Title']);
        $this->insert('{{%field_lang}}',['id'=>'2','idField'=>'1','lang'=>'ru','val'=>'Заголовок']);
        $this->insert('{{%field_lang}}',['id'=>'3','idField'=>'1','lang'=>'cn','val'=>'标题']);
        $this->insert('{{%page}}',['id'=>'1','idCategory'=>'2','alias'=>'сompany_history_and_possibilities','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'4','idCategory'=>'2','alias'=>'managment','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'5','idCategory'=>'2','alias'=>'current_jobs','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'6','idCategory'=>'2','alias'=>'responsibility_and_security','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'7','idCategory'=>'2','alias'=>'company_news','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'8','idCategory'=>'3','alias'=>'cargo_selection','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'9','idCategory'=>'3','alias'=>'our_route','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'10','idCategory'=>'3','alias'=>'sea_inland_air_service','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'11','idCategory'=>'3','alias'=>'dangerous_goods','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'12','idCategory'=>'3','alias'=>'your_questions_and_our_answers','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'13','idCategory'=>'4','alias'=>'our_clients','createdAt'=>'']);
        $this->insert('{{%page}}',['id'=>'14','idCategory'=>'4','alias'=>'our_partners','createdAt'=>'']);
        $this->insert('{{%page_field}}',['id'=>'1','aliasPage'=>'сompany_history_and_possibilities','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'2','aliasPage'=>'managment','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'3','aliasPage'=>'current_jobs','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'4','aliasPage'=>'responsibility_and_security','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'5','aliasPage'=>'company_news','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'6','aliasPage'=>'cargo_selection','aliasField'=>'']);
        $this->insert('{{%page_field}}',['id'=>'7','aliasPage'=>'our_route','aliasField'=>'']);
        $this->insert('{{%page_field}}',['id'=>'8','aliasPage'=>'sea_inland_air_service','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'9','aliasPage'=>'dangerous_goods','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'10','aliasPage'=>'your_questions_and_our_answers','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'11','aliasPage'=>'our_clients','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'12','aliasPage'=>'our_partners','aliasField'=>'title']);
        $this->insert('{{%page_lang}}',['id'=>'1','idPage'=>'1','lang'=>'en','type'=>'title','val'=>'Company history and possibilities']);
        $this->insert('{{%page_lang}}',['id'=>'2','idPage'=>'1','lang'=>'ru','type'=>'title','val'=>'История создания и возможности']);
        $this->insert('{{%page_lang}}',['id'=>'3','idPage'=>'1','lang'=>'cn','type'=>'title','val'=>'公司的历史和可能性']);
        $this->insert('{{%page_lang}}',['id'=>'4','idPage'=>'4','lang'=>'en','type'=>'title','val'=>'Managment']);
        $this->insert('{{%page_lang}}',['id'=>'5','idPage'=>'4','lang'=>'ru','type'=>'title','val'=>'Руководство']);
        $this->insert('{{%page_lang}}',['id'=>'6','idPage'=>'4','lang'=>'cn','type'=>'title','val'=>'管理']);
        $this->insert('{{%page_lang}}',['id'=>'7','idPage'=>'5','lang'=>'en','type'=>'title','val'=>'Current Jobs']);
        $this->insert('{{%page_lang}}',['id'=>'8','idPage'=>'5','lang'=>'ru','type'=>'title','val'=>'Текущие Вакансии']);
        $this->insert('{{%page_lang}}',['id'=>'9','idPage'=>'5','lang'=>'cn','type'=>'title','val'=>'当前作业']);
        $this->insert('{{%page_lang}}',['id'=>'10','idPage'=>'6','lang'=>'en','type'=>'title','val'=>'Responsibility and security']);
        $this->insert('{{%page_lang}}',['id'=>'11','idPage'=>'6','lang'=>'ru','type'=>'title','val'=>'Ответственность и безопасность']);
        $this->insert('{{%page_lang}}',['id'=>'12','idPage'=>'6','lang'=>'cn','type'=>'title','val'=>'责任和安全']);
        $this->insert('{{%page_lang}}',['id'=>'13','idPage'=>'7','lang'=>'en','type'=>'title','val'=>'Company news']);
        $this->insert('{{%page_lang}}',['id'=>'14','idPage'=>'7','lang'=>'ru','type'=>'title','val'=>'Новости компании']);
        $this->insert('{{%page_lang}}',['id'=>'15','idPage'=>'7','lang'=>'cn','type'=>'title','val'=>'责任和安全']);
        $this->insert('{{%page_lang}}',['id'=>'16','idPage'=>'8','lang'=>'en','type'=>'title','val'=>'Cargo selection']);
        $this->insert('{{%page_lang}}',['id'=>'17','idPage'=>'8','lang'=>'ru','type'=>'title','val'=>'Выбор грузов']);
        $this->insert('{{%page_lang}}',['id'=>'18','idPage'=>'8','lang'=>'cn','type'=>'title','val'=>'选货']);
        $this->insert('{{%page_lang}}',['id'=>'19','idPage'=>'9','lang'=>'en','type'=>'title','val'=>'Our route']);
        $this->insert('{{%page_lang}}',['id'=>'20','idPage'=>'9','lang'=>'ru','type'=>'title','val'=>'Наш маршрут']);
        $this->insert('{{%page_lang}}',['id'=>'21','idPage'=>'9','lang'=>'cn','type'=>'title','val'=>'我们的路线']);
        $this->insert('{{%page_lang}}',['id'=>'22','idPage'=>'10','lang'=>'en','type'=>'title','val'=>'Sea, Inland, air service']);
        $this->insert('{{%page_lang}}',['id'=>'23','idPage'=>'10','lang'=>'ru','type'=>'title','val'=>'Морское, наземное, воздушное транспортировка']);
        $this->insert('{{%page_lang}}',['id'=>'24','idPage'=>'10','lang'=>'cn','type'=>'title','val'=>'海，岛，航空服务']);
        $this->insert('{{%page_lang}}',['id'=>'25','idPage'=>'11','lang'=>'en','type'=>'title','val'=>'Dangerous goods']);
        $this->insert('{{%page_lang}}',['id'=>'26','idPage'=>'11','lang'=>'ru','type'=>'title','val'=>'Опасные грузы']);
        $this->insert('{{%page_lang}}',['id'=>'27','idPage'=>'11','lang'=>'cn','type'=>'title','val'=>'危险物品']);
        $this->insert('{{%page_lang}}',['id'=>'28','idPage'=>'12','lang'=>'en','type'=>'title','val'=>'Your questions and our answers']);
        $this->insert('{{%page_lang}}',['id'=>'29','idPage'=>'12','lang'=>'ru','type'=>'title','val'=>'Ваши вопросы и наши ответы']);
        $this->insert('{{%page_lang}}',['id'=>'30','idPage'=>'12','lang'=>'cn','type'=>'title','val'=>'您的问题，我们的答案']);
        $this->insert('{{%page_lang}}',['id'=>'31','idPage'=>'13','lang'=>'en','type'=>'title','val'=>'Our clients']);
        $this->insert('{{%page_lang}}',['id'=>'32','idPage'=>'13','lang'=>'ru','type'=>'title','val'=>'Наши клиенты']);
        $this->insert('{{%page_lang}}',['id'=>'33','idPage'=>'13','lang'=>'cn','type'=>'title','val'=>'我们的客户']);
        $this->insert('{{%page_lang}}',['id'=>'34','idPage'=>'14','lang'=>'en','type'=>'title','val'=>'Our partners']);
        $this->insert('{{%page_lang}}',['id'=>'35','idPage'=>'14','lang'=>'ru','type'=>'title','val'=>'Наши партнеры']);
        $this->insert('{{%page_lang}}',['id'=>'36','idPage'=>'14','lang'=>'cn','type'=>'title','val'=>'我们的合作伙伴']);
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
        $this->execute('DROP TABLE IF EXISTS `field_lang`');
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
