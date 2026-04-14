<?php $session = \Config\Services::session(); ?>

    <style>
    /* Print-specific styles */
        @media print {
            body * {
                visibility: hidden;
            }
            
            #printable-content, #printable-content * {
                visibility: visible;
            }
            
            #printable-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
            }
            
            /* Hide print button when printing */
            .no-print {
                display: none !important;
            }
            
            /* Add page breaks if needed */
            .page-break {
                page-break-after: always;
            }
        }
    </style>

<div class="content-wrapper col-8" style="height:100%" >
  <section class="content">
    <div class="container-fluid"> 
      <div class="printable col-12" id="printable-content"> 
        <table style="width: 100%">
          <tbody>
            <tr style="font-size:16px" >
              <td class="align-middle" rowspan="10" colspan="4" style="text-align: center; border: 0; padding:0">
                <img src="<?php echo base_url('img/basilan.png'); ?>" width="150" height="150">
              </td>
              <td class="align-middle" rowspan="10" colspan="4" style="text-align: center; border: 0; padding:0">
              <img src="<?php echo base_url('img/barmm.png'); ?>" width="150" height="150">
              </td>
              <td class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0; height: 10px"></td>
            </tr>
            <tr style="font-size:16px">
              <td class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0; height: 10px"></td>
            </tr>
            <tr style="font-size:16px">
              <th class="align-middle" colspan="12" style="text-align: left; border: 0; padding:0; height: 10px">In the Name of Allah Most Gracious Most Merciful</th>
            </tr>
            <tr style="font-size:16px; font-family: Times New Roman">
              <th class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0; height: 10px">REPUBLIC OF THE PHILLPINES</th>
            </tr>
            <tr style="font-size:18px; color:limegreen">
              <th class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0; height: 10px">Bangsamoro Autonomous Region in Muslim Mindanao</th>
            </tr>
            <tr style="font-size:18px; color:limegreen">
              <th class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0">PROVINCIAL GOVERNMENT OF BASILAN</th>
            </tr>
            <tr style="font-size:22px; color:#0066FF; font-family: Times New Roman">
              <th class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0">OFFICE OF THE PROVINCIAL GOVERNOR</th>
            </tr>
            <tr style="font-size:12px">
              <th class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0">Provincial Capitol Building, Isabela City, Basilan</th>
            </tr>
            <tr style="font-size:16px">
              <td class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0; height: 10px"></td>
            </tr>
            <tr style="font-size:16px">
              <td class="align-middle" colspan="12" style="text-align: center; border: 0; padding:0; height: 10px"></td>
            </tr>
            <tr style="font-size:16px">
              <td class="align-middle" colspan="20" style="text-align: center; border: 0; padding:0; height: 20px"></td>
            </tr>
          </tbody>
        </table>
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
            <tr style="line-height: 14px">
              <td class="align-middle"  colspan="13" style="font-size:35px; text-align: center; padding:0px">
              <b>DISBURSEMENT VOUCHER</b>
              </td>
              <td class="align-middle"  colspan="7" style="font-size:20px; text-align: left">
              NO.
              </td>
            </tr>
            <!-- TITLE -->
            <tr style="line-height: 14px; font-size:16px">
              <td class="align-middle" colspan="3" style="text-align: left">
              MODE OF PAYMENT
              </td>
              <td class="align-middle" colspan="3" style="text-align: right">
              CHECK
              </td>
              <td class="align-middle" colspan="3" style="text-align: right">
              CASH
              </td>
              <td class="align-middle" colspan="3" style="text-align: right">
              OTHERS
              </td>
              <td class="align-middle" colspan="8"  style="text-align: right">
              </td>
            </tr>
            <!-- TITLE -->
            <tr style="height: 10px; font-size:12px">
              <td class="align-middle" rowspan="2" colspan="3" style="text-align: left; font-size:18px">
              PAYEE
              </td>
              <td class="align-middle" rowspan="2" colspan="7" style="text-align: left; font-size:18px">
              <b>NAIM S. HUSSIN</b>
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
              <b>TIN NUMBER</b>
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              <b>OBR NUMBER</b>
              </td>
            </tr>
            <tr style="height: 10px; font-size:12px">
              <td class="align-middle" rowspan="2" colspan="3" style="text-align: left; font-size:18px">
              ADDRESS
              </td>
              <td class="align-middle" rowspan="2" colspan="7" style="text-align: left; font-size:18px">
              <b>CAPITOL BLDG. ISABELA CITY, BASILAN</b>
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
              <b>PGO</b>
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              <b>CODE HERE</b>
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
            <tr style="font-size:18px; height: 400px">
              <td class="align-top"  colspan="15" style="text-align: justify; padding: 30px">
              <b>
              ATTENDANCE TO THE MEMORANDUM OF UNDERTANDING (MOU) SIGNING RE: CONDUCT OF FEASIBILITY STUDY AND MASTER PLAN OF THE PROPOSED BASILAN AIRPORT DEVELOPMENT PROJECT UNDER SPECIAL DEVELOPMENT FUND (SDF)
              </b>
              </td>
              <td class="align-top"  colspan="5" style="text-align: right; padding-top: 30px">
              <b>
              4,710.00 Php
              </b>
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
            <tr style="line-height: 14px; font-size:18px;">
              <td class="align-top"  colspan="10" style="text-align: left">
              A. Certified
              </td>
              <td class="align-top"  colspan="10" style="text-align: left">
              B. Certified
              </td>
            </tr>
            <tr style="line-height: 10px; font-size:14px;">
              <td class="align-top"  colspan="3" style="text-align: left">
              </td>
              <td class="align-top"  colspan="7" style="text-align: left">
              Allotment obligated for the purpose as indicated above.
              </td>
              <td class="align-top"  colspan="3" style="text-align: left">
              
              </td>
              <td class="align-top"  colspan="7" style="text-align: left">
              Funds available.
              </td>
            </tr>
            <tr style="line-height: 10px; font-size:14px;">
              <td class="align-top"  colspan="3" style="text-align: left">
              
              </td>
              <td class="align-top"  colspan="7" style="text-align: left">
              Supporting documents complete.  
              </td>
              <td class="align-top"  colspan="3" style="text-align: left">
              
              </td>
              <td class="align-top"  colspan="7" style="text-align: left">
              </td>
            </tr>

            <tr style="font-size:16px; height: 80px">
              <td class="align-middle"  colspan="3" style="text-align: left">
              SIGNATURE
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              </td>
              <td class="align-middle"  colspan="3" style="text-align: left">
              SIGNATURE
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              </td>
            </tr>

            <tr style="line-height: 14px; font-size:16px">
              <td class="align-middle"  colspan="3" style="text-align: left">
              PRINTED NAME
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              <b>FAIJA C. JACARIA</b>
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              DATE
              </td>
              <td class="align-middle"  colspan="3" style="text-align: left">
              PRINTED NAME
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              <b>MAJAD K. DAGGONG</b>
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              DATE
              </td>
            </tr>

            <tr style="line-height: 14px; font-size:16px">                   
              <td class="align-middle" rowspan="2" colspan="3" style="text-align: left">
              POSITION
              </td>
              <td class="align-middle"  colspan="7" style="text-align: center">
              Acting Provincial Accountant - SAO
              </td>      
              <td class="align-middle" rowspan="2" colspan="3" style="text-align: left">
              POSITION
              </td>
              <td class="align-middle"  colspan="7" style="text-align: center">
              Provincial Treasurer
              </td>
            </tr>

            <tr style="height: 10px; font-size:12px">
              <td class="align-top"  colspan="7" style="text-align: center; padding: 0">
              Head, Accounting Unit/Authorized Representative
              </td>      
              <td class="align-top"  colspan="7" style="text-align: center; padding: 0">
              Treasurer/Authorized Representative
              </td>
            </tr>
            
            <tr style="line-height: 14px; font-size:18px;">
              <td class="align-top"  colspan="10" style="text-align: left">
              C. Approved for Payment
              </td>
              <td class="align-top"  colspan="10" style="text-align: left">
              D. Received Payment
              </td>
            </tr>

            <tr style="font-size:16px; height: 80px">
              <td class="align-middle"  colspan="3" style="text-align: left">
              SIGNATURE
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              </td>
              <td class="align-middle"  colspan="3" style="text-align: left">
              SIGNATURE
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              </td>
            </tr>

            <tr style="line-height: 14px; font-size:16px">
              <td class="align-middle"  colspan="3" style="text-align: left">
              PRINTED NAME
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              <b>JIM S. HATAMAN SALLIMAN</b>
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              DATE
              </td>
              <td class="align-middle"  colspan="3" style="text-align: left">
              PRINTED NAME
              </td>
              <td class="align-middle"  colspan="5" style="text-align: center">
              <b>NAIM S. HUSSIN</b>
              </td>
              <td class="align-middle"  colspan="2" style="text-align: center">
              DATE
              </td>
            </tr>

            <tr style="height: 10px; font-size:12px">                 
              <td class="align-middle" rowspan="2" colspan="3" style="text-align: left; font-size:16px">
              POSITION
              </td>
              <td class="align-middle" rowspan="2" colspan="7" style="text-align: center; font-size:16px">
              Governor
              </td>      
              <td class="align-middle" colspan="3" style="text-align: center; padding: 0">
              CHECK NO
              </td>
              <td class="align-middle" colspan="5" style="text-align: center; padding: 0">
              BANK NAME
              </td>
              <td class="align-middle" colspan="2" style="text-align: center; padding: 0">
              DATE
              </td>
            </tr>

            <tr style="height: 40px; font-size:16px">
              <td class="align-middle" colspan="3" style="text-align: center">
                <b></b>
              </td>      
              <td class="align-middle" colspan="5" style="text-align: center">
                <b></b>
              </td>
              <td class="align-middle" colspan="5" style="text-align: center">
                <b></b>
              </td>
            </tr>

            <tr style="height: 10px; font-size:12px">                 
              <td class="align-middle" rowspan="2" colspan="10" style="text-align: left; font-size:16px">
              </td>
              <td class="align-middle" rowspan="2" colspan="3" style="text-align: center; padding: 0">
              OR/Other Documents
              </td>
              <td class="align-middle" colspan="5" style="text-align: center; padding: 0">
              JEV No.
              </td>
              <td class="align-middle" colspan="2" style="text-align: center; padding: 0">
              DATE
              </td>
            </tr>

            <tr style="height: 40px; font-size:16px">
              <td class="align-middle" colspan="5" style="text-align: center">
                <b></b>
              </td>
              <td class="align-middle" colspan="5" style="text-align: center">
                <b></b>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<script>
function printDiv() {
            window.print();
        }
</script>