  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee ID List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee ID List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row" style=" margin-bottom: 10px">
        <div class="col-12">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-booking"
            style="width: 200px">Add New Employee</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-transfer"
            style="width: 200px">Edit Employee</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg"
            style="width: 200px">Delete Employee</button>
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"
            style="width: 200px">Upload ID</button>
        </div>
      </div>

      <div class="row" style=" margin-bottom: 10px">
        <div class="col-12">
          <div class="row">
            <div class="col-4">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width: 150px">Department</span>
                </div>
                <select class="form-control select2" style="width: 75%;">
                  <option selected="selected">--</option>
                  <?php if ($department) : ?>
                  <?php foreach ($department->getResult() as $post) : ?>
                      <option value="<?php echo strtoupper($post->dept_code) ?>"><?php echo strtoupper($post->department) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width: 150px">Position</span>
                </div>
                <select class="form-control select2" style="width: 75%;">
                  <option selected="selected">--</option>
                  <?php if ($department) : ?>
                  <?php foreach ($department->getResult() as $post) : ?>
                      <option value="<?php echo strtoupper($post->dept_code) ?>"><?php echo strtoupper($post->department) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-1">
              <button type="button" class="btn btn-primary form-control"
                style="">Search</button>
            </div>
            <div class="col-1">
              <button type="button" class="btn btn-success form-control"
                style="">All</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->


        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee ID List</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div> <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: auto;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width:10%">PGB ID #</th>
                      <th style="width:20%">Fullname</th>
                      <th style="width:25%">Department</th>
                      <th style="width:25%">Designation</th>
                      <th style="width:10%">Date Encoded</th>
                      <th style="width:10%">ID Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div>
        </div> <!-- /.row -->
      </div> <!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-booking">
      <div class="modal-dialog modal-xl" style="max-width: 90%;">
        <div class="modal-content bg-gray-dark color-palette">
          <div class="modal-header">
            <h4 class="modal-title">Add New ID</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body bg-light disabled color-palette">
            <div class="row">

              <div class="col-3">
                <div div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Search</h3>
                  </div>
                  <div class="card-body">
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px">PGB ID</span>
                      </div>
                      <input type="text" class="form-control" id="search_pgbid" name="search_pgbid"
                        placeholder="PGB ID #" onchange="search()">
                    </div>
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px">Lastname</span>
                      </div>
                      <input type="text" class="form-control" id="search_lastname" name="search_lastname"
                        placeholder="Lastname" onchange="search_name()">
                    </div>
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="width: 120px">Firstname</span>
                      </div>
                      <input type="text" class="form-control" id="search_firstname" name="search_firstname"
                        placeholder="Firstname" onchange="search_name()">
                    </div>
                  </div>
                </div>

                <div div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Search List</h3>
                  </div>
                  <div class="card-body" style="height: 500px">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-body table-responsive p-0" style="height: auto;">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th style="width:20%">Fullname</th>
                                  <th style="width:25%">Department</th>
                                </tr>
                              </thead>
                              <tbody id="search" name="search">
                              </tbody>
                            </table>
                          </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Employee Information</h3>
                  </div>
                  <div class="card-body" style="height: 730px;">
                    <div class="row">
                      <div class="col-8">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Information</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Unique ID #</span>
                              </div>
                              <input type="text" class="form-control" id="uniqueid" name="uniqueid" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">PGB ID #</span>
                              </div>
                              <input type="text" class="form-control" id="pgbid" name="pgbid" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Name</span>
                              </div>
                              <input type="text" class="form-control" id="fullname" name="fullname" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Position</span>
                              </div>
                              <input type="text" class="form-control" id="position" name="position" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Department</span>
                              </div>
                              <input type="text" class="form-control" id="department" name="department" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Department Head</span>
                              </div>
                              <input type="text" class="form-control" id="departmenthead" name="departmenthead"
                                placeholder="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                      <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">QR Code</h3>
                          </div>
                          <div class="card-body" style="padding: 8px">
                            <div id="qrcode" style="text-align: center;"></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Membership</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">GSIS</span>
                              </div>
                              <input type="text" class="form-control" id="gsis" name="gsis" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">PhilHealth</span>
                              </div>
                              <input type="text" class="form-control" id="philhealth" name="philhealth" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">TIN</span>
                              </div>
                              <input type="text" class="form-control" id="tin" name="tin" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Pag-Ibig</span>
                              </div>
                              <input type="text" class="form-control" id="pagibig" name="pagibig" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">SSS</span>
                              </div>
                              <input type="text" class="form-control" id="sss" name="sss" placeholder="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-6">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Contacts</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Address</span>
                              </div>
                              <input type="text" class="form-control" id="address" name="address" placeholder=""
                                readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Contact</span>
                              </div>
                              <input type="text" class="form-control" id="contact" name="contact" placeholder=""
                                readonly>
                            </div>
                          </div>
                        </div>

                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Incase of Emergency</h3>
                          </div>
                          <div class="card-body" style="padding: 5px">
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Name</span>
                              </div>
                              <input type="text" class="form-control" id="e_person" name="e_person" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Address</span>
                              </div>
                              <input type="text" class="form-control" id="e_address" name="e_address" placeholder="" readonly>
                            </div>
                            <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Contact</span>
                              </div>
                              <input type="text" class="form-control" id="e_contact" name="e_contact" placeholder="" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Upload</h3>
                  </div>
                  <div class="card-body" style="height: 730px;">   
                    <form method="post" id="upload_form" enctype="multipart/form-data">
                      <div class="input-group mb-1">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file_picture" id="file_picture" onchange="loadFile1(event)">
                          <label class="custom-file-label" for="file_picture">Choose picture</label>
                        </div>
                      </div>   
                      <div class="input-group mb-1">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="file_signature" id="file_signature" onchange="loadFile2(event)">
                          <label class="custom-file-label" for="file_signature">Choose signature</label>
                        </div>
                      </div>       
                      <div style="text-align: center;">
                      <img src="" id="output0" alt="" width="50%" height="auto" style="border: 1px solid #555; margin-top: 10px">
                      <img src="<?php echo base_url('/img/pic_clear.png'); ?>" id="output1" alt="" width="50%" height="auto" style="border: 1px solid #555; margin-top: 10px">
                      <img src="<?php echo base_url('/img/sig_clear.png'); ?>" id="output2" alt="" width="50%" height="auto" style="border: 1px solid #555; margin-top: 10px">
           <div id="uploaded_image">  
           </div>  
                      </div>
                      <div class="row">
                      <button type="button" class="btn col-6 btn-success btn-outline-light" onclick="download()" style="margin-top: 10px">Upload</button>
                      <button type="button" class="btn col-6 btn-success btn-outline-light" onclick="gen_id()" style="margin-top: 10px">Generate ID</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-gray-dark color-palette">
            <button type="button" class="btn col-3 btn-danger btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn col-3 btn-success btn-outline-light">Save Booking</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>  
    $(document).ready(function(){  
          $('#upload_form').on('submit', function(e){  
              e.preventDefault();  
              if($('#image_file').val() == '')  
              {  
                    alert("Please Select the File");  
              }  
              else  
              {  
                    $.ajax({  
                        url:"<?php echo base_url(); ?>main/ajax_upload",   
                        method:"POST",  
                        data:new FormData(this),  
                        contentType: false,  
                        cache: false,  
                        processData:false,  
                        success:function(data)  
                        {  
                              $('#uploaded_image').html(data);  
                        }  
                    });  
              }  
          });  
    });  
 </script>  
  <script>
    var loadFile1 = function(event) {
      var image = document.getElementById('output1');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile2 = function(event) {
      var image = document.getElementById('output2');
      image.src = URL.createObjectURL(event.target.files[0]);
      alert(image.src);
    };

    function gen_id() {
      var pgbid = $('#pgbid').val();
      var url = '<?php echo base_url(); ?>/genid?id=' + pgbid;
      window.open(url, 'newwindow', 'width=550, height=750, resizable=0, scrollbars=0');
      return false;
    }

    function search() {
      var pgbid = $('#search_pgbid').val();
      if (pgbid) {
        $.ajax({
          url: '<?php echo base_url(); ?>/dynamic/search_pgbid/' + pgbid,
          method: "POST",
          data: {
            pgbid: pgbid
          },
          async: true,
          dataType: 'json',
          success: function (data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<tr onclick="getDetail(' + data[i]._id + ')">';
              html += '<td>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' +
                data[i].middlename.toUpperCase() + '</td><td>' + data[i].department.toUpperCase() + '</td>';
              html += '</tr>';
            }
            $('#search').html(html);

          }
        });
        return false;
      }
    }

    function search_name() {
      var lastname = $('#search_lastname').val();
      var firstname = $('#search_firstname').val();
      if (lastname) {
        $.ajax({
          url: '<?php echo base_url(); ?>/dynamic/search_name/' + lastname + '/' + firstname,
          method: "POST",
          data: {
            lastname: lastname,
            firstname: firstname
          },
          async: true,
          dataType: 'json',
          success: function (data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<tr onclick="getDetail(' + data[i]._id + ')">';
              html += '<td>' + data[i].lastname.toUpperCase() + ', ' + data[i].firstname.toUpperCase() + ' ' +
                data[i].middlename.toUpperCase() + '</td><td>' + data[i].department.toUpperCase() + '</td>';
              html += '</tr>';
            }
            $('#search').html(html);

          }
        });
        return false;
      }
    }

    function s4() {
      var uniqueid = Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
      return uniqueid;
    }    

    function downloadURI(uri, name) {
      var link = document.createElement("a");
      link.download = name;
      link.href = uri;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      delete link;
    };

    function getDetail(id) {
      if (id) {
        $.ajax({
          url: '<?php echo base_url(); ?>/dynamic/getDetail/' + id,
          method: "POST",
          data: {
            id: id
          },
          async: true,
          dataType: 'json',
          success: function (data) {
            var i;
            $('#qrcode').empty();
            
            for (i = 0; i < data.length; i++) {
              var uniqueid = s4() + s4() + "-" + s4() + "-" + s4() + "-" + s4() + s4() + s4();
              document.getElementById("uniqueid").value = uniqueid;
              document.getElementById("pgbid").value = data[i].pgbid.toUpperCase();
              document.getElementById("fullname").value = data[i].firstname.toUpperCase() + " " + data[i].middlename.toUpperCase() + " " + data[i].lastname.toUpperCase();
              document.getElementById("position").value = data[i].position.toUpperCase();
              document.getElementById("department").value = data[i].department.toUpperCase();
              document.getElementById("departmenthead").value = data[i].head.toUpperCase();

              document.getElementById("gsis").value = data[i].gsis.toUpperCase();
              document.getElementById("philhealth").value = data[i].philhealth.toUpperCase();
              document.getElementById("tin").value = data[i].tin.toUpperCase();
              document.getElementById("pagibig").value = data[i].pagibig.toUpperCase();
              document.getElementById("sss").value = data[i].sss.toUpperCase();

              document.getElementById("address").value = data[i].r_citymunicipal.toUpperCase() + ", " + data[i].r_province.toUpperCase();
              document.getElementById("contact").value = data[i].contact.toUpperCase();
              document.getElementById("e_person").value = data[i].e_firstname.toUpperCase() + " " + data[i].e_middlename.toUpperCase() + " " + data[i].e_lastname.toUpperCase();
              document.getElementById("e_contact").value = data[i].e_contact.toUpperCase();


              var filename = data[i].lastname.toUpperCase().replace(/ /g,'')+data[i].firstname.toUpperCase().replace(/ /g,'');
              var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "verify.basilanprovince.com/"+uniqueid,
                width: 256,
                height: 256,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
              });

              setTimeout(
                function ()
                {
                    let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
                    // document.getElementById("file_picture").value="c:/amrit.txt";
                    // $("#output0").attr("src", dataUrl);
                    // alert(dataUrl);
                    downloadURI(dataUrl, filename + '-qrcode.png');
                }
                ,1000);                

              var base_url = window.location.origin;
              // $("#output").attr("src",base_url + '/pgbid/img/id_bg.png');
            }
          }
        });
        return false;
      }
    }
  </script>