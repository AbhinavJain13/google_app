<?php
$_user_location = 'users';
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css'; // use a custom stylesheet
require (AT_INCLUDE_PATH.'header.inc.php');
// fetching module configs 
$query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
$result = mysql_query($query, $db);
$row = mysql_fetch_array($result);
$my_string = $row['flags'];
$bit = $my_string[0];
$doc = $my_string[1];
$cal = $my_string[2];
$you = $my_string[3];
// fetching calendar configs 
$query = "SELECT * FROM ".TABLE_PREFIX."calendar_settings";
$result = mysql_query($query, $db);
$row = mysql_fetch_array($result);
echo $row['client_id'];
$href_string = "mods/google_app/calendar.php?a=".$row['client_id'].
		    "&b=".$row['client_secret'].
		    "&c=".$row['redirect_uri'].
		    "&d=".$row['developer_key'];
?>

<!-- Navigation fieldset -->
<div id="subnavlistcontainer">
    <div id="subnavbacktopage"></div>
    <ul id="subnavlist">
        <li><a href="mods/google_app/index_mystart.php">Home</a></li>
<?php
        
	// check if flags are set
	if($doc){
?>		
		<li><a href="mods/google_app/doc.php">Google Docs</a></li>		
<?php
	}
?>
                <li class="active">Google Calendars</li>
<?php
	if($you){
?>		
		<li><a href="mods/google_app/you.php">Youtube</a></li>		
<?php		
	}  	  
?>      
    </ul>
</div>

<!-- Content HTML rendered -->
<div class="input-form">
	<fieldset class="group_form">
            <legend class="group_form">Google Calendars</legend>
            <center>
                <a href="<?php echo $href_string; ?>"><?php echo _AT('access_calendars'); ?></a><br />
            </center>
	</fieldset>	
</div>

<?php 
require (AT_INCLUDE_PATH.'footer.inc.php'); 
?>
