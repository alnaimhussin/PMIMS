<?php $session = session(); ?>
<?php
    $pgbid          = $id ; // ID number

    $dir            = 'id';
    $dept           = 'ppdo';
    $iddir          = $dir."/".$dept;
    
    $id_front       = base_url('img/id_bg.png');      // Load the ID background
    $id_back        = base_url('img/id_back2.png');   // Load the ID background
    $id_big         = base_url('img/id_big.png');     // Load the ID background

    $db             = \Config\Database::connect();
    $builder        = $db->table('employee');
    $builder->select('*,employee.id as _id');
    $builder->join('employee_details', 'employee.id = employee_details.id_');
    $builder->join('employee_contacts', 'employee.id = employee_contacts.id_');
    $builder->join('master_citymunicipal', 'employee_contacts.p_citymunicipal = master_citymunicipal.citymunCode');
    $builder->join('master_province', 'employee_contacts.p_province = master_province.provCode');
    $builder->join('employee_membership', 'employee.id = employee_membership.id_');
    $builder->join('department', 'employee_details.dept_code = department.id_');
    $builder->join('position', 'employee_details.pos_code = position.id');
    $builder->where('pgbid', $pgbid);
    $builder->orderBy('lastname', 'ASC');
    $data           = $builder->get();

    if ($data) :
      foreach ($data->getResult() as $post) : 
        $lastname   = $post->lastname;
        $firstname  = $post->firstname;
        $middlename = $post->initial;

        $filename   = $lastname.$firstname;
        
        $picture    = str_replace(' ','',base_url('public/assets/img/')."/".$post->dept_code.'/'.$filename.'-picture.png');     // Picture
        $qrcode     = str_replace(' ','',base_url('public/assets/img/')."/".$post->dept_code."/".$filename."-qrcode.png");      // QRcode
        $signature  = str_replace(' ','',base_url('public/assets/img/')."/".$post->dept_code."/".$filename."-signature.png");   // Signature

        $fullname   = $post->firstname." ".$post->initial." ".$post->lastname;

        $nickname   = $post->nickname;
        $position   = $post->position;
        $dept       = $post->department;
        $pgbid      = $post->pgbid;
        $phone      = $post->contact;
        $email      = $post->email;
        $bloodtype  = $post->bloodtype;
        $gender     = $post->gender;      

        $datestr    = $post->birthdate;
        $expdate    = explode("-",$datestr);
        $birthdate  = $expdate[1]."-".$expdate[0]."-".$expdate[2];
        $birthdate  = date_create($birthdate);      
        $birthdate  = date_format($birthdate,"F d, Y");

        $gsis       = $post->gsis;        
        $philhealth = $post->philhealth;       
        $tin        = $post->tin;  
        $pagibig    = $post->pagibig;       
        $sss        = $post->sss;  

        $address    = $post->citymunDesc.", ".$post->provDesc;

        $e_person   = $post->e_firstname." ".$post->e_lastname;
        $e_contact  = $post->e_contact;

      endforeach;
    endif;

    $font_size      = 48;                                                                        // Font size is in pixels.
    $font_file      = realpath('public/assets/fonts/Montserrat-SemiBoldItalic.ttf');;            // path to your font file
    $font_file_1    = realpath('public/assets/fonts/Montserrat-SemiBold.ttf');;            // path to your font file
    $font_file_2    = realpath('public/assets/fonts/Montserrat-Medium.ttf');;                              // path to your font file
    $font_file_3    = realpath('public/assets/fonts/Montserrat-ExtraBold.ttf');;                              // path to your font file

    //creates 'cards' folder if not exists
    if(!file_exists($iddir)){
      mkdir($iddir, 0777, true);
    }

    //--- front start ---//

    //generate virtual image from profile image
    $virtual_id_front = imagecreatefrompng($id_front);
    $virtual_employee_picture = imagecreatefrompng($picture);

    imagealphablending($virtual_id_front, true);
    imagesavealpha($virtual_id_front, true);
    imagecolortransparent($virtual_id_front);

    imagesavealpha($virtual_employee_picture, true);

    //returns profile image's width and height
    list($idwid, $idhayt) = getimagesize($id_front);
    list($profilewid, $profilehayt) = getimagesize($picture);

    // Set the margins of the employee picture
    $margin_right = 0;
    $margin_bottom = 130;

    // Get image Width and Height of Employee picture
    $sx = imagesx($virtual_employee_picture);
    $sy = imagesy($virtual_employee_picture);

    //coordinates of destination point
    $xcoordest = imagesx($virtual_id_front) - $sx - $margin_right;
    $ycoordest = imagesy($virtual_id_front) - $sy - $margin_bottom;

    //merges two images into one
    imagecopyresampled($virtual_id_front, $virtual_employee_picture, $xcoordest, $ycoordest, 0, 0, $sx, $sy, $sx, $sy);

    $front = $iddir."/".strtolower($lastname).strtolower($firstname).".png";
    imagepng($virtual_id_front, $front);
    
    $image = imagecreatefrompng($front); // get the image in php
    $textcolor = imagecolorallocate($image, 0, 0, 0); // text color
    $textcolor_red = imagecolorallocate($image, 255, 0, 0); // text color
    $stroke_color = imagecolorallocate($image, 255, 255, 255);
    
    $fullname2 = $fullname;
    $dept2 = $dept;
    $dept = wordwrap($dept, 38, "\n");
    $fullname = wordwrap($fullname, 24, "\n");

    $font_size = 29;

    $font_size3 = 20;
    $font_size4 = 14;

    if (strlen($fullname2) <=15) {
      $fullname_y = 680;
      $position_y = 820;
      $font_size2 = 38;
    } elseif (strlen($fullname2) <=24) {
      $font_size = 28;
      $fullname_y = 680;
      $position_y = 820;
      $font_size2 = 30;
    } elseif (strlen($fullname2) <=40) {
      $fullname_y = 625;
      $position_y = 865;
      $font_size2 = 20;
    }

    if (strlen($dept2) <=38) {
      $pos1_y = 790;
      $pos2_y = 820;
      $pos3_y = 850;
    } elseif (strlen($dept2) <=66) {
      $pos1_y = 820;
      $pos2_y = 850;
      $pos3_y = 880;
    }

    imagettfstroketext($image, $font_size, 0, 25, $fullname_y, $textcolor, $stroke_color, $font_file_3, $fullname, 4);
    imagettftext($image, 18, 0, 28, 720, $textcolor_red, $font_file_1, strtoupper($position)); // Add Position to image:
    imagettftext($image, 18, 0, 28, 750, $textcolor_red, $font_file_1, strtoupper($dept)); // Add Department to image:
    imagettftext($image, 17, 0, 28, $pos1_y, $textcolor, $font_file_2, "PGB ID No."); // Add Department to image:
    imagettftext($image, 17, 0, 28, $pos2_y, $textcolor, $font_file_2, "Phone"); // Add Department to image:
    imagettftext($image, 17, 0, 28, $pos3_y, $textcolor, $font_file_2, "Email"); // Add Department to image:
    
    imagettftext($image, 17, 0, 170, $pos1_y, $textcolor, $font_file_2, ":"); // Add Department to image:
    imagettftext($image, 17, 0, 170, $pos2_y, $textcolor, $font_file_2, ":"); // Add Department to image:
    imagettftext($image, 17, 0, 170, $pos3_y, $textcolor, $font_file_2, ":"); // Add Department to image:

    imagettftext($image, 17, 0, 180, $pos1_y, $textcolor, $font_file_2, strtoupper($pgbid)); // Add Department to image:
    imagettftext($image, 17, 0, 180, $pos2_y, $textcolor, $font_file_2, strtoupper($phone)); // Add Department to image:
    imagettftext($image, 17, 0, 180, $pos3_y, $textcolor, $font_file_2, strtolower($email)); // Add Department to image:
    
    $front = $iddir."/".strtolower($lastname).strtolower($firstname).".png";
    imagepng($image, $front);

    imagedestroy($virtual_id_front);
    imagedestroy($virtual_employee_picture);

    //--- front end ---//

    //--- back start ---//

    //generate virtual image from profile image
    $virtual_id_back = imagecreatefrompng($id_back);
    $virtual_qrcode = imagecreatefrompng($qrcode);
    $virtual_signature = imagecreatefrompng($signature);

    imagealphablending($virtual_id_back, true);
    imagesavealpha($virtual_id_back, true);
    imagecolortransparent($virtual_id_back);

    imagesavealpha($virtual_qrcode, true);
    imagesavealpha($virtual_signature, true);

    //returns profile image's width and height
    list($qrcode_wid, $qrcode_hei) = getimagesize($qrcode);
    list($signature_wid, $signature_hei) = getimagesize($signature);

    //Grab the id width
    $id_wid = getimagesize($id_back);

    // Set the margins of the employee picture
    $qrcode_margin_right = 227;
    $qrcode_margin_bottom = 733;

    // Set the margins of the employee picture
    $signature_margin_right = 160;
    $signature_margin_bottom = 30;

    // Set new width for qrcode
    $qrcode_new_wid = 180;
    $qrcode_new_hei = 180;
    
    // Set new width for signature
    $signature_new_wid = 230;
    $signature_new_hei = 180;

    $destination = imagecreatetruecolor($qrcode_new_wid, $qrcode_new_hei);
    imagecopyresampled($destination, $virtual_qrcode, 0, 0, 0, 0, $qrcode_new_wid, $qrcode_new_hei, $qrcode_wid, $qrcode_hei);
    imagepng($destination, "qrcode_temp.png");

    $qrcode_final = imagecreatefrompng("qrcode_temp.png");
    $signature_final =  imagecreatefrompng($signature);

    // Get image Width and Height of QRcode
    $qrcode_sx = imagesx($qrcode_final);
    $qrcode_sy = imagesy($qrcode_final);

    // Get image Width and Height of Signature
    $signature_sx = imagesx($signature_final);
    $signature_sy = imagesy($signature_final);

    //coordinates of destination point
    $qrcode_xcoordest = imagesx($virtual_id_back) - $qrcode_sx - $qrcode_margin_right;
    $qrcode_ycoordest = imagesy($virtual_id_back) - $qrcode_sy - $qrcode_margin_bottom;
    
    $signature_xcoordest = imagesx($virtual_id_back) - $signature_sx - $signature_margin_right;
    $signature_ycoordest = imagesy($virtual_id_back) - $signature_sy - $signature_margin_bottom;

    //merges two images into one
    imagecopyresampled($virtual_id_back, $qrcode_final, $qrcode_xcoordest, $qrcode_ycoordest, 0, 0, $qrcode_sx, $qrcode_sy, $qrcode_sx, $qrcode_sy);
    imagecopyresampled($virtual_id_back, $signature_final, $signature_xcoordest, $signature_ycoordest, 0, 0, $signature_sx, $signature_sy, $signature_sx, $signature_sy);

    $back = $iddir."/".strtolower($lastname).strtolower($firstname)."(back).png";
    imagepng($virtual_id_back, $back);
    
    $image = imagecreatefrompng($back); // get the image in php
    $textcolor = imagecolorallocate($image, 0, 0, 0); // text color
    $textcolor_red = imagecolorallocate($image, 255, 0, 0); // text color
    $stroke_color = imagecolorallocate($image, 255, 255, 255);

    imagettftext($image, 18, 0, 85, 370, $textcolor, $font_file_2, strtoupper("Sex")); 
    imagettftext($image, 18, 0, 85, 400, $textcolor, $font_file_2, strtoupper("Blood Type")); 
    imagettftext($image, 18, 0, 85, 430, $textcolor, $font_file_2, strtoupper("Birthdate")); 
    imagettftext($image, 18, 0, 85, 480, $textcolor, $font_file_2, strtoupper("gsis")); 
    imagettftext($image, 18, 0, 85, 510, $textcolor, $font_file_2, strtoupper("philhealth")); 
    imagettftext($image, 18, 0, 85, 540, $textcolor, $font_file_2, strtoupper("pag-ibig")); 
    imagettftext($image, 18, 0, 85, 570, $textcolor, $font_file_2, strtoupper("sss"));
    imagettftext($image, 18, 0, 85, 600, $textcolor, $font_file_2, strtoupper("tin")); 

    imagettftext($image, 18, 0, 85, 650, $textcolor, $font_file_2, strtoupper("Address:")); 

    imagettftext($image, 18, 0, 270, 370, $textcolor, $font_file_2, ":"); 
    imagettftext($image, 18, 0, 270, 400, $textcolor, $font_file_2, ":"); 
    imagettftext($image, 18, 0, 270, 430, $textcolor, $font_file_2, ":"); 
    
    imagettftext($image, 18, 0, 270, 480, $textcolor, $font_file_2, ":"); 
    imagettftext($image, 18, 0, 270, 510, $textcolor, $font_file_2, ":"); 
    imagettftext($image, 18, 0, 270, 540, $textcolor, $font_file_2, ":");  
    imagettftext($image, 18, 0, 270, 570, $textcolor, $font_file_2, ":"); 
    imagettftext($image, 18, 0, 270, 600, $textcolor, $font_file_2, ":"); 

    imagettftext($image, 18, 0, 270, 650, $textcolor, $font_file_2, ":"); 

    imagettftext($image, 18, 0, 290, 370, $textcolor, $font_file_2, strtoupper($gender));
    imagettftext($image, 18, 0, 290, 400, $textcolor, $font_file_2, strtoupper($bloodtype));
    imagettftext($image, 18, 0, 290, 430, $textcolor, $font_file_2, strtoupper($birthdate));
    imagettftext($image, 18, 0, 290, 480, $textcolor, $font_file_2, strtoupper($gsis)); 
    imagettftext($image, 18, 0, 290, 510, $textcolor, $font_file_2, strtoupper($philhealth)); 
    imagettftext($image, 18, 0, 290, 540, $textcolor, $font_file_2, strtoupper($pagibig)); 
    imagettftext($image, 18, 0, 290, 570, $textcolor, $font_file_2, strtoupper($sss));
    imagettftext($image, 18, 0, 290, 600, $textcolor, $font_file_2, strtoupper($tin)); 

    imagettftext($image, 18, 0, 290, 650, $textcolor, $font_file_2, strtoupper($address)); 

    imagettftext($image, 16, 0, get_center_text_position($id_wid[0], 16, $font_file_2, strtoupper("incase of emergency, please contact")), 730, $textcolor, $font_file_2, strtoupper("incase of emergency, please contact"));
    imagettftext($image, 16, 0, get_center_text_position($id_wid[0], 16, $font_file_3, strtoupper($e_person)), 760, $textcolor, $font_file_3, strtoupper($e_person));
    imagettftext($image, 16, 0, get_center_text_position($id_wid[0], 16, $font_file_3, strtoupper($e_contact)), 790, $textcolor, $font_file_3, strtoupper($e_contact));

    imagettftext($image, $font_size3, 0, get_center_text_position($id_wid[0], $font_size3, $font_file_3, strtoupper($fullname2)), 955, $textcolor, $font_file_3, strtoupper($fullname2));
    imagettftext($image, $font_size4, 0, get_center_text_position($id_wid[0], $font_size4, $font_file_1, strtoupper($position)), 980, $textcolor, $font_file_1, strtoupper($position));

    
    $back = $iddir."/".strtolower($lastname).strtolower($firstname)."(back).png";
    imagepng($image, $back);

    imagedestroy($virtual_id_back);
    imagedestroy($virtual_qrcode);

    unlink('qrcode_temp.png');

    //--- back end ---//

    //--- big start ---//

    $virtual_id_big = imagecreatefrompng($id_big);
    $virtual_qrcode = imagecreatefrompng($qrcode);
    $virtual_employee_picture = imagecreatefrompng($picture);

    imagealphablending($virtual_id_big, true);
    imagesavealpha($virtual_id_big, true);
    imagecolortransparent($virtual_id_big);

    imagesavealpha($virtual_employee_picture, true);
    imagesavealpha($virtual_qrcode, true);

    //returns profile image's width and height
    list($qrcode_wid, $qrcode_hei) = getimagesize($qrcode);
    list($employee_wid, $employee_hei) = getimagesize($picture);

    //Grab the id width
    $id_wid = getimagesize($id_big);

    // Set the margins of the qrcode
    $qrcode_margin_right = 10;
    $qrcode_margin_bottom = 10;

    // Set the margins of the employee
    $employee_margin_right = 0;
    $employee_margin_bottom = 220;

    // Set new width for qrcode
    $qrcode_new_wid = 180;
    $qrcode_new_hei = 180;
    
    // Set new width for employee
    $employee_new_wid = 250;
    $employee_new_hei = 300;

    $destination = imagecreatetruecolor($qrcode_new_wid, $qrcode_new_hei);
    imagecopyresampled($destination, $virtual_qrcode, 0, 0, 0, 0, $qrcode_new_wid, $qrcode_new_hei, $qrcode_wid, $qrcode_hei);
    imagepng($destination, "qrcode_temp.png");    

    $qrcode_final = imagecreatefrompng("qrcode_temp.png");
    $employee_final = imagecreatefrompng($picture);

    // Get image Width and Height of QRcode
    $qrcode_sx = imagesx($qrcode_final);
    $qrcode_sy = imagesy($qrcode_final);

    // Get image Width and Height of Employee
    $employee_sx = imagesx($employee_final);
    $employee_sy = imagesy($employee_final);

    //coordinates of destination point
    $qrcode_xcoordest = imagesx($virtual_id_big) - $qrcode_sx - $qrcode_margin_right;
    $qrcode_ycoordest = imagesy($virtual_id_big) - $qrcode_sy - $qrcode_margin_bottom;

    //coordinates of destination point
    $employee_xcoordest = imagesx($virtual_id_big) - $employee_sx - $employee_margin_right;
    $employee_ycoordest = imagesy($virtual_id_big) - $employee_sy - $employee_margin_bottom;

    //merges two images into one
    imagecopyresampled($virtual_id_big, $employee_final, $employee_xcoordest, $employee_ycoordest, 0, 0, $employee_sx, $employee_sy, $employee_sx, $employee_sy);
    imagecopyresampled($virtual_id_big, $qrcode_final, $qrcode_xcoordest, $qrcode_ycoordest, 0, 0, $qrcode_sx, $qrcode_sy, $qrcode_sx, $qrcode_sy);

    $big = $iddir."/".strtolower($lastname).strtolower($firstname)."(big).png";
    imagepng($virtual_id_big, $big);
    
    $image = imagecreatefrompng($big); // get the image in php
    $textcolor = imagecolorallocate($image, 0, 0, 0); // text color
    $textcolor_red = imagecolorallocate($image, 255, 0, 0); // text color
    $stroke_color = imagecolorallocate($image, 255, 255,255);

    imagettfstroketext($image, 70, 0, get_center_text_position($id_wid[0], 70, $font_file, strtoupper($nickname)), 720, $textcolor, $stroke_color, $font_file_3, strtoupper($nickname), 4);
    imagettftext($image, 25, 0, 30, 790, $textcolor, $font_file_3, strtoupper($fullname));
    imagettftext($image, 15, 0, 30, $position_y, $textcolor, $font_file_1, strtoupper($position));

    $big = $iddir."/".strtolower($lastname).strtolower($firstname)."(big).png";
    imagepng($image, $big);

    imagedestroy($virtual_id_big);
    imagedestroy($virtual_qrcode);

    unlink('qrcode_temp.png');
    
    //--- big end ---//

    function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
      for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
          for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
              $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, strtoupper($text));
  
      return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, strtoupper($text));
    } 
    function imagettftextSp($image, $size, $angle, $x, $y, $color, $font, $text, $spacing = 0) {        
      if ($spacing == 0) {
          return imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
      }
      else {
          $temp_x = $x;
          for ($i = 0; $i < strlen($text); $i++)
          {
              $bbox = imagettftext($image, $size, $angle, $temp_x, $y, $color, $font, $text[$i]);
              $temp_x += $spacing + ($bbox[2] - $bbox[0]);
          }
          return $bbox;
      }
    }    
    function get_center_text_position($img_width, $font_size, $font_file, $string) {
      //Grab the width of the text box
      $bounding_box_size = imagettfbbox($font_size, 0, $font_file, $string);
      $text_width = $bounding_box_size[2] - $bounding_box_size[0];
            
      //Return the position the text should start
      return ceil(($img_width - $text_width) / 2);
    }

?>

<div class="content-wrapper">
  <section class="content">
      <div class="col-12">
        <div class="row pl-2 pr-2 mt-2 mb-2">
          <button type="submit" class="col-lg-3 col-sm-12 btn btn-dark mr-1" id="download">Download All</button>
          <button type="submit" class="col-lg-3 col-sm-12 btn btn-dark mr-1" id="download_sm">Download Small ID</button>
          <button type="submit" class="col-lg-3 col-sm-12 mt-1 mt-lg-0 btn btn-dark mr-1" id="download_big">Download Big ID</button>
        </div>
      </div>
      <div class="row p-2 mt-2">
        <div class="col-12">
          <div class="card card-dark text-dark">
        
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-id-badge"></i></span>
                </div>
              <h5 class="">ID Generated <?php echo $id . " / " . $fullname; ?></h5>
            </div>
            <div class="card-body" style="height: auto;">
              <div class="row">
                <div class="col-sm-12 col-lg-4">
                  <img src="<?php echo $front; ?>" id="front" alt="" width="80%" height="auto"
                    style="border: 3px solid #555; margin-top: 5px">
                </div>
                <div class="col-sm-12 col-lg-4">
                  <img src="<?php echo $back; ?>" id="back" alt="" width="80%" height="auto"
                    style="border: 3px solid #555; margin-top: 5px">
                </div>
                <div class="col-sm-12 col-lg-4">
                  <img src="<?php echo $big; ?>" id="big" alt="" width="80%" height="auto"
                    style="border: 3px solid #555; margin-top: 5px">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>

    window.onkeydown = function( event ) {
        if ( event.keyCode == 27 ) {
          window.close();
          console.log( 'escape pressed' );
        }
    };

  	let btnDownload = document.getElementById('download');
  	let btnDownload_sm = document.getElementById('download_sm');
  	let btnDownload_big = document.getElementById('download_big');
    let img1 = document.getElementById('front');
    let img2 = document.getElementById('back');
    let img3 = document.getElementById('big');

    // Must use FileSaver.js 2.0.2 because 2.0.3 has issues.
    btnDownload.addEventListener('click', () => {
      let imagePath1 = img1.getAttribute('src');
      let imagePath2 = img2.getAttribute('src');
      let imagePath3 = img3.getAttribute('src');
      let fileName1 = getFileName(imagePath1);
      let fileName2 = getFileName(imagePath2);
      let fileName3 = getFileName(imagePath3);
      saveAs(imagePath1, fileName1);
      saveAs(imagePath2, fileName2);
      saveAs(imagePath3, fileName3);
    });
    // Must use FileSaver.js 2.0.2 because 2.0.3 has issues.
    btnDownload_sm.addEventListener('click', () => {
      let imagePath1 = img1.getAttribute('src');
      let imagePath2 = img2.getAttribute('src');
      let fileName1 = getFileName(imagePath1);
      let fileName2 = getFileName(imagePath2);
      saveAs(imagePath1, fileName1);
      saveAs(imagePath2, fileName2);
    });
    // Must use FileSaver.js 2.0.2 because 2.0.3 has issues.
    btnDownload_big.addEventListener('click', () => {
      let imagePath3 = img3.getAttribute('src');
      let fileName3 = getFileName(imagePath3);
      saveAs(imagePath3, fileName3);
    });
</script>