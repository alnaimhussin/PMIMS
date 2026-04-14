<?php    

    $session = \Config\Services::session();
    $pass_id =  $session->get('pass_id');
 
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'H';

    $matrixPointSize = 10;


    if (isset($pass_id)) { 
        //it's very important!
        if (trim($pass_id) == '')
            die('data cannot be empty!');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($pass_id.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($pass_id, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
    $source = 'app/Views/client/temp/'.basename($filename);
    $destination = 'img/qrcode/'.basename($filename);

    copy($source, $destination);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Success</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Travel Pass Details</h3>
      </div>
      <div class="card-body">
        <div class="box-body">

          <div class="col-sm-12 col-lg-12" style="text-align: center; font-size: 50px"><img
              src='<?php echo base_url($destination) ?>' alt='qrcode' title='qrcode' border='0' /></div>
          <div class="col-sm-12 col-lg-12" style="text-align: center; font-size: 50px"><?php echo $pass_id; ?></div>

        </div>
      </div>
    </div>

  </section>
</div>

<script>

</script>