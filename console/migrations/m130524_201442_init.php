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
        if (!in_array('city', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%city}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idCountry' => 'INT(11) NOT NULL',
                'latLon' => 'VARCHAR(50) NULL',
            ], $tableOptions_mysql);
        }
        }

        /* MYSQL */
        if (!in_array('city_lang', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%city_lang}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idCity' => 'INT(11) NOT NULL',
                'lang' => 'VARCHAR(5) NOT NULL',
                'val' => 'VARCHAR(255) NOT NULL',
            ], $tableOptions_mysql);
        }
        }

        /* MYSQL */
        if (!in_array('country', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%country}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
            ], $tableOptions_mysql);
        }
        }

        /* MYSQL */
        if (!in_array('country_lang', $tables))  {
        if ($dbType == "mysql") {
            $this->createTable('{{%country_lang}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'idCountry' => 'INT(11) NOT NULL',
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
                'i18n' => 'SMALLINT(2) NULL DEFAULT \'1\'',
                'imgRatio' => 'VARCHAR(10) NULL DEFAULT \'16/9\'',
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
                'childAlias' => 'VARCHAR(50) NULL',
                'isChild' => 'SMALLINT(2) NULL',
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
                'ext' => 'VARCHAR(50) NOT NULL',
                'x' => 'INT(5) NULL',
                'y' => 'INT(5) NULL',
                'w' => 'INT(5) NULL',
                'h' => 'INT(5) NULL',
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


        $this->createIndex('idx_idCategory_8044_00','category_lang','idCategory',0);
        $this->createIndex('idx_idCategory_8044_01','category_lang','idCategory',0);
        $this->createIndex('idx_idCountry_8074_02','city','idCountry',0);
        $this->createIndex('idx_idCity_8104_03','city_lang','idCity',0);
        $this->createIndex('idx_idCountry_8184_04','country_lang','idCountry',0);
        $this->createIndex('idx_alias_8214_05','field','alias',0);
        $this->createIndex('idx_idField_8234_06','field_lang','idField',0);
        $this->createIndex('idx_idCategory_8264_07','page','idCategory',0);
        $this->createIndex('idx_alias_8264_08','page','alias',0);
        $this->createIndex('idx_aliasPage_8294_09','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_8294_10','page_field','aliasField',0);
        $this->createIndex('idx_aliasPage_8294_11','page_field','aliasPage',0);
        $this->createIndex('idx_aliasField_8294_12','page_field','aliasField',0);
        $this->createIndex('idx_idPage_8364_13','page_image','idPage',0);
        $this->createIndex('idx_idPage_8384_14','page_lang','idPage',0);
        $this->createIndex('idx_UNIQUE_username_8444_15','user','username',1);
        $this->createIndex('idx_UNIQUE_email_8444_16','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_8444_17','user','password_reset_token',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_category_8044_00','{{%category_lang}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_country_8064_01','{{%city}}', 'idCountry', '{{%country}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_city_8104_02','{{%city_lang}}', 'idCity', '{{%city}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_country_8184_03','{{%country_lang}}', 'idCountry', '{{%country}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_field_8234_04','{{%field_lang}}', 'idField', '{{%field}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_category_8264_05','{{%page}}', 'idCategory', '{{%category}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_8354_06','{{%page_image}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_page_8384_07','{{%page_lang}}', 'idPage', '{{%page}}', 'id', 'CASCADE', 'NO ACTION' );
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
        $this->insert('{{%city}}',['id'=>'1','idCountry'=>'1','latLon'=>'41.3178,69.2875']);
        $this->insert('{{%city}}',['id'=>'2','idCountry'=>'1','latLon'=>'55.7819,37.2935']);
        $this->insert('{{%city_lang}}',['id'=>'6','idCity'=>'1','lang'=>'ru','val'=>'Ташкент']);
        $this->insert('{{%city_lang}}',['id'=>'7','idCity'=>'2','lang'=>'ru','val'=>'ророр']);
        $this->insert('{{%country}}',['id'=>'1']);
        $this->insert('{{%country_lang}}',['id'=>'1','idCountry'=>'1','lang'=>'ru','val'=>'Узбекистан']);
        $this->insert('{{%field}}',['id'=>'1','alias'=>'title','type'=>'text','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'2','alias'=>'meta-description','type'=>'text','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'3','alias'=>'meta-keywords','type'=>'text','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'4','alias'=>'content-top','type'=>'html','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'5','alias'=>'content-main','type'=>'html','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'6','alias'=>'img-top','type'=>'image','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'7','alias'=>'img-main','type'=>'image','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'8','alias'=>'img-icon','type'=>'image','i18n'=>'0','imgRatio'=>'1/1']);
        $this->insert('{{%field}}',['id'=>'9','alias'=>'fio','type'=>'text','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'10','alias'=>'post','type'=>'text','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'11','alias'=>'tel','type'=>'tel','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'12','alias'=>'email','type'=>'email','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'13','alias'=>'createdAt','type'=>'date','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'14','alias'=>'isMain','type'=>'checkbox','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'15','alias'=>'tech-data','type'=>'html','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'16','alias'=>'isRed','type'=>'checkbox','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'17','alias'=>'latLon','type'=>'latlon','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'18','alias'=>'address','type'=>'html','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'19','alias'=>'url','type'=>'text','i18n'=>'0','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'20','alias'=>'main-img-top','type'=>'image','i18n'=>'0','imgRatio'=>'4/3']);
        $this->insert('{{%field}}',['id'=>'21','alias'=>'main-img-routes','type'=>'image','i18n'=>'0','imgRatio'=>'4/3']);
        $this->insert('{{%field}}',['id'=>'22','alias'=>'main-content-route','type'=>'html','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field}}',['id'=>'23','alias'=>'main-content-top','type'=>'html','i18n'=>'1','imgRatio'=>'16/9']);
        $this->insert('{{%field_lang}}',['id'=>'1','idField'=>'1','lang'=>'en','val'=>'Title']);
        $this->insert('{{%field_lang}}',['id'=>'2','idField'=>'1','lang'=>'ru','val'=>'Заголовок']);
        $this->insert('{{%field_lang}}',['id'=>'3','idField'=>'1','lang'=>'cn','val'=>'标题']);
        $this->insert('{{%field_lang}}',['id'=>'4','idField'=>'2','lang'=>'en','val'=>'Meta-description']);
        $this->insert('{{%field_lang}}',['id'=>'5','idField'=>'2','lang'=>'ru','val'=>'Мета-описание']);
        $this->insert('{{%field_lang}}',['id'=>'6','idField'=>'2','lang'=>'cn','val'=>'元描述']);
        $this->insert('{{%field_lang}}',['id'=>'7','idField'=>'3','lang'=>'en','val'=>'Meta-keywords']);
        $this->insert('{{%field_lang}}',['id'=>'8','idField'=>'3','lang'=>'ru','val'=>'Ключевые слова']);
        $this->insert('{{%field_lang}}',['id'=>'9','idField'=>'3','lang'=>'cn','val'=>'元关键字']);
        $this->insert('{{%field_lang}}',['id'=>'10','idField'=>'4','lang'=>'en','val'=>'Content Top']);
        $this->insert('{{%field_lang}}',['id'=>'11','idField'=>'4','lang'=>'ru','val'=>'Содержание']);
        $this->insert('{{%field_lang}}',['id'=>'12','idField'=>'4','lang'=>'cn','val'=>'内容顶']);
        $this->insert('{{%field_lang}}',['id'=>'13','idField'=>'5','lang'=>'en','val'=>'Body content']);
        $this->insert('{{%field_lang}}',['id'=>'14','idField'=>'5','lang'=>'ru','val'=>'Остальное содержание']);
        $this->insert('{{%field_lang}}',['id'=>'15','idField'=>'5','lang'=>'cn','val'=>'正文内容']);
        $this->insert('{{%field_lang}}',['id'=>'16','idField'=>'6','lang'=>'en','val'=>'Top image']);
        $this->insert('{{%field_lang}}',['id'=>'17','idField'=>'6','lang'=>'ru','val'=>'Верхняя картинка']);
        $this->insert('{{%field_lang}}',['id'=>'18','idField'=>'6','lang'=>'cn','val'=>'最上面的图片']);
        $this->insert('{{%field_lang}}',['id'=>'19','idField'=>'7','lang'=>'en','val'=>'Text image']);
        $this->insert('{{%field_lang}}',['id'=>'20','idField'=>'7','lang'=>'ru','val'=>'Текстовое изображение']);
        $this->insert('{{%field_lang}}',['id'=>'21','idField'=>'7','lang'=>'cn','val'=>'文字图片']);
        $this->insert('{{%field_lang}}',['id'=>'22','idField'=>'8','lang'=>'en','val'=>'Icon']);
        $this->insert('{{%field_lang}}',['id'=>'23','idField'=>'8','lang'=>'ru','val'=>'Иконка']);
        $this->insert('{{%field_lang}}',['id'=>'24','idField'=>'8','lang'=>'cn','val'=>'图标']);
        $this->insert('{{%field_lang}}',['id'=>'25','idField'=>'9','lang'=>'en','val'=>'Name']);
        $this->insert('{{%field_lang}}',['id'=>'26','idField'=>'9','lang'=>'ru','val'=>'Имя']);
        $this->insert('{{%field_lang}}',['id'=>'27','idField'=>'9','lang'=>'cn','val'=>'名称']);
        $this->insert('{{%field_lang}}',['id'=>'28','idField'=>'10','lang'=>'en','val'=>'Position']);
        $this->insert('{{%field_lang}}',['id'=>'29','idField'=>'10','lang'=>'ru','val'=>'Должность']);
        $this->insert('{{%field_lang}}',['id'=>'30','idField'=>'10','lang'=>'cn','val'=>'位置']);
        $this->insert('{{%field_lang}}',['id'=>'31','idField'=>'11','lang'=>'en','val'=>'Phone number']);
        $this->insert('{{%field_lang}}',['id'=>'32','idField'=>'11','lang'=>'ru','val'=>'Номер телефона']);
        $this->insert('{{%field_lang}}',['id'=>'33','idField'=>'11','lang'=>'cn','val'=>'电话号码']);
        $this->insert('{{%field_lang}}',['id'=>'34','idField'=>'12','lang'=>'en','val'=>'Email']);
        $this->insert('{{%field_lang}}',['id'=>'35','idField'=>'12','lang'=>'ru','val'=>'Эл. адрес']);
        $this->insert('{{%field_lang}}',['id'=>'36','idField'=>'12','lang'=>'cn','val'=>'电子邮件']);
        $this->insert('{{%field_lang}}',['id'=>'37','idField'=>'17','lang'=>'ru','val'=>'Координаты']);
        $this->insert('{{%field_lang}}',['id'=>'38','idField'=>'17','lang'=>'en','val'=>'Coordinates']);
        $this->insert('{{%field_lang}}',['id'=>'39','idField'=>'17','lang'=>'cn','val'=>'坐标']);
        $this->insert('{{%field_lang}}',['id'=>'40','idField'=>'13','lang'=>'ru','val'=>'Дата создания']);
        $this->insert('{{%field_lang}}',['id'=>'41','idField'=>'13','lang'=>'en','val'=>'Created At']);
        $this->insert('{{%field_lang}}',['id'=>'42','idField'=>'13','lang'=>'cn','val'=>'在创建']);
        $this->insert('{{%field_lang}}',['id'=>'43','idField'=>'14','lang'=>'ru','val'=>'На главной']);
        $this->insert('{{%field_lang}}',['id'=>'44','idField'=>'14','lang'=>'en','val'=>'Is Main']);
        $this->insert('{{%field_lang}}',['id'=>'45','idField'=>'14','lang'=>'cn','val'=>'主要是']);
        $this->insert('{{%field_lang}}',['id'=>'46','idField'=>'15','lang'=>'ru','val'=>'Тех.данные']);
        $this->insert('{{%field_lang}}',['id'=>'47','idField'=>'15','lang'=>'en','val'=>'Technical Data']);
        $this->insert('{{%field_lang}}',['id'=>'48','idField'=>'15','lang'=>'cn','val'=>'技术数据']);
        $this->insert('{{%field_lang}}',['id'=>'49','idField'=>'16','lang'=>'ru','val'=>'Отметить красным']);
        $this->insert('{{%field_lang}}',['id'=>'50','idField'=>'16','lang'=>'en','val'=>'Fill red']);
        $this->insert('{{%field_lang}}',['id'=>'51','idField'=>'16','lang'=>'cn','val'=>'填写红']);
        $this->insert('{{%field_lang}}',['id'=>'52','idField'=>'18','lang'=>'ru','val'=>'Адрес']);
        $this->insert('{{%field_lang}}',['id'=>'53','idField'=>'18','lang'=>'en','val'=>'Address']);
        $this->insert('{{%field_lang}}',['id'=>'54','idField'=>'18','lang'=>'cn','val'=>'地址']);
        $this->insert('{{%field_lang}}',['id'=>'55','idField'=>'19','lang'=>'en','val'=>'Url']);
        $this->insert('{{%field_lang}}',['id'=>'56','idField'=>'19','lang'=>'ru','val'=>'Ссылка']);
        $this->insert('{{%field_lang}}',['id'=>'57','idField'=>'19','lang'=>'cn','val'=>'網址']);
        $this->insert('{{%field_lang}}',['id'=>'58','idField'=>'20','lang'=>'en','val'=>'The background image of the main page']);
        $this->insert('{{%field_lang}}',['id'=>'59','idField'=>'20','lang'=>'ru','val'=>'Фоновое изображение главной страницы']);
        $this->insert('{{%field_lang}}',['id'=>'60','idField'=>'20','lang'=>'cn','val'=>'主頁的背景圖片']);
        $this->insert('{{%field_lang}}',['id'=>'61','idField'=>'21','lang'=>'en','val'=>'Background image block Route the main page']);
        $this->insert('{{%field_lang}}',['id'=>'62','idField'=>'21','lang'=>'ru','val'=>'Фоновое изображение главной страницы блок роуты']);
        $this->insert('{{%field_lang}}',['id'=>'63','idField'=>'21','lang'=>'cn','val'=>'背景圖像塊路線主頁']);
        $this->insert('{{%field_lang}}',['id'=>'64','idField'=>'22','lang'=>'en','val'=>'Content Route Block']);
        $this->insert('{{%field_lang}}',['id'=>'65','idField'=>'22','lang'=>'ru','val'=>'Содержимое блока Роуты']);
        $this->insert('{{%field_lang}}',['id'=>'66','idField'=>'22','lang'=>'cn','val'=>'內容根塊']);
        $this->insert('{{%field_lang}}',['id'=>'67','idField'=>'23','lang'=>'en','val'=>'Сontent of the home page, on top']);
        $this->insert('{{%field_lang}}',['id'=>'68','idField'=>'23','lang'=>'ru','val'=>'Содержимое главной страницы, сверху']);
        $this->insert('{{%field_lang}}',['id'=>'69','idField'=>'23','lang'=>'cn','val'=>'主頁的內容']);
        $this->insert('{{%page}}',['id'=>'1','idCategory'=>'2','alias'=>'company_history_and_possibilities','childAlias'=>'','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'4','idCategory'=>'2','alias'=>'managment','childAlias'=>'managers','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'5','idCategory'=>'2','alias'=>'current_jobs','childAlias'=>'vacancies','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'6','idCategory'=>'2','alias'=>'responsibility_and_security','childAlias'=>'','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'7','idCategory'=>'2','alias'=>'company_news','childAlias'=>'news','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'8','idCategory'=>'3','alias'=>'cargo_selection','childAlias'=>'cargos','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'9','idCategory'=>'3','alias'=>'our_route','childAlias'=>'','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'10','idCategory'=>'3','alias'=>'sea_inland_air_service','childAlias'=>'transports','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'11','idCategory'=>'3','alias'=>'dangerous_goods','childAlias'=>'goods','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'12','idCategory'=>'3','alias'=>'your_questions_and_our_answers','childAlias'=>'faq','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'13','idCategory'=>'4','alias'=>'our_clients','childAlias'=>'client','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'14','idCategory'=>'4','alias'=>'our_partners','childAlias'=>'partner','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'15','idCategory'=>'5','alias'=>'contacts','childAlias'=>'offices','isChild'=>'0']);
        $this->insert('{{%page}}',['id'=>'16','idCategory'=>'5','alias'=>'offices','childAlias'=>'','isChild'=>'1']);
        $this->insert('{{%page}}',['id'=>'17','idCategory'=>'1','alias'=>'main','childAlias'=>'','isChild'=>'']);
        $this->insert('{{%page_field}}',['id'=>'1','aliasPage'=>'company_history_and_possibilities','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'2','aliasPage'=>'company_history_and_possibilities','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'3','aliasPage'=>'company_history_and_possibilities','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'4','aliasPage'=>'company_history_and_possibilities','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'5','aliasPage'=>'company_history_and_possibilities','aliasField'=>'content-main']);
        $this->insert('{{%page_field}}',['id'=>'6','aliasPage'=>'managment','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'7','aliasPage'=>'managment','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'8','aliasPage'=>'managment','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'9','aliasPage'=>'managment','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'10','aliasPage'=>'managment','aliasField'=>'content-main']);
        $this->insert('{{%page_field}}',['id'=>'11','aliasPage'=>'current_jobs','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'12','aliasPage'=>'current_jobs','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'13','aliasPage'=>'current_jobs','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'14','aliasPage'=>'current_jobs','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'15','aliasPage'=>'current_jobs','aliasField'=>'content-main']);
        $this->insert('{{%page_field}}',['id'=>'16','aliasPage'=>'responsibility_and_security','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'17','aliasPage'=>'responsibility_and_security','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'18','aliasPage'=>'responsibility_and_security','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'19','aliasPage'=>'responsibility_and_security','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'20','aliasPage'=>'responsibility_and_security','aliasField'=>'content-main']);
        $this->insert('{{%page_field}}',['id'=>'21','aliasPage'=>'company_news','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'22','aliasPage'=>'company_news','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'23','aliasPage'=>'company_news','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'26','aliasPage'=>'cargo_selection','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'31','aliasPage'=>'our_route','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'32','aliasPage'=>'our_route','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'33','aliasPage'=>'our_route','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'36','aliasPage'=>'sea_inland_air_service','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'41','aliasPage'=>'dangerous_goods','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'42','aliasPage'=>'dangerous_goods','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'43','aliasPage'=>'dangerous_goods','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'44','aliasPage'=>'dangerous_goods','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'46','aliasPage'=>'your_questions_and_our_answers','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'47','aliasPage'=>'your_questions_and_our_answers','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'48','aliasPage'=>'your_questions_and_our_answers','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'49','aliasPage'=>'your_questions_and_our_answers','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'51','aliasPage'=>'our_clients','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'56','aliasPage'=>'our_partners','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'61','aliasPage'=>'company_history_and_possibilities','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'62','aliasPage'=>'company_history_and_possibilities','aliasField'=>'img-main']);
        $this->insert('{{%page_field}}',['id'=>'63','aliasPage'=>'managment','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'64','aliasPage'=>'current_jobs','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'65','aliasPage'=>'responsibility_and_security','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'66','aliasPage'=>'managers','aliasField'=>'fio']);
        $this->insert('{{%page_field}}',['id'=>'67','aliasPage'=>'managers','aliasField'=>'post']);
        $this->insert('{{%page_field}}',['id'=>'68','aliasPage'=>'managers','aliasField'=>'tel']);
        $this->insert('{{%page_field}}',['id'=>'69','aliasPage'=>'managers','aliasField'=>'email']);
        $this->insert('{{%page_field}}',['id'=>'70','aliasPage'=>'vacancies','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'71','aliasPage'=>'vacancies','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'72','aliasPage'=>'news','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'73','aliasPage'=>'news','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'74','aliasPage'=>'news','aliasField'=>'createdAt']);
        $this->insert('{{%page_field}}',['id'=>'75','aliasPage'=>'news','aliasField'=>'isMain']);
        $this->insert('{{%page_field}}',['id'=>'76','aliasPage'=>'news','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'77','aliasPage'=>'news','aliasField'=>'img-main']);
        $this->insert('{{%page_field}}',['id'=>'78','aliasPage'=>'cargos','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'79','aliasPage'=>'cargos','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'80','aliasPage'=>'cargos','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'81','aliasPage'=>'cargos','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'82','aliasPage'=>'cargos','aliasField'=>'tech-data']);
        $this->insert('{{%page_field}}',['id'=>'83','aliasPage'=>'cargos','aliasField'=>'img-icon']);
        $this->insert('{{%page_field}}',['id'=>'84','aliasPage'=>'cargos','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'85','aliasPage'=>'transports','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'86','aliasPage'=>'transports','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'87','aliasPage'=>'transports','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'88','aliasPage'=>'transports','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'90','aliasPage'=>'transports','aliasField'=>'img-icon']);
        $this->insert('{{%page_field}}',['id'=>'91','aliasPage'=>'transports','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'92','aliasPage'=>'goods','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'93','aliasPage'=>'goods','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'94','aliasPage'=>'goods','aliasField'=>'isRed']);
        $this->insert('{{%page_field}}',['id'=>'95','aliasPage'=>'faq','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'96','aliasPage'=>'faq','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'97','aliasPage'=>'client','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'98','aliasPage'=>'client','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'99','aliasPage'=>'client','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'100','aliasPage'=>'client','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'102','aliasPage'=>'client','aliasField'=>'img-icon']);
        $this->insert('{{%page_field}}',['id'=>'103','aliasPage'=>'client','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'104','aliasPage'=>'partner','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'105','aliasPage'=>'partner','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'106','aliasPage'=>'partner','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'107','aliasPage'=>'partner','aliasField'=>'content-top']);
        $this->insert('{{%page_field}}',['id'=>'109','aliasPage'=>'partner','aliasField'=>'img-icon']);
        $this->insert('{{%page_field}}',['id'=>'110','aliasPage'=>'partner','aliasField'=>'img-top']);
        $this->insert('{{%page_field}}',['id'=>'111','aliasPage'=>'offices','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'112','aliasPage'=>'offices','aliasField'=>'address']);
        $this->insert('{{%page_field}}',['id'=>'113','aliasPage'=>'offices','aliasField'=>'tel']);
        $this->insert('{{%page_field}}',['id'=>'114','aliasPage'=>'offices','aliasField'=>'email']);
        $this->insert('{{%page_field}}',['id'=>'115','aliasPage'=>'offices','aliasField'=>'latLon']);
        $this->insert('{{%page_field}}',['id'=>'116','aliasPage'=>'main','aliasField'=>'title']);
        $this->insert('{{%page_field}}',['id'=>'117','aliasPage'=>'main','aliasField'=>'meta-description']);
        $this->insert('{{%page_field}}',['id'=>'118','aliasPage'=>'main','aliasField'=>'meta-keywords']);
        $this->insert('{{%page_field}}',['id'=>'119','aliasPage'=>'main','aliasField'=>'main-content-top']);
        $this->insert('{{%page_field}}',['id'=>'120','aliasPage'=>'main','aliasField'=>'url']);
        $this->insert('{{%page_field}}',['id'=>'121','aliasPage'=>'main','aliasField'=>'main-content-route']);
        $this->insert('{{%page_field}}',['id'=>'122','aliasPage'=>'main','aliasField'=>'main-img-top']);
        $this->insert('{{%page_field}}',['id'=>'124','aliasPage'=>'main','aliasField'=>'main-img-routes']);
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
        $this->insert('{{%page_lang}}',['id'=>'194','idPage'=>'4','lang'=>'ru','type'=>'title','val'=>'Руководство']);
        $this->insert('{{%page_lang}}',['id'=>'195','idPage'=>'4','lang'=>'en','type'=>'title','val'=>'Managment']);
        $this->insert('{{%page_lang}}',['id'=>'279','idPage'=>'1','lang'=>'ru','type'=>'title','val'=>'История создания и возможности']);
        $this->insert('{{%page_lang}}',['id'=>'280','idPage'=>'1','lang'=>'en','type'=>'title','val'=>'Company history and possibilities']);
        $this->insert('{{%page_lang}}',['id'=>'281','idPage'=>'1','lang'=>'cn','type'=>'title','val'=>'公司的历史和可能性']);
        $this->insert('{{%page_lang}}',['id'=>'282','idPage'=>'1','lang'=>'en','type'=>'content-top','val'=>'<h4>10 years of hard work, success and grow</h4>Nlngbo Rul-speed International freight forwarders Ltd. Is a sea, air and land transport as an Integrated International freight forwarding companies. In 2005, the prototype of the company in Nlngbo; then, In the development of the SAR Shenzhen, vitality and charm of Shanghai, Qlngdao; today, Is planning to close to Ben Thanh Tlanjln and Xiamen, two of the sea.<h4></h4>']);
        $this->insert('{{%page_lang}}',['id'=>'283','idPage'=>'1','lang'=>'en','type'=>'content-main','val'=>'<p>Nlngbo Rul-speed international freight forwarders Ltd. Is a sea. air and land transport as an Integrated International freight forwarding companies. In 2005, the prototype of the company In Nlngbo; then, In the development of the SAR Shenzhen, vitality and charm of Shanghai, Qlngdao; today, Is planning to close to Ben Thanh Tianjin and Xiamen, two of the sea.</p><p>Our company has the right to direct booking and comprehensive global agency network, with operations in every corner of the world, where the core business Is focused on romantic European Russia. Britain. France, Finland. Spain, as well as Southeast Asia. Thailand. Malaysia, Vietnam and the Philippines and other countries exotic, as well as the United States, the Middle East and Australia, totaling about It, there are a total of Division I business relationships with more than 50 countries.</p><p>After five years of growth, our company has been formed FCL (FCL), LCL (LCL) import and export freight forwarders, air cargo Import and export freight forwarders, container Inland transportation and door to door service, customs clearance services in Eastern Europe and Russia. Continental bridge transport services and customs declaration, inspection, insurance agents, etc. all aspects of logistics service system, and a determined effort from the coast Into the Inland city of the Chinese coast, out Nelxlu China, to the wider world and become a link global freight forwarders people trusted to provide door to door transport services.</p><div><div><p>Our advantage routes In Europe, the Middle East. Southeast Asia and the United States, with many world-renowned shipping companies have a direct relationship, now has fixed more than 2.000 customers, it Is expected to export proxy container 30000 TEU, annual import agent container 5000 TEU. The company has been adhering to the \\\\\\\\\\\"service to win customers, In good faith pool staff, web development enterprise\\\\\\\\\\\" business philosophy to \\\\\\\\\\\"the development of modern logistics industry\\\\\\\\\\\" as its mission, with the leading edge services and national logistics service system, is seeking a pragmatic Hony Endeavour, honesty, practical, ambitious and dedicated to provide \\\\\\\\\\\"safe, efficient, economic and thoughtful\\\\\\\\\\\" first-class service to our customers around the world.</p></div></div>']);
        $this->insert('{{%page_lang}}',['id'=>'284','idPage'=>'15','lang'=>'en','type'=>'title','val'=>'Offices']);
        $this->insert('{{%page_lang}}',['id'=>'285','idPage'=>'15','lang'=>'ru','type'=>'title','val'=>'Офисы']);
        $this->insert('{{%page_lang}}',['id'=>'286','idPage'=>'16','lang'=>'ru','type'=>'title','val'=>'Офис в Ташкенте']);
        $this->insert('{{%page_lang}}',['id'=>'287','idPage'=>'16','lang'=>'ru','type'=>'address','val'=>'ул.Миробад д.14']);
        $this->insert('{{%page_lang}}',['id'=>'288','idPage'=>'16','lang'=>'i18n','type'=>'tel','val'=>'+9878447854']);
        $this->insert('{{%page_lang}}',['id'=>'289','idPage'=>'16','lang'=>'i18n','type'=>'email','val'=>'fsdf@fdf.ru']);
        $this->insert('{{%page_lang}}',['id'=>'290','idPage'=>'16','lang'=>'ru','type'=>'latLon','val'=>'41.3080,69.2474']);
        $this->insert('{{%page_lang}}',['id'=>'299','idPage'=>'17','lang'=>'en','type'=>'title','val'=>'Main settings']);
        $this->insert('{{%page_lang}}',['id'=>'300','idPage'=>'17','lang'=>'ru','type'=>'title','val'=>'Настройки главной']);
        $this->insert('{{%page_lang}}',['id'=>'301','idPage'=>'17','lang'=>'cn','type'=>'title','val'=>'主要設置']);
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
        $this->execute('DROP TABLE IF EXISTS `city`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `city_lang`');
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
