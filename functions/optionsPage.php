<?php
// setting up options page
// http://blog.themeforest.net/wordpress/create-an-options-page-for-your-wordpress-theme/

// setting up short name for theme and fields needed for options page
$themename = "BogeyWebDesign 1";
$shortname = "bwd1";
$options = array (
  array("type" => "open"),
  array("name" => "Header", "desc" => "Intro header for home page", "id" => $shortname."_intro_header", "type" => "text"),
  array("name" => "Message", "desc" => "Intro message for home page", "id" => $shortname."_intro_message", "type" => "textarea"),
  array("type" => "close")
);

// adding actual admin page call
function mytheme_add_admin() {
  global $themename, $shortname, $options;

  if ( $_GET['page'] == basename(__FILE__) ) {
    // saving changes
    if ( 'save' == $_REQUEST['action'] ) {
      foreach ($options as $value) {
        update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

      foreach ($options as $value) {
        if(isset($_REQUEST[ $value['id'] ])) { 
          update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
        }
        else {
          delete_option( $value['id'] );
        }
      }

      header("Location: themes.php?page=optionsPage.php&saved=true");
      die;

    } 
    
    // resetting changes
    else if('reset' == $_REQUEST['action'] ) {
      foreach ($options as $value) {
        delete_option( $value['id'] );
      }

      header("Location: themes.php?page=optionsPage.php&reset=true");
      die;
    }
  }

  add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

// designing admin page
function mytheme_admin() {
  global $themename, $shortname, $options;

  // alert on successful save/reset
  if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
  if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">
  <h2><?php echo $themename; ?> Settings</h2>

  <form method="post">

  <?php 
  foreach ($options as $value) {
    switch ( $value['type'] ) {

      case "open":
      ?>
        <table width="100%" border="0" style="padding:10px;">
      <?php 
      break;

      case "close":
      ?>
        </table>
      <?php
      break;

      // adding a text field
      case 'text':
      ?>
        <tr>
          <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
          <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?>" /></td>
        </tr>
        <tr>
          <td><small><?php echo $value['desc']; ?></small></td>
        </tr>
        <tr>
          <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
        </tr>
      <?php
      break;

      // adding a text area
      case 'textarea':
      ?>
        <tr>
          <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
          <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>
        </tr>
        <tr>
          <td><small><?php echo $value['desc']; ?></small></td>
        </tr>
        <tr>
          <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
        </tr>
      <?php
      break;
    }
  }
  ?>
    <p class="submit">
      <input name="save" type="submit" value="Save changes" />
      <input type="hidden" name="action" value="save" />
    </p>
  </form>
  <form method="post">
    <input name="reset" type="submit" value="Reset" />
    <input type="hidden" name="action" value="reset" />
  </form>
</div>
<?php
}

add_action('admin_menu', 'mytheme_add_admin');
?>