<?php
/**
 *  Opening Hours: Module: I18n
 */

namespace OpeningHours\Module;

if ( class_exists( 'OpeningHours\Module\I18n' ) )
  return;

class I18n extends AbstractModule {

  /**
   *  Constants
   */
  const   LANGUAGE_PATH  = '/language/';

  /**
   *  Date Format
   *
   *  @access     protected
   *  @static
   *  @type       string
   */
  protected static $dateFormat;

  /**
   *  Time Format
   *
   *  @access     protected
   *  @static
   *  @type       string
   */
  protected static $timeFormat;

  /**
   *  Constructor
   *
   *  @access       public
   */
  public function __construct() {

    self::setDateFormat( get_option( 'date_format' ) );
    self::setTimeFormat( get_option( 'time_format' ) );

    $this->registerHookCallbacks();

  }

  /**
   *  Register Hook Callbacks
   *
   *  @access       public
   */
  public function registerHookCallbacks() {

    add_action( 'plugins_loaded',       array( __CLASS__, 'registerTextdomain' ) );

  }

  /**
   *  Register Textdomain
   *
   *  @access       public
   *  @static
   *  @wp_action    plugins_loaded
   */
  public static function registerTextdomain() {

    load_plugin_textdomain( self::TEXTDOMAIN, false, 'wp-opening-hours' . self::LANGUAGE_PATH );

  }

  /**
   *  Getter: Date Format
   *
   *  @access       public
   *  @static
   *  @return       string
   */
  public static function getDateFormat () {
    return self::$dateFormat;
  }

  /**
   *  Setter: Date Format
   *
   *  @access       public
   *  @static
   *  @param        string    $dateFormat
   *  @return       I18n
   */
  public static function setDateFormat ( $dateFormat ) {
    self::$dateFormat = $dateFormat;
  }

  /**
   *  Getter: Time Format
   *
   *  @access       public
   *  @static
   *  @return       string
   */
  public static function getTimeFormat () {
    return self::$timeFormat;
  }

  /**
   *  Setter: Time Format
   *
   *  @access       public
   *  @static
   *  @param        string    $timeFormat
   *  @return       I18n
   */
  public static function setTimeFormat ( $timeFormat ) {
    self::$timeFormat = $timeFormat;
  }

  /**
   *  Get Weekdays Array
   *
   *  @access       public
   *  @static
   *  @return       array
   */
  public static function getWeekdays () {
    return array(
      'monday'      => __( 'Monday', self::TEXTDOMAIN ),
      'tuesday'     => __( 'Tuesday', self::TEXTDOMAIN ),
      'wednesday'   => __( 'Wednesday', self::TEXTDOMAIN ),
      'thursday'    => __( 'Thursday', self::TEXTDOMAIN ),
      'friday'      => __( 'Friday', self::TEXTDOMAIN ),
      'saturday'    => __( 'Saturday', self::TEXTDOMAIN ),
      'sunday'      => __( 'Sunday', self::TEXTDOMAIN )
    );
  }
}
?>
