<?php // -*-mode: PHP; coding:utf-8;-*-
namespace MRBS;

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 *
 *   NOTE: if you include or require other files from this file, for example
 *   to store your database details in a separate location, then you should
 *   use an absolute and not a relative pathname.
 **************************************************************************/

/**********
 * Timezone
 **********/
 
// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "Europe/Berlin";


/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL
$dbsys = "mysql";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$db_host = "db";
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
// $db_port = 1234;
// Database name:
$db_database = "mrbs_raumbuchung";
// Schema name.  This only applies to PostgreSQL and is only necessary if you have more
// than one schema in your database and also you are using the same MRBS table names in
// multiple schemas.
//$db_schema = "public";
// Database login user name:
$db_login = "mrbsdbuser";
// Database login password:
$db_password = 'gequ8ao3geeNgeecoh4a';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Set $db_persist to TRUE to use PHP persistent (pooled) database connections.  Note
// that persistent connections are not recommended unless your system suffers significant
// performance problems without them.   They can cause problems with transactions and
// locks (see http://php.net/manual/en/features.persistent-connections.php) and although
// MRBS tries to avoid those problems, it is generally better not to use persistent
// connections if you can.
$db_persist = false;


// LDAP auth für linuxmuster62 mit einem Workaround, so
// dass man den Zugang auf Gruppen einschränken kann
$auth["type"] = "linuxmuster62"; 

// LDAP Server
// $ldap_host = "ldaps://servername:636";
// $ldap_host = "ldaps://ip-Addr:636";
$ldap_host = "ldaps://FIXME-LDAPHOST.TLD:636";

// Gruppen, die Zugang zum MRBS haben sollen
// $ldap_lmn_accessgroups = array("teachers","p_mrbs");
// Wenn alle Benutzer zugang haben sollen, auskommentieren
$ldap_lmn_accessgroups = array("teachers","p_mrbs");

// Usertree: ou=accounts + , + basedn des LMN62 Servers
// $ldap_base_dn = "ou=accounts,dc=linuxmuster,dc=lokal";
$ldap_base_dn = "ou=accounts,dc=FIXME,dc=FIXME";

// User Attribut, für lmn62 "uid"
$ldap_user_attrib = "uid";

// Grouptree: ou=groups + , + basedn des LMN62 Servers
// $ldap_base_dn = "ou=igroups,dc=linuxmuster,dc=lokal";
$ldap_lmn_groupdn = "ou=groups,dc=FIXME,dc=FIXME";

/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */

// Bezeichnungen anpassen
$vocab_override['de']['mrbs'] = "Raumbuchung";
$vocab_override['de']['areas'] = "Bereiche";
$vocab_override['de']['rooms'] = "Räume";
$vocab_override['de']['period'] = "Stunde";
$vocab_override['de']['periods'] = "Stunden";

// Theme wählen
$theme = "default";


/*************
 * Entry Types
 *************/

// This array lists the configured entry type codes. The values map to a
// single char in the MRBS database, and so can be any permitted PHP array
// character.
//
// The default descriptions of the entry types are held in the language files
// as "type.X" where 'X' is the entry type.  If you want to change the description
// you can override the default descriptions by setting the $vocab_override config
// variable.   For example, if you add a new booking type 'C' the minimum you need
// to do is add a line to config.inc.php like:
//
// $vocab_override["en"]["type.C"] =     "New booking type";
//
// Below is a basic default array which ensures there are at least some types defined.
// The proper type definitions should be made in config.inc.php.
//
// Each type has a color which is defined in the array $color_types in the styling.inc
// file in the Themes directory

unset($booking_types);
$booking_types[] = "E";
$booking_types[] = "I";
$vocab_override["de"]["type.E"] = "Extern";
$vocab_override["de"]["type.I"] = "Intern";

// Default type for new bookings
$default_type = "I";

// The company name is mandatory.   It is used in the header and also for email notifications.
// The company logo, additional information and URL are all optional.

$mrbs_company = "FIXME Tolle Schule";   // This line must always be uncommented ($mrbs_company is used in various places)

// Uncomment this next line to use a logo instead of text for your organisation in the header
//$mrbs_company_logo = "your_logo.gif";    // name of your logo file.   This example assumes it is in the MRBS directory

// Uncomment this next line for supplementary information after your company name or logo
//$mrbs_company_more_info = "You can put additional information here";  // e.g. "XYZ Department"

// Uncomment this next line to have a link to your organisation in the header
//$mrbs_company_url = "http://www.your_organisation.com/";


// General settings
// If you want only administrators to be able to make and delete bookings,
// set this variable to TRUE
$auth['only_admin_can_book'] = FALSE;
// If you want only administrators to be able to make repeat bookings,
// set this variable to TRUE
$auth['only_admin_can_book_repeat'] = FALSE;
// If you want only administrators to be able to make bookings spanning
// more than one day, set this variable to TRUE.
$auth['only_admin_can_book_multiday'] = FALSE;
// If you want only administrators to be able to select multiple rooms
// on the booking form then set this to TRUE.  (It doesn't stop ordinary users
// making separate bookings for the same time slot, but it does slow them down).
$auth['only_admin_can_select_multiroom'] = FALSE;
// If you don't want ordinary users to be able to see the other users'
// details then set this to TRUE.  (Only relevant when using 'db' authentication]
$auth['only_admin_can_see_other_users'] = FALSE;
// If you want to prevent the public (ie un-logged in users) from
// being able to view bookings, set this variable to TRUE
$auth['deny_public_access'] = TRUE;
// Set to TRUE if you want admins to be able to perform bulk deletions
// on the Report page.  (It also only shows up if JavaScript is enabled)
$auth['show_bulk_delete'] = FALSE;

unset($auth["admin"]);              // Include this when copying to config.inc.php
$auth["admin"][] = "administrator";
#$auth["admin"][] = "andererbenutzer";
#$auth["admin"][] = "andererbenutzer";
#$auth["admin"][] = "andererbenutzer";

// Wochenstart Montags
$weekstarts = 1;
// Samstag und Sonntag verstecken
$hidden_days = array("6","0");

// should areas be shown as a list or a drop-down select box?
$area_list_format = "list";
//$area_list_format = "select";

// Define default starting view (month, week or day)
// Default is day
$default_view = "week";

// Damit die Stundeneinteilung verwendet wird, muss in der
// Weboberfläche der Modus für den entsprechenden Raumbereich auf
// "series" gestellt werden.
unset($periods);
$periods[] = "[1]  07:30-08:15";
$periods[] = "[2]  08:20-09:05";
$periods[] = "[3]  09:10-09:55";
$periods[] = "[P]  Grosse Pause";
$periods[] = "[4]  10:10-10:55";
$periods[] = "[5]  11:00-11:45";
$periods[] = "[6]  11:50-12:35";
$periods[] = "[P]  Mittagspause";
$periods[] = "[7]  14:00-14:45";
$periods[] = "[8]  14:50-15:35";
$periods[] = "[P]  Wechselpause";
$periods[] = "[9]  15:45-16:30";
$periods[] = "[10] 16:35-17:20";



// 'auth_ldap' configuration settings
// If you do not want to use LDAP v3, change the following to false.
// This can be an array.
$ldap_v3 = true;

// If you want to use TLS, change the following to true.
// This can be an array.
$ldap_tls = false;

// with, set the following to the attribute that holds the user's
// "username". In Microsoft AD directories this is "sAMAccountName"
// This can be an array.
//$ldap_dn_search_attrib = "sAMAccountName";

// If you need to bind as a particular user to do the search described
// above, specify the DN and password in the variables below
// These two parameters can be arrays.
// $ldap_dn_search_dn = "cn=Search User,ou=Users,dc=some,dc=company";
// $ldap_dn_search_password = "some-password";

// 'auth_ldap' extra configuration for ldap configuration of who can use
// the system
// If it's set, the $ldap_filter will be used to determine whether a
// user will be granted access to MRBS
// This can be an array.
// An example for Microsoft AD:
//$ldap_filter = "(&(gidNumber=10000)(objectClass=person))";

// If you need to disable client referrals, this should be set to TRUE.
// Note: Active Directory for Windows 2003 forward requires this.
// $ldap_disable_referrals = TRUE;

// Set to TRUE to tell MRBS to look up a user's email address in LDAP.
// Utilises $ldap_email_attrib below
$ldap_get_user_email = false;
// The LDAP attribute which holds a user's email address
// This can be an array.
$ldap_email_attrib = 'mail';

// The DN of the LDAP group that MRBS admins must be in. If this is defined
// then the $auth["admin"] is not used.
// This can be an array.
// $ldap_admin_group_dn = 'cn=admins,ou=whoever,dc=example,dc=com';

// The LDAP attribute that holds group membership details. Used with
// $ldap_admin_group_dn, above.
// This can be an array.
$ldap_group_member_attrib = 'memberof';

// Set to TRUE if you want MRBS to call ldap_unbind() between successive
// attempts to bind. Unbinding while still connected upsets some
// LDAP servers
$ldap_unbind_between_attempts = false;

// Output debugging information for LDAP actions
$ldap_debug = true;

