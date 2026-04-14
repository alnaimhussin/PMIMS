

<section class="content">
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <form id="myForm" class="form-horizontal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
          <div class="modal-header bg-dark bg-gradient text-white" style="height:50px">
            <h5 class="modal-title">Create</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height:100%">
            <div class="row justify-content-center">
              <div class="col-lg-12 col-sm-12 mt-lg-0 mt-3 justify-content-center">
                  <table class="table table-bordered" style="width: 100%">
                    <tbody style="font-size:12px">
                      <tr style="height: 0px">
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                        <td class="align-middle" style="width:5%; border:0; padding:0"></td>
                      </tr>
                      
                      <!-- TITLE -->
                      <tr style="line-height: 25px">
                        <td class="align-middle" rowspan="2" colspan="13" style="font-size:35px; text-align: center; padding:0px">
                        <b>DISBURSEMENT VOUCHER</b>
                        </td>
                        <td class="align-middle"  colspan="2" style="font-size:20px; text-align: left">
                        DV No.
                        </td>
                        <td class="align-middle"  colspan="5" style="font-size:20px; text-align: left">
                        <b><input type="text" class="form-control" id="dv_no" name="dv_no" style="border:0; box-shadow: none" onChange=""></b>
                        </td>
                      </tr>
                      <tr style="line-height: 25px">
                        <td class="align-middle"  colspan="2" style="font-size:20px; text-align: left">
                        Date
                        </td>
                        <td class="align-middle"  colspan="5" style="font-size:20px; text-align: left">
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input"  id="dv_date" name="dv_date" style="border:0; box-shadow: none" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                        </td>
                      </tr>
                      <!-- TITLE -->
                      <tr style="height: 10px; font-size:12px">
                        <td class="align-middle" rowspan="2" colspan="3" style="text-align: left; font-size:18px">
                        PAYEE
                        </td>
                        <td class="align-middle" rowspan="2" colspan="7" style="padding:0; margin:0; border:0">
                        <select class="form-control" id="payee" name="payee" style="border:0; box-shadow: none" onChange="getTIN()">
                            <option selected="0">--</option>
                            <?php if ($employee) : ?>
                            <?php foreach ($employee->getResult() as $post) : ?>
                            <option value=<?php echo strtoupper($post->id) ?>>
                              <?php echo strtoupper($post->lastname).', '.strtoupper($post->firstname).' '.strtoupper($post->middlename);  ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </td>
                        <td class="align-middle"  colspan="5" style="text-align: center; padding: 0">
                        TIN / EMPLOYEE NO.
                        </td>
                        <td class="align-middle"  colspan="5" style="text-align: center; padding: 0">
                        OBLIGATION REQUEST NO.
                        </td>
                      </tr>
                      <tr style="line-height: 10px; font-size:18px">
                        <td class="align-middle"  colspan="5" style="text-align: center">
                        <b><input type="text" class="form-control" id="tin" name="tin" style="border:0; box-shadow: none" onChange=""></b>
                        </td>
                        <td class="align-middle"  colspan="5" style="text-align: center">
                        <b><input type="text" class="form-control" id="obr_no" name="obr_no" style="border:0; box-shadow: none" onChange=""></b>
                        </td>
                      </tr>
                      <tr style="height: 10px; font-size:12px">
                        <td class="align-middle" rowspan="2" colspan="3" style="text-align: left; font-size:18px">
                        ADDRESS
                        </td>
                        <td class="align-middle" rowspan="2" colspan="7" style="text-align: left; font-size:18px">
                        <b><input type="text" class="form-control" id="payee_address" name="payee_address" style="border:0; box-shadow: none" onChange=""></b>
                        </td>
                        <td class="align-middle"  colspan="5" style="text-align: center; padding: 0">
                        OFFICE / UNIT
                        </td>
                        <td class="align-middle"  colspan="5" style="text-align: center; padding: 0">
                        CODE
                        </td>
                      </tr>
                      <tr style="line-height: 10px; font-size:18px">
                        <td class="align-middle"  colspan="5" style="text-align: center">
                        <b><input type="text" class="form-control" id="dept_code" name="dept_code" style="border:0; box-shadow: none" onChange=""></b>
                        </td>
                        <td class="align-middle"  colspan="5" style="text-align: center">
                        <b><input type="text" class="form-control" id="office_code" name="office_code" style="border:0; box-shadow: none" onChange=""></b>
                        </td>
                      </tr>
                      <tr style="line-height: 10px; font-size:18px">
                        <td class="align-middle"  colspan="15" style="text-align: center">
                        EXPLANATION
                        </td>
                        <td class="align-middle"  colspan="5" style="text-align: center">
                        AMOUNT
                        </td>
                      </tr>
                      <tr style="font-size:18px; height: 300px">
                        <td class="align-top"  colspan="15" style="text-align: justify; padding: 0px">
                        <b>
                          <div class="form-group">
                            <textarea class="form-control"  id="textArea" name="textArea" rows="3" style="border:0; box-shadow: none" placeholder="Enter ..."  onChange=""></textarea>
                          </div>
                        </b>
                        </td>
                        <td class="align-top"  colspan="5" style="text-align: right; padding-top: 0px">
                        <b><input type="text" class="form-control" id="office_code" name="office_code" style="border:0; box-shadow: none" onChange=""></b>
                        </td>
                      </tr>
                      <tr style="line-height: 14px; font-size:18px;">
                        <td class="align-top"  colspan="15" style="text-align: right">
                        <b>
                        TOTAL NET PAY</b>
                        </td>
                        <td class="align-top"  colspan="5" style="text-align: right">
                        <b>
                        4,710.00 Php
                        </b>
                        </td>
                      </tr>                        
                    </tbody>
                  </table>    
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-9">
              <div class="row pl-2 pr-2 mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end">   
                <button type="button" class="col-3 btn btn-dark mr-1 bg-red border-0" data-dismiss="modal">Close</button>
                <button type="button" class="col-3 btn btn-dark" id="printButton" disabled>Print</button>
                <button type="submit" class="col-3 btn btn-dark" id="addButton" disabled>Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
