<?php
/*
Plugin Name: Holidays Manager
Description: Plugin criado para gerenciar os feriados
Version: 1.0.0
Author: Joao Paulo Oliveira
License: GPL2
*/

add_action('wp_footer', 'my_footer_scripts');
function my_footer_scripts()
{

  if ( is_product() ){
     
    global $wpdb;
    global $product;

    $holidays = $wpdb->get_results("
        SELECT *
        FROM {$wpdb->prefix}holidays
    ");

    $allHolidays = array();

    foreach ($holidays as $key => $val) {
      $allHolidays[] = $val;
    }

  ?>
    <script type="text/javascript">
    jQuery( document ).ready(function() {
      jQuery("select[name=attribute_pa_mes-da-viagem]").change(function() {
        
        var productSku = '<?php if (! is_null($product) ) { echo $product->get_sku(); } else { echo ''; } ?>';
        jQuery("#pa_dia-da-ida option").each(function() {
          jQuery(this).show();
        });

        jQuery("#pa_dia-da-volta option").each(function() {
          jQuery(this).show();
        });

        var selectedMonth = jQuery(this).children("option:selected").val();

        var js_data = <?php echo json_encode($allHolidays) ?>;

        for (var i = 0; i < js_data.length; i++) {
          var monthYear = js_data[i]["month"] + '-' + js_data[i]["year"];
          var day = js_data[i]["day"];
          var field = js_data[i]["field"]; //Campo ida ou Volta

          if (js_data[i]["sku"] === '') {
            if (selectedMonth === monthYear) {
              if (field === 'ida') {
                if (parseInt(day) < 21) {
                  if (day === '4') {
                    jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "_']").hide();       
                  }else 
                  if (day === '15') {
                    jQuery("#pa_dia-da-ida option[value=_ida-dia-16]").attr('selected', 'selected'); 
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();    
                  }
                  else{
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();         
                  }            
                }else {
                  jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "']").hide();
                }
              }

              if (field === 'volta') {
                if (day === '1') {
                  jQuery("#pa_dia-da-volta option[value='volta-dia" + day + "']").hide();
                }else {
                  jQuery("#pa_dia-da-volta option[value='volta-dia-" + day + "']").hide();
                }    
              }
              
            }
          }
          else 
          if (productSku === js_data[i]["sku"]) {
            if (selectedMonth === monthYear) {
              if (field === 'ida') {
                if (day < 21) {
                  if (day === '4') {
                    jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "_']").hide();       
                  }else 
                  if (day === '15') {
                    jQuery("#pa_dia-da-ida option[value=_ida-dia-16]").attr('selected', 'selected');  
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();   
                  }
                  else{
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();         
                  }                 
                }else {
                  jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "']").hide();
                }
              }              

              if (field === 'volta') {
                if (day === '1') {
                  jQuery("#pa_dia-da-volta option[value='volta-dia" + day + "']").hide();
                }else {
                  jQuery("#pa_dia-da-volta option[value='volta-dia-" + day + "']").hide();
                }
              }
              
            }  
          }      

        }
      });

      jQuery("#pa_mes-da-viagem").change(function() {
        
        var productSku = '<?php if (! is_null($product) ) { echo $product->get_sku(); } else { echo ''; } ?>';
        jQuery("#pa_dia-da-ida option").each(function() {
          jQuery(this).show();
        });

        jQuery("#pa_dia-da-volta option").each(function() {
          jQuery(this).show();
        });

        var selectedMonth = jQuery(this).children("option:selected").val();

        var js_data = <?php echo json_encode($allHolidays) ?>;

        for (var i = 0; i < js_data.length; i++) {
          var monthYear = js_data[i]["month"] + '-' + js_data[i]["year"];
          var day = js_data[i]["day"];
          var field = js_data[i]["field"]; //Campo ida ou Volta

          if (js_data[i]["sku"] === '') {
            if (selectedMonth === monthYear) {
              if (field === 'ida') {
                if (parseInt(day) < 21) {
                  if (day === '4') {
                    jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "_']").hide();       
                  }else 
                  if (day === '15') {
                    jQuery("#pa_dia-da-ida option[value=_ida-dia-16]").attr('selected', 'selected'); 
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();    
                  }
                  else{
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();         
                  }            
                }else {
                  jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "']").hide();
                }
              }

              if (field === 'volta') {
                if (day === '1') {
                  jQuery("#pa_dia-da-volta option[value='volta-dia" + day + "']").hide();
                }else {
                  jQuery("#pa_dia-da-volta option[value='volta-dia-" + day + "']").hide();
                }    
              }
              
            }
          }
          else 
          if (productSku === js_data[i]["sku"]) {
            if (selectedMonth === monthYear) {
              if (field === 'ida') {
                if (day < 21) {
                  if (day === '4') {
                    jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "_']").hide();       
                  }else 
                  if (day === '15') {
                    jQuery("#pa_dia-da-ida option[value=_ida-dia-16]").attr('selected', 'selected');  
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();   
                  }
                  else{
                    jQuery("#pa_dia-da-ida option[value='_ida-dia-" + day + "']").hide();         
                  }                 
                }else {
                  jQuery("#pa_dia-da-ida option[value='ida-dia-" + day + "']").hide();
                }
              }              

              if (field === 'volta') {
                if (day === '1') {
                  jQuery("#pa_dia-da-volta option[value='volta-dia" + day + "']").hide();
                }else {
                  jQuery("#pa_dia-da-volta option[value='volta-dia-" + day + "']").hide();
                }
              }
              
            }  
          }      

        }
      });

      jQuery('#pa_mes-da-viagem').trigger('change');
      jQuery('select[name=attribute_pa_mes-da-viagem]').trigger('change');
    });
    </script>
  <?php
  }

  
}

register_activation_hook(__FILE__, 'crudOperationsTable');

function crudOperationsTable()
{
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . 'holidays';
  $sql = "CREATE TABLE `$table_name` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `month` varchar(220) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `sku` varchar(220) DEFAULT NULL,
  `field` varchar(220) DEFAULT NULL,
  PRIMARY KEY(holiday_id)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
  ";

  if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
  
}
add_action('admin_menu', 'addAdminPageContent');
function addAdminPageContent()
{
  add_menu_page('Holidays Manager', 'Holidays Manager', 'manage_options', __FILE__, 'crudAdminPage', 'dashicons-palmtree');
}
function crudAdminPage()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'holidays';
  if (isset($_POST['newsubmit'])) {
    $day = $_POST['newday'];
    $month = $_POST['newmonth'];
    $year = $_POST['newyear'];
    $sku = $_POST['newsku'];
    $field = $_POST['newfield'];
    $wpdb->query("INSERT INTO $table_name(day,month,year,sku, field) VALUES('$day','$month', '$year', '$sku', '$field')");
    echo "<script>location.replace('admin.php?page=holidays-manager/holidays-manager.php');</script>";
  }
  if (isset($_POST['uptsubmit'])) {
    $id = $_POST['uptid'];
    $day = $_POST['uptday'];
    $month = $_POST['uptmonth'];
    $year = $_POST['uptyear'];
    $sku = $_POST['uptsku'];
    $field = $_POST['uptfield'];
    $wpdb->query("UPDATE $table_name SET day='$day',month='$month',year='$year',sku='$sku',field='$field' WHERE holiday_id='$id'");
    echo "<script>location.replace('admin.php?page=holidays-manager/holidays-manager.php');</script>";
  }
  if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->query("DELETE FROM $table_name WHERE holiday_id='$del_id'");
    echo "<script>location.replace('admin.php?page=holidays-manager/holidays-manager.php');</script>";
  }
?>
  <div class="wrap">
    <h2>Holidays</h2>
    <table class="wp-list-table widefat striped">
      <thead>
        <tr>
          <th width="10%">Holiday ID</th>
          <th width="10%">Day</th>
          <th width="10%">Month</th>
          <th width="10%">Year</th>
          <th width="10%">Product SKU</th>
          <th width="10%">Ida/Volta</th>
          <th width="40%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <form action="" method="post">
          <tr>
            <td><input type="text" value="AUTO_GENERATED" disabled></td>
            <td><input type="text" id="newday" name="newday"></td>
            <td><input type="text" id="newmonth" name="newmonth"></td>
            <td><input type="text" id="newyear" name="newyear"></td>
            <td><input type="text" id="newsku" name="newsku"></td>
            <td><input type="text" id="newfield" name="newfield"></td>
            <td><button class='button button-primary button-large' id="newsubmit" name="newsubmit" type="submit">INSERT</button></td>
          </tr>
        </form>
        <?php
        $result = $wpdb->get_results("SELECT * FROM $table_name");
        foreach ($result as $print) {
          echo "
              <tr>
                <td width='10%'>$print->holiday_id</td>
                <td width='10%'>$print->day</td>
                <td width='10%'>$print->month</td>
                <td width='10%'>$print->year</td>
                <td width='10%'>$print->sku</td>
                <td width='10%'>$print->field</td>
                <td width='40%'><a href='admin.php?page=holidays-manager/holidays-manager.php&upt=$print->holiday_id'><button class='button button-primary button-large' type='button'>UPDATE</button></a> <a href='admin.php?page=holidays-manager/holidays-manager.php&del=$print->holiday_id'><button class='button button-primary button-large' type='button'>DELETE</button></a></td>
              </tr>
            ";
        }
        ?>
      </tbody>
    </table>
    <br>
    <br>
    <?php
    if (isset($_GET['upt'])) {
      $upt_id = $_GET['upt'];
      $result = $wpdb->get_results("SELECT * FROM $table_name WHERE holiday_id='$upt_id'");
      foreach ($result as $print) {
        $day = $print->day;
        $month = $print->month;
      }
      echo "
        <table class='wp-list-table widefat striped'>
          <thead>
            <tr>
              <th width='10%'>Holiday ID</th>
              <th width='10%'>Day</th>
              <th width='10%'>Month</th>
              <th width='10%'>Year</th>
              <th width='10%'>Product SKU</th>
              <th width='10%'>Ida/Volta</th>
              <th width='40%'>Actions</th>
            </tr>
          </thead>
          <tbody>
            <form action='' method='post'>
              <tr>
                <td width='10%'>$print->holiday_id <input type='hidden' id='uptid' name='uptid' value='$print->holiday_id'></td>
                <td width='10%'><input type='text' id='uptday' name='uptday' value='$print->day'></td>
                <td width='10%'><input type='text' id='uptmonth' name='uptmonth' value='$print->month'></td>
                <td width='10%'><input type='text' id='uptyear' name='uptyear' value='$print->year'></td>
                <td width='10%'><input type='text' id='uptsku' name='uptyear' value='$print->sku'></td>
                <td width='10%'><input type='text' id='uptfield' name='uptyear' value='$print->field'></td>
                <td width='40%'><button class='button button-primary button-large' id='uptsubmit' name='uptsubmit' type='submit'>UPDATE</button> <a href='admin.php?page=holidays-manager/holidays-manager.php'><button type='button'>CANCEL</button></a></td>
              </tr>
            </form>
          </tbody>
        </table>";
    }
    ?>
  </div>
<?php
}
