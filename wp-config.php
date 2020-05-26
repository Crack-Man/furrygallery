<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'AHTOH' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'AHTOH' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '64odobir' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@T#5B}^:|P=S9RJ>5p|&JvW$j)eY(b*yV7CJ=eu2B-6Uy[D3Jf1WbEEZ25e9><tq' );
define( 'SECURE_AUTH_KEY',  'J.Gq9+nn?{T@c{$~v%P-o@4m&>Q1PD:`eUyBuc1oIJy1c*-OCx=j|USMjdOpfRx9' );
define( 'LOGGED_IN_KEY',    '{m4mh{ kxw/qP5MZp|v@siCu!cQNbU%GC!56 MUf>,g-2U.%QO&|8r+[=H>l*b=_' );
define( 'NONCE_KEY',        'wxlz.t?=uVN2smu;[g;{`TvxJ|Zl|+WH!u+v4f[F!ERH?A[q$S^Q=y2=qWd^F<av' );
define( 'AUTH_SALT',        '7MFpkCGe=[_%dv^@Q}F:|4DRwpN+E7o8oWHYoR8^v(aDT+z&@NdAP[]`e],H!/#t' );
define( 'SECURE_AUTH_SALT', '|iqR6Tv&]]tns>ujY(,p<<NcJ#{BhQtj!sU?wB)1Rr-E&^p`~>q28-|1I92CRp-C' );
define( 'LOGGED_IN_SALT',   'X%kxNh*/19x_hty+M#7>3~?w[h5p,x,6dMkHXN~Cp{LU5?3|;=C7c`6mjx*A/-$M' );
define( 'NONCE_SALT',       'T|qvG6W(Am92#+tk3/YHPt&c9QJ>zP6KHPwMMr-x}h[9H*=V~hcl.-:Ff_|Sr8:L' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
