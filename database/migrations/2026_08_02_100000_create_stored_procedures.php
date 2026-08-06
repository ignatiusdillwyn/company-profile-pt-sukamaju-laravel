<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Nama semua stored procedure yang dibuat migration ini.
     * Dipakai bareng di up() (drop-then-create, biar aman dijalankan ulang)
     * dan down() (drop saat rollback).
     */
    private array $procedures = [
        '_createArticle',
        '_createContact',
        '_createUser',
        '_deleteArticleById',
        '_deleteUser',
        '_getAllArticles',
        '_getAllBlogs',
        '_getAllContacts',
        '_getAllServices',
        '_getAllUsers',
        '_getArticleById',
        '_getArticleBySlug',
        '_getContactbyId',
        '_getUserById',
        '_updateArticle',
        '_updateUser',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->procedures as $name) {
            DB::unprepared("DROP PROCEDURE IF EXISTS `{$name}`");
        }

        DB::unprepared("
            CREATE PROCEDURE `_createArticle`(
                IN user_id int(11),
                IN article_type varchar(255),
                IN title varchar(255),
                IN slug varchar(255),
                IN content varchar(255),
                IN is_published boolean,
                IN created datetime,
                IN updated datetime
            )
            BEGIN
                INSERT INTO `table_articles`
                (
                    `user_id`,
                    `article_type`,
                    `title`,
                    `slug`,
                    `content`,
                    `is_published`,
                    `created`,
                    `updated`
                )
                VALUES
                (
                    user_id,
                    article_type,
                    title,
                    slug,
                    content,
                    is_published,
                    created,
                    updated
                );
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_createContact`(
                IN full_name varchar(255),
                IN email varchar(255),
                IN phone varchar(255),
                IN notes varchar(255),
                IN is_read boolean,
                IN created datetime,
                IN updated datetime
            )
            BEGIN
                INSERT INTO `table_contacts`
                (
                    `fullname`,
                    `email`,
                    `phone`,
                    `notes`,
                    `is_read`,
                    `created`,
                    `updated`
                )
                VALUES
                (
                    full_name,
                    email,
                    phone,
                    notes,
                    is_read,
                    created,
                    updated
                );
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_createUser`(
                IN full_name varchar(255),
                IN email varchar(255),
                IN passwordd varchar(255),
                IN rolee varchar(255),
                IN is_active boolean,
                IN created datetime,
                IN updated datetime
            )
            BEGIN
                INSERT INTO `table_users`
                (
                    `fullname`,
                    `email`,
                    `password`,
                    `role`,
                    `is_active`,
                    `created`,
                    `updated`
                )
                VALUES
                (
                    full_name,
                    email,
                    passwordd,
                    rolee,
                    is_active,
                    created,
                    updated
                );
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_deleteArticleById`(
                IN article_id int
            )
            BEGIN
                DELETE FROM `table_articles`
                WHERE id = article_id;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_deleteUser`(
                IN user_id int
            )
            BEGIN
                DELETE FROM `table_users`
                WHERE id = user_id;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getAllArticles`()
            BEGIN
                SELECT * FROM table_articles;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getAllBlogs`()
            BEGIN
                SELECT * FROM table_articles
                WHERE article_type = 'blog' AND is_published = true;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getAllContacts`()
            BEGIN
                SELECT * FROM `table_contacts`;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getAllServices`()
            BEGIN
                SELECT * FROM table_articles
                WHERE article_type = 'service' AND is_published = true;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getAllUsers`()
            BEGIN
                SELECT * FROM table_users;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getArticleById`(
                IN p_id int
            )
            BEGIN
                SELECT * FROM table_articles ta
                WHERE ta.id = p_id;
            END
        ");

        // FIX 1: parameter aslinya bernama `slug`, sama persis dengan kolom `table_articles.slug`.
        // Di MySQL, kalau nama parameter sama dengan nama kolom, referensi tanpa qualifier akan
        // diartikan sebagai KOLOM, bukan parameter - jadi `WHERE ta.slug = slug` efektif jadi
        // `WHERE ta.slug = ta.slug` (selalu TRUE, return SEMUA baris). Di-rename ke `p_slug`.
        //
        // FIX 2: parameter varchar tanpa COLLATE eksplisit ikut collation default DATABASE
        // (utf8mb4_general_ci di sini), sedangkan kolom `slug` dibuat dengan utf8mb4_unicode_ci -
        // beda collation bikin error "Illegal mix of collations" saat dibandingkan pakai `=`.
        // Makanya collation parameter disamakan ke utf8mb4_unicode_ci.
        DB::unprepared("
            CREATE PROCEDURE `_getArticleBySlug`(
                IN p_slug varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
            )
            BEGIN
                SELECT * FROM table_articles ta
                WHERE ta.slug = p_slug;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getContactbyId`(
                IN contact_id int
            )
            BEGIN
                SELECT * FROM table_contacts
                WHERE id = contact_id;
            END
        ");

        // FIX: query aslinya SELECT dari `table_user` (tanpa 's'), tabelnya tidak ada -
        // pasti error "Table doesn't exist". Dibetulkan ke `table_users`.
        DB::unprepared("
            CREATE PROCEDURE `_getUserById`(
                IN user_id int
            )
            BEGIN
                SELECT * FROM table_users
                WHERE id = user_id;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_updateArticle`(
                IN p_article_id int(11),
                IN p_article_type varchar(255),
                IN p_title varchar(255),
                IN p_slug varchar(255),
                IN p_content varchar(255),
                IN p_is_published boolean,
                IN p_updated datetime
            )
            BEGIN
                UPDATE `table_articles`
                SET
                    `article_type` = COALESCE(p_article_type, article_type),
                    `title` = COALESCE(p_title, title),
                    `slug` = COALESCE(p_slug, slug),
                    `content` = COALESCE(p_content, content),
                    `is_published` = COALESCE(p_is_published, is_published),
                    `updated` = COALESCE(p_updated, updated)
                WHERE `id` = p_article_id;
            END
        ");

        // FIX: WHERE clause aslinya `WHERE id = user_id`, padahal parameternya bernama
        // `p_user_id` - `user_id` bukan kolom table_users maupun parameter yang valid,
        // jadi akan error "Unknown column 'user_id'". Dibetulkan ke `p_user_id`.
        DB::unprepared("
            CREATE PROCEDURE `_updateUser`(
                IN p_user_id int(11),
                IN p_email varchar(255),
                IN p_passwordd varchar(255),
                IN p_full_name varchar(255),
                IN p_rolee varchar(255),
                IN p_is_active boolean,
                IN p_updated datetime
            )
            BEGIN
                UPDATE `table_users`
                SET
                    `fullname` = COALESCE(p_full_name, fullname),
                    `email` = COALESCE(p_email, email),
                    `password` = COALESCE(p_passwordd, password),
                    `role` = COALESCE(p_rolee, role),
                    `is_active` = COALESCE(p_is_active, is_active),
                    `updated` = COALESCE(p_updated, updated)
                WHERE `id` = p_user_id;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->procedures as $name) {
            DB::unprepared("DROP PROCEDURE IF EXISTS `{$name}`");
        }
    }
};
