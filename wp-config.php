<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'muslim_cms03');

/** Имя пользователя MySQL */
define('DB_USER', 'muslim_db');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'opkL-x6p');

/** Имя сервера MySQL */
define('DB_HOST', 'muslim.mysql');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ydLH;[KWO6p5|@f<$P!{[g?m+x-1]2mT,G-xW-BvH6 AGH+=E6k%iF,: (8A9<:5');
define('SECURE_AUTH_KEY',  '=I(ui|DKKq0>yJ.lzr,~E(o?3Yq{w&!(6|y|+ChU.|xAi0/XG*$UW|CtRc4z}s{C');
define('LOGGED_IN_KEY',    '8*7FXWN<xO|qxE-A24uH-ds&dpwe&a)f}?u4x*hJH7!?ms.L!}>*]y<$+O-n,GC?');
define('NONCE_KEY',        'bR:w3mY-u?(RC3{@-zNJrnwwbim-6.E^KB,Qn;9]]p-qw~/WRQ:~OTgp]pv.+qzv');
define('AUTH_SALT',        'uNLNeLZ5db!Gb*?c_<I|--+lE49tvYPYT^1dkg5+4v+FNH[w#A$Ia[Q$2;N!r|3l');
define('SECURE_AUTH_SALT', 'm)F3 t7}%W*=3h/gfWQ 74%V=Od++!WM^2+x;|7B5]L$}:2`+=t9NqZT-aiNE^$C');
define('LOGGED_IN_SALT',   'K}lF#[IT5gvqgXqFY2&P!CU!I,q#6C !dYkbV8LJy1+-ZtU;CKCh*]Dfg5#1S[ S');
define('NONCE_SALT',       ']k@ ;jgrY|XJU+y@vqQ$1Nap>U9adI8h[n+5H(E)IL?;$@B^f?>0zc0UnF+KJY]5');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
