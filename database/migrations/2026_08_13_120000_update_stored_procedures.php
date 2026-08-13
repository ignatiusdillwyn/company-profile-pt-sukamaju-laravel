<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Semua procedure yang disentuh migration ini (dibuat baru atau di-redefine).
     * _createArticle, _updateArticle, _getUserById, _updateUser sudah ada dari migration
     * sebelumnya (2026_08_02_100000) tapi signature/isinya berubah di sini, jadi harus
     * di-drop dulu sebelum dibuat ulang.
     */
    private array $procedures = [
        '_countIncomingContact',
        '_countTotalArticle',
        '_countTotalArticleByType',
        '_countTotalBlog',
        '_countUnreadContact',
        '_createArticle',
        '_deleteContact',
        '_deleteImageArticle',
        '_getAllArticlesByType',
        '_getUserById',
        '_markAsReadContact',
        '_searchArticleByTitle',
        '_updateArticle',
        '_updateUser',
    ];

    public function up(): void
    {
        foreach ($this->procedures as $name) {
            DB::unprepared("DROP PROCEDURE IF EXISTS `{$name}`");
        }

        DB::unprepared("
            CREATE PROCEDURE `_countIncomingContact`()
            BEGIN
                SELECT count(*) FROM table_contacts
                WHERE is_read = false;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_countTotalArticle`()
            BEGIN
                SELECT count(*) FROM table_articles;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_countTotalArticleByType`(
                IN p_article_type VARCHAR(255)
            )
            BEGIN
                SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci;

                SELECT count(*) FROM table_articles
                WHERE article_type COLLATE utf8mb4_unicode_ci = p_article_type;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_countTotalBlog`()
            BEGIN
                SELECT count(*) FROM table_articles
                WHERE article_type = 'blog';
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_countUnreadContact`()
            BEGIN
                SELECT count(*) FROM table_contacts
                WHERE is_read = false;
            END
        ");

        // Redefine: sekarang termasuk kolom `image` (sebelumnya belum ada saat
        // migration 2026_08_02_100000 dibuat), sesuai urutan parameter yang dipakai
        // ArticleModel::createArticle().
        DB::unprepared("
            CREATE PROCEDURE `_createArticle`(
                IN p_user_id INT(11),
                IN p_article_type VARCHAR(255),
                IN p_title VARCHAR(255),
                IN p_slug VARCHAR(255),
                IN p_content TEXT,
                IN p_is_published TINYINT(1),
                IN p_image VARCHAR(255),
                IN p_created DATETIME,
                IN p_updated DATETIME
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
                    `image`,
                    `created`,
                    `updated`
                )
                VALUES
                (
                    p_user_id,
                    p_article_type,
                    COALESCE(p_title, ''),
                    COALESCE(p_slug, ''),
                    COALESCE(p_content, ''),
                    p_is_published,
                    COALESCE(p_image, ''),
                    p_created,
                    p_updated
                );
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_deleteContact`(
                IN contact_id INT(11)
            )
            BEGIN
                DELETE FROM `table_contacts`
                WHERE id = contact_id;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_deleteImageArticle`(
                IN p_article_id INT(11)
            )
            BEGIN
                UPDATE `table_articles`
                SET `image` = NULL
                WHERE `id` = p_article_id;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_getAllArticlesByType`(
                IN p_article_type VARCHAR(255)
            )
            BEGIN
                SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci;

                SELECT * FROM table_articles
                WHERE article_type COLLATE utf8mb4_unicode_ci = p_article_type;
            END
        ");

        // FIX: versi asli SELECT dari `table_user` (tanpa 's') - tabel itu tidak ada,
        // pasti error "Table doesn't exist". Dibetulkan ke `table_users`.
        DB::unprepared("
            CREATE PROCEDURE `_getUserById`(
                IN user_id INT
            )
            BEGIN
                SELECT * FROM table_users
                WHERE id = user_id;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_markAsReadContact`(
                IN contact_id INT(11),
                IN p_updated DATETIME
            )
            BEGIN
                UPDATE `table_contacts`
                SET
                    `is_read` = true,
                    `updated` = p_updated
                WHERE `id` = contact_id;
            END
        ");

        DB::unprepared("
            CREATE PROCEDURE `_searchArticleByTitle`(
                IN p_title VARCHAR(255),
                IN p_article_type VARCHAR(255)
            )
            BEGIN
                SELECT *
                FROM table_articles
                WHERE title LIKE CONCAT('%', CAST(p_title AS CHAR CHARACTER SET utf8mb4) COLLATE utf8mb4_unicode_ci, '%')
                AND article_type COLLATE utf8mb4_unicode_ci = p_article_type;
            END
        ");

        // Redefine: sekarang termasuk kolom `image`, dan tidak lagi mengubah `article_type`
        // (article_type tidak pernah dikirim ulang oleh ArticleModel::updateArticle()).
        DB::unprepared("
            CREATE PROCEDURE `_updateArticle`(
                IN p_article_id INT(11),
                IN p_title VARCHAR(255),
                IN p_slug VARCHAR(255),
                IN p_content LONGTEXT,
                IN p_is_published BOOLEAN,
                IN p_image VARCHAR(255),
                IN p_updated DATETIME
            )
            BEGIN
                UPDATE `table_articles`
                SET
                    `title` = COALESCE(p_title, title),
                    `slug` = COALESCE(p_slug, slug),
                    `content` = COALESCE(p_content, content),
                    `is_published` = COALESCE(p_is_published, is_published),
                    `image` = COALESCE(p_image, image),
                    `updated` = p_updated
                WHERE `id` = p_article_id;
            END
        ");

        // FIX: WHERE clause aslinya `WHERE id = user_id`, padahal parameternya bernama
        // `p_user_id` - `user_id` tidak dikenal (bukan kolom maupun parameter), akan error
        // "Unknown column 'user_id'". Dibetulkan ke `p_user_id`.
        DB::unprepared("
            CREATE PROCEDURE `_updateUser`(
                IN p_user_id INT(11),
                IN p_email VARCHAR(255),
                IN p_passwordd VARCHAR(255),
                IN p_full_name VARCHAR(255),
                IN p_rolee VARCHAR(255),
                IN p_is_active BOOLEAN,
                IN p_updated DATETIME
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

    public function down(): void
    {
        foreach ($this->procedures as $name) {
            DB::unprepared("DROP PROCEDURE IF EXISTS `{$name}`");
        }
    }
};
