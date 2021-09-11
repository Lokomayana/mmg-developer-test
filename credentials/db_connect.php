<?php

/*============================================================================================================
  DATABASE CONNECTION PARAMETERS
  ==============================

  Enter your database connection parameters. If you are not sure of this, please contact
  your web host. If you get a message along the lines of 'Access denied for user..', then
  your connection information is not correct.

  Important: The table prefix is for people with only a single database. If you aren`t bothered
  about the prefix, do NOT comment it out. Leave it blank if no prefix is required.

==============================================================================================================*/

define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');

/*============================================================================================================
  MYSQL CHARACTER SET
  ===================

  For more info visit:
  http://dev.mysql.com/doc/refman/5.0/en/charset.html

  utf8 should be fine in most cases.

============================================================================================================*/

define('DB_CHAR_SET', 'utf8');

/*============================================================================================================
  MYSQL LOCALE
  ============

  Specify the locale for your database. Where date_format is used to convert dates, this will convert the
  date into your own locale. If you aren`t sure, leave as is.

  For more info visit:
  http://dev.mysql.com/doc/refman/5.0/en/locale-support.html (MySQL5)
  http://dev.mysql.com/doc/refman/4.1/en/locale-support.html (MySQL4)

  Examples:
  define('DB_LOCALE', 'en_US'); = English/United States
  define('DB_LOCALE', 'en_AU'); = English/Australia
  define('DB_LOCALE', 'fi_FI'); = Finnish/Finland

============================================================================================================*/

define('DB_LOCALE', 'en_GB');

/*============================================================================================================
  SECRET KEY OR SALT
  ==================

  Specify secret key (also known as salt). This is for security and is encrypted during script execution.
  DO NOT change this value at a later date. Change ONLY before a clean install.

  This should ideally be a mix of random numbers, letters and characters. You can use sha1 and md5 for added
  security. You should not use something that changes with each page load.

  GOOD examples:
  define('SECRET_KEY', 'jh7sghe[]]0gjhfger');
  define('SECRET_KEY', md5('jh7sghe[]]0gjhfger'));
  define('SECRET_KEY', sha1('jh7sghe[]]0gjhfger'));

  BAD examples:
  define('SECRET_KEY', rand(1111,9999));
  define('SECRET_KEY', sha1(rand(1111,9999)));

  If you are using the cart system on multiple domains, set a different key for each

============================================================================================================
*/

define('SECRET_KEY', md5('jh7sghe[]]0gjhfger'));

/*============================================================================================================
  MYSQL ERRORS
  ============

  By default MySQL errors are NOT shown onscreen. This can be a security issue as it reveals server paths
  and sensitive data to visitors. If you are sure the system is working fine, this value should be set
  to 0 to disable mysql errors. If set to 0, specify friendly message in MYSQL_DEFAULT_ERROR.

  Note: HTML may be used in the default error, but apostrophes MUST be escaped with a backslash. ie: \'

============================================================================================================*/

define('ENABLE_MYSQL_ERRORS', 0);
define('MYSQL_DEFAULT_ERROR',  "please try again later");


/*============================================================================================================
  CONNECTING TO DATABASE
  ======================

  Note: HTML may be used in the default error, but apostrophes MUST be escaped with a backslash. ie: \'

============================================================================================================*/



if (function_exists('mysqli_connect')) {
    $con = @($GLOBALS["___msw_sqli"] = mysqli_connect(trim(DB_HOST), trim(DB_USER), trim(DB_PASS)));
    if (!$con) {
      die(MYSQL_DEFAULT_ERROR);
    }
    if ($con && !((bool) mysqli_query($con, 'USE `' . DB_NAME . '`'))) {
      die(MYSQL_DEFAULT_ERROR);
    } else {
      if (!mysqli_ping($GLOBALS["___msw_sqli"])) {
         die(MYSQL_DEFAULT_ERROR);
      }
    }
    if ($con) {
      // Character set..
      if (DB_CHAR_SET) {
        if (strtolower(DB_CHAR_SET) == 'utf-8') {
          $change = str_replace('-', '', DB_CHAR_SET);
        }
        @mysqli_query($GLOBALS["___msw_sqli"], "SET CHARACTER SET '" . (isset($change) ? $change : DB_CHAR_SET) . "'");
        @mysqli_query($GLOBALS["___msw_sqli"], "SET NAMES '" . (isset($change) ? $change : DB_CHAR_SET) . "'");
      }
      // Locale..
      if (defined('DB_LOCALE')) {
        if (DB_CHAR_SET && DB_LOCALE) {
          @mysqli_query($GLOBALS["___msw_sqli"], "SET `lc_time_names` = '" . DB_LOCALE . "'");
        }
      }
    }
  } else {
     die(MYSQL_DEFAULT_ERROR);
 }

?>
