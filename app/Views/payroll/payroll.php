<?php $session = \Config\Services::session(); ?>

<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Payroll List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Payroll List</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <?php $set = \Config\Services::session()->getFlashdata('validation'); ?>
  <?php $error = \Config\Services::session()->getFlashdata('error'); ?>
  <?php $txt = \Config\Services::validation()->listErrors(); ?>

  <div class="col-lg-6" <?php if ($set != "true") { echo "hidden"; $set = "false"; } ?>>
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Fields Required</h3>
      </div>
      <div class="card-body">
        <?php echo $txt; ?>
        <?php echo $error; ?>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="col-12">
        <div class="row pl-2 pr-2 mt-2 mb-2">
            <button type="button" class="col-lg-2 col-sm-12 btn btn-dark mr-1" data-toggle="modal" data-target="#modal-add">Generate Payroll</button>
        </div>
      </div>
      
      <div class="col-12">
        <div class="row">
          <div class="col-lg-10 col-sm-12">
            <div class="row pl-2 pr-2">
                <span class="input-group-text col-lg-2 col-sm-12 bg-light text-dark">Department</span>
                <select class="col-lg-10 col-sm-12" id="searchDept" name="searchDept" style="height:38px">
                  <option selected="selected" id="defaultDept" value="0">--</option>
                  <?php if ($department) : ?>
                  <?php foreach ($department->getResult() as $post) : ?>
                      <option value="<?php echo strtoupper($post->id_) ?>"><?php echo strtoupper($post->department) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
            </div>
            <div class="row pl-2 pr-2 mt-1">
                <span class="input-group-text col-lg-2 col-sm-12 bg-light text-dark">Month</span>
                <select class="col-lg-4 col-sm-12" id="searchPos" name="searchPos" style="height:38px">
                  <option selected="selected" value="0">--</option>
                  <option value="1">Januray</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
                <span class="input-group-text col-lg-2 col-sm-12 bg-light text-dark">Year</span>
                <select class="col-lg-4 col-sm-12" id="searchPos" name="searchPos" style="height:38px">
                  <option selected="selected" value="0">--</option>
                  <?php if ($acct_year) : ?>
                  <?php foreach ($acct_year->getResult() as $post) : ?>
                      <option value="<?php echo strtoupper($post->acct_year) ?>"><?php echo strtoupper($post->acct_year) ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <div class="row pl-2 pl-lg-0 pr-2 mt-2 mt-lg-0">
                <button class="col-lg-12 col-sm-12 btn btn-primary pl-1 pr-1 float-end" onclick="searchDept()">Search</button>
                <button class="col-lg-12 col-sm-12 mt-1 mt-lg-1 btn btn-success pl-1 pr-1 float-end" onclick="searchAll()">All</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row p-1 mt-2">
        <div class="col-12">
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
                <div class="card-icon">
                  <span class=""><i class="nav-icon fas fa-users"></i></span>
                </div>
              <h5 class="">Payroll</h5>
            </div>
            <div class="pt-2 pb-2" style="height:auto; width:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="row pl-lg-3 pl-0 pr-lg-3 pr-0">
                          <span class="input-group-text col-lg-3 col-sm-12">Department</span>
                          <span id="selectDept" class="input-group-text col-lg-9 col-sm-12 bg-white">Department Name</span>
                      </div>  
                      <div class="row pl-lg-3 pl-0 pr-lg-3 pr-0">
                          <span class="input-group-text col-lg-3 col-sm-12">Department Head</span>
                          <span id="selectHead" class="input-group-text col-lg-9 col-sm-12 bg-white">Department Head Name</span>
                      </div>  
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="row pl-lg-3 pl-0 pr-lg-3 pr-0">
                          <span class="input-group-text col-lg-3 col-sm-12">Month - Year</span>
                          <span class="input-group-text col-lg-9 col-sm-12 bg-white">
                            <?php
                              echo strtoupper(date('F - Y'));
                            ?>
                          </span>
                      </div>  
                      <div class="row pl-lg-3 pl-0 pr-lg-3 pr-0">
                          <span class="input-group-text col-lg-3 col-sm-12">Department Head</span>
                          <span class="input-group-text col-lg-9 col-sm-12 bg-white">Department Head Name</span>
                      </div>  
                      <div class="row pl-lg-3 pl-0 pr-lg-3 pr-0">
                          <span class="input-group-text col-lg-3 col-sm-12">Amount</span>
                          <span class="input-group-text col-lg-9 col-sm-12 bg-white">Amount Here</span>
                      </div>
                    </div>
                </div>

                  <table id="payroll_table" class="table table-striped table-bordered table-fixed table-responsive">
                    <thead class="table-dark" style="text-align: center">
                      <tr style="line-height: 13px; font-size: 12px;">
                        <th rowspan="2" style="width:2%; vertical-align: middle" class="border">#</th>
                        <th rowspan="2" style="width:20%; vertical-align: middle" class="border">Name</th>
                        <th rowspan="2" style="width:20%; vertical-align: middle" class="border">Designation</th>
                        <th rowspan="2" style="width:5%; vertical-align: middle" class="border">Monthly Rate</th>
                        <th rowspan="2" style="width:5%; vertical-align: middle" class="border">ACA/ PERA</th>
                        <th rowspan="2" style="width:5%; vertical-align: middle" class="border">LAND BANK LOAN</th>
                        <th colspan="7" style="vertical-align: middle" class="border">GSIS</th>
                        <th colspan="2" style="vertical-align: middle" class="border">PAG-IBIG</th>
                        <th rowspan="2" style="width:25%; vertical-align: middle" class="border">RATA</th>
                        <th rowspan="2" style="width:25%; vertical-align: middle" class="border">WITH HOLDING TAX</th>
                        <th colspan="2" style="vertical-align: middle" class="border">PhilHealth</th>
                        <th colspan="2" style="vertical-align: middle" class="border">GSIS Life Retirement</th>
                        <th rowspan="2" style="vertical-align: middle" class="border">EC</th>
                        <th colspan="2" style="vertical-align: middle" class="border">PAG-IBIG</th>
                        <th rowspan="2" style="vertical-align: middle" class="border">Amount Due</th>
                        <th rowspan="2" style="vertical-align: middle" class="border">Account #</th>
                      </tr>
                      <tr style="line-height: 13px; font-size: 12px; ">
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">GSIS CONSO LOAN</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">GSIS POLICY LOAN</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">EDUC. ASSIST. LOAN</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">EMER. LOAN</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">GFAL</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">MPL</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">COMPUTER LOAN</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">MPL</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">CAL</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">P/S</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">G/S</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">P/S 9%</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">G/S 12%</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">P/S 2%</th>
                        <th rowspan="" style="width:5%; vertical-align: middle" class="border">G/S 2%</th>
                      </tr>
                    </thead>
                    <tbody id="search" name="search" class="" style="font-size:12px; overflow: auto;">
                      <tr style="line-height: 20px">
                        <td></td>
                        <td style="vertical-align: middle"><b></b>
                        </td>
                        <td></td> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>                  
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>