<?php
/*
Plugin Name: Saksh WP SMTP
Version: 1.1.1
Plugin URI: #
Author: susheelhbti
Author URI: http://www.sakshamappinternational.com/
Description: Integrate wordpress to your mandrill , sendgrid , getresponse, email-marketing247 SMTP Server, Amazon SES or any SMTP Server.
*/
class saksh_settings_page {
    function __construct()
    {
        $saksh_email_by_smtp = new Saksh_Email_By_SMTP();
        add_action('admin_menu', array($saksh_email_by_smtp, 'saksh_settings_page' ) );
    }
    
}

new saksh_settings_page;
class Saksh_Email_By_SMTP{
    /**
* Holds the values to be used in the fields callbacks
*/    private $sebso;
    /**
* Start up
*/    public  function __construct()
    {
        $this->sebso = get_option('saksh_email_admin' );
        add_action('admin_init', array($this, 'saksh_page_init' ) );
    }
    
    public  function saksh_settings_page()
    {
        // This page will be under "Settings"
        add_options_page('Settings Admin',             'Saksh WP SMTP',             'manage_options',             'saksh_wordpress_smtp',             array($this, 'saksh_smtp_admin_page' )        );
    }
    
    /**
* Options page callback
*/    public  function saksh_smtp_admin_page()
    {
        $this->sebso = get_option('saksh_email_admin' );
       ?>
        <div class="wrap">
        <H2>Saksh Wordpress SMTP</h2>
        <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
        <?php  echo saksh_offer();
        ?>
        <div class="postbox">
        <div class="inside">
        <form method="post" action="options.php">
        <?php
        // This prints out all hidden setting fields
        settings_fields('saksh_email_group' );
        do_settings_sections('saksh_email_admin' );
        submit_button();
        ?>
        </form>
		<?php 
        $this->saksh_sendtestmail();
        ?>

		
		
        </div>
        </div> </div> </div></div>
        <style>
        .form-table {
            clear: none;
        }
        </style>
        <?php
    }
    
	public function saksh_sendtestmail()
	{
		
		$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?> <p> Send a test email </p>
			 <form method="post" action="options-general.php?page=saksh_wordpress_smtp">
       <input type="hidden" name="action" value="submit"> 
         <input type="email" id="testmail" name="testmail" placeholder="email id" value="" required  />

		
		<input type="submit" value="submit"> 
        </form>
		
		 <?php
    } 
else                /* send the submitted data */
    {
    $testmail=$_REQUEST['testmail']; 
	$ar=array();
	$ar['to']=$testmail;
	$ar['message']="Test Eamil by plugin saksh wp smtp";
	$ar['subject']="Test Eamil by plugin saksh wp smtp";
	
	saksh_send_email_direct($ar);

	
 	}
	}
	
	
    public  function saksh_page_init()
    {
        register_setting('saksh_email_group', // Option group
        'saksh_email_admin', // Option name
        array($this, 'sanitize' ) // Sanitize
        );
		
		 add_settings_section(
            'setting_section_id', // ID
            '', // Title
            array( $this, 'print_section_info' ), // Callback
            'saksh_email_admin' // Page
        );  
		
		
        add_settings_field('from_name',  
        'From Name',  
        array($this, 'from_name_callback' ), //
        'saksh_email_admin',  
        'setting_section_id' // Section
        );
        add_settings_field('from_email', //
        'From Email', // Title
        array($this, 'from_email_callback' ), //
        'saksh_email_admin',//
        'setting_section_id' //
        );
        add_settings_field('host', //
        'SMTP Server', // Title
        array($this, 'host_callback' ), //
        'saksh_email_admin',//
        'setting_section_id' //
        );
        add_settings_field('auth', //
        'SMTPAuth', // Title
        array($this, 'auth_callback' ), //
        'saksh_email_admin',//
        'setting_section_id' //
        );
        add_settings_field('port', //
        'Port', // Title
        array($this, 'port_callback' ), //
        'saksh_email_admin',//
        'setting_section_id' //
        );
        add_settings_field('smtp', //
        'SMTPSecure', // Title
        array($this, 'smtpsecure_callback' ), //
        'saksh_email_admin',//
        'setting_section_id' //
        );
        add_settings_field('username', //
        'User Name', // Title
        array($this, 'username_callback' ), //
        'saksh_email_admin',//
        'setting_section_id' //
        );
        add_settings_field('password', //
        'Password', // Title
        array($this, 'password_callback' ), //
        'saksh_email_admin',//
        'setting_section_id' //
        );
    }
    
    public   function sanitize($input )
    {
        $new_input = array();
        
        if (isset($input['from_name'] ) ) {
            $new_input['from_name'] = sanitize_text_field($input['from_name'] );
        }
        
        if (isset($input['from_email'] ) ) {
            $new_input['from_email'] = sanitize_email($input['from_email'] );
        }
        
        if (isset($input['host'] ) ) {
            $new_input['host'] = sanitize_text_field($input['host'] );
        }
        
        if (isset($input['auth'] ) ) {
            $new_input['auth'] = sanitize_text_field($input['auth'] );
        }
        
        if (isset($input['SMTPAuth'] ) ) {
            $new_input['SMTPAuth'] = sanitize_text_field($input['SMTPAuth'] );
        }
        
        if (isset($input['port'] ) ) {
            $new_input['port'] = sanitize_text_field($input['port'] );
        }
        
        if (isset($input['smtpsecure'] ) ) {
            $new_input['smtpsecure'] = sanitize_text_field($input['smtpsecure'] );
        }
        
        if (isset($input['username'] ) ) {
            $new_input['username'] = sanitize_text_field($input['username'] );
        }
        
        if (isset($input['password'] ) ) {
            $new_input['password'] = sanitize_text_field($input['password'] );
        }
        return $new_input;
    }
      /** 
     * Print the Section text
     */
    public function print_section_info()
    {
       
    }
    /**
* Get the settings option array and print one of its values
*/    public   function from_name_callback()
    {
        printf('<input type="text" id="from_name" name="saksh_email_admin[from_name]" value="%s" />', isset($this->sebso['from_name'] ) ? esc_attr($this->sebso['from_name']) :
        'email-marketing247'        );
    }
    
    /**
* Get the settings option array and print one of its values
*/    public  function from_email_callback()
    {
        printf('<input type="text" id="from_email" name="saksh_email_admin[from_email]" value="%s" />',  isset($this->sebso['from_email'] ) ? esc_attr($this->sebso['from_email']) :
        ''        );
    }
    
    /**
* Get the settings option array and print one of its values
*/    public function host_callback()
    {
        printf('<input type="text" id="host" name="saksh_email_admin[host]" value="%s" />',  isset($this->sebso['host'] ) ? esc_attr($this->sebso['host']) :
        'smtp.email-marketing247.com'        );
    }
    
    /**
* Get the settings option array and print one of its values
*/    public   function auth_callback()
    {
        printf('<input type="text" id="auth" name="saksh_email_admin[auth]" value="%s" />( yes / no)',   isset($this->sebso['auth'] ) ? esc_attr($this->sebso['auth']) :
        'yes'        );
    }
    
    /**
* Get the settings option array and print one of its values
*/    public  function port_callback()
    {
        printf('<input type="text" id="port" name="saksh_email_admin[port]" value="%s" />', isset($this->sebso['port'] ) ? esc_attr($this->sebso['port']) :
        '587'        );
    }
    
    /**
* Get the settings option array and print one of its values
*/    public  function smtpsecure_callback()
    {
        printf('<input type="text" id="smtpsecure" name="saksh_email_admin[smtpsecure]" value="%s" />( ssl / tls / none)', isset($this->sebso['smtpsecure'] ) ? esc_attr($this->sebso['smtpsecure']) :
        'tls'        );
    }
    
    /**
* Get the settings option array and print one of its values
*/    public   function username_callback()
    {
        printf('<input type="text" id="username" name="saksh_email_admin[username]" value="%s" />',  isset($this->sebso['username'] ) ? esc_attr($this->sebso['username']) :
        ''        );
    }
    
    /**
* Get the settings option array and print one of its values
*/    public  function password_callback()
    {
        printf('<input type="password" id="password" name="saksh_email_admin[password]" value="%s" />',    isset($this->sebso['password'] ) ? esc_attr($this->sebso['password']) :
        ''        );
    }
    
}


if (is_admin() ) {
    $saksh_email_by_smtp = new Saksh_Email_By_SMTP();
}
add_action('phpmailer_init', 'saksh_settings' );
function saksh_settings($phpmailer )
{
    $saksh = get_option('saksh_email_admin' );
    $phpmailer->isSMTP();
    $phpmailer->FromName = $saksh['from_name'];
    $phpmailer->From = $saksh['from_email'];
    $phpmailer->Host = $saksh['host'];
    $phpmailer->SMTPAuth = $saksh['auth'];
 
    $phpmailer->Port =  $saksh['port'];
    $phpmailer->SMTPSecure  =  $saksh['smtpsecure'];
    $phpmailer->Username = $saksh['username'];
    $phpmailer->Password = $saksh['password'];
	
	//$phpmailer->XMailer = "Saksh WP SMTP by http://www.sakshamappinternational.com/";
   
   
}


function saksh_offer()
{
    ?>
    <div id="postbox-container-1" class="postbox-container">
    <div class="meta-box-sortables">
    <div class="postbox">
    <h3><span><img src="http://www.email-marketing247.com/wp-content/uploads/2014/05/10516907_664330970315508_1940511407_n-300x37.jpg"    alt="email-marketing247 SMTP Server" width=80% /></span></h3>
    <div class="inside">
    <p><em>
    email-marketing247 is now a robust platform, equipped with the state of the art infrastructure, 24 x 7 dedicated connectivity to the internet, and scalable architecture. </em>
    </p>
    <p><em>For our WordPress Plugin we do offer a huge discount	  	</p>
    <p class="voucher" style="background:#21759B; border-radius: 5px; padding:10px; text-align:center; color:#FFF; line-height:15px;"><strong style="font-size:16px">30% OFF ALL<br />Email Plan Packages*</strong><br />
    Your Promotional Code:<strong style="font-size:32px; background:#FFF; color:#21759B; line-height: 38px; display:block; padding: 2px 0">Saksham</strong>Discount can be applied on Checkout<a class="button" href="http://www.email-marketing247.com/pricing-plans/" target="_blank">Click Here to Buy Now</a>
    </p><strong style="color: #21759B">
    Recommanded plan 19.99$ per month <br>unlimited emails 5 000 Subscribers
    </strong>
    <a class="button" href="http://www.email-marketing247.com/checkout/?add-to-cart=4882" target="_blank"> Buy Now</a>
    </div>
    </div>
    </div>
    </div>
    <?php
}


function saksh_send_email_direct($email){
	
	
    $saksh = get_option('saksh_email_admin' );
	
	 
		require_once( ABSPATH . WPINC . '/class-phpmailer.php' );
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = $email['message'];
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = $saksh['host']; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication

$mail->Port       =   $saksh['port'];                    // set the SMTP port for the GMAIL server
$mail->Username   = $saksh['username']; // SMTP account username
$mail->Password   = $saksh['password'];        // SMTP account password

$mail->SetFrom($saksh['from_email'], $saksh['from_name']);
 

$mail->Subject    =  $email['subject'];


   

$mail->MsgHTML($body);

$address = $email['to'];
$mail->AddAddress($address, "");


  echo "<pre>";
if(!$mail->Send()) {
  echo "<pre>Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
    
}


/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function example_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'example_dashboard_widget',         // Widget slug.
                 'Deal',         // Title.
                 'example_dashboard_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function example_dashboard_widget_function() {

	// Display whatever it is you want to show.
	echo "<h1>200 email per day free</h1><br> Register and start sending <a href='http://www.email-marketing247.com/?saksh_wp_smtp' target='_blank' >Start Now </a> <br> Deal by Sakshampp International Pvt. Ltd.";
}