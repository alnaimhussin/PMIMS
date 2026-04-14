<style>  
  .form-control, .form-select { border-radius: 4px !important; border: 1px solid #ced4da; }
  .form-control:focus { background-color: #fff8e1; border-color: #003366; box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.15); }
  .form-control[readonly] { background-color: #f8f9fa !important; color: #495057; font-weight: 500; }
  .input-group-text { background-color: #f8f9fa; font-weight: 600; width: 145px; }
  .card { box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); border: none; }
  .nav-tabs .nav-link.active { color: #003366 !important; border-bottom: 3px solid #003366 !important; background: transparent !important; font-weight: bold; }
  #employee_table tr { cursor: pointer; }
</style>

<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>
// --- GLOBAL SETTINGS ---
const dtConfig = {
    "paging": true, "lengthChange": false, "searching": true, "ordering": false,
    "info": true, "autoWidth": false, "responsive": true,
    "lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]]
};

$(document).ready(function () {
    // Initialization
    $('.select2').select2();
    $('.datemask').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    $('#employee_table').DataTable(dtConfig);

    // --- GENERIC ROW MANAGEMENT (Education/Eligibility) ---
    const manageRow = (tableId, inputIds, isDelete = false) => {
        if (isDelete) {
            $(`#${tableId} input[name="record"]:checked`).closest("tr").remove();
        } else {
            let markup = `<tr style='line-height: 10px'><td><input type='checkbox' name='record'></td>`;
            inputIds.forEach(id => {
                markup += `<td>${$(id).val().toUpperCase()}</td>`;
                $(id).val(""); 
            });
            $(`#${tableId}`).append(markup + `</tr>`);
        }
    };

    // Row Event Bindings
    $(".add-row-education").click(() => manageRow("education", ["#category", "#name_school", "#degree", "#level_earned", "#year_graduate"]));
    $(".v_add-row-education").click(() => manageRow("v_education", ["#v_category", "#v_name_school", "#v_degree", "#v_level_earned", "#v_year_graduate"]));
    $(".delete-row-education").click(() => manageRow("education", [], true));
    $(".v_delete-row-education").click(() => manageRow("v_education", [], true));
    
    $(".add-row-eligibility").click(() => manageRow("eligibility_table", ["#eligibility", "#licensenumber", "#validity"]));
    $(".v_add-row-eligibility").click(() => manageRow("v_eligibility_table", ["#v_eligibility", "#v_licensenumber", "#v_validity"]));
    $(".delete-row-eligibility").click(() => manageRow("eligibility_table", [], true));
    $(".v_delete-row-eligibility").click(() => manageRow("v_eligibility_table", [], true));
});

// --- CORE AJAX HELPER ---
function sendRequest(url, data, successCb, isFile = false) {
    $.ajax({
        url: `<?= base_url() ?>${url}`, type: "POST", data: data, dataType: 'json',
        processData: !isFile, contentType: isFile ? false : 'application/x-www-form-urlencoded',
        success: successCb, error: (e) => console.log("System Error:", e.responseText)
    });
}

// --- SEARCH ENGINE ---
function search() {
    const dept = $('#searchDept').val();
    const pos = $('#searchPos').val();
    if (dept == "0" && pos == "0") return searchAll();

    let url = (dept != "0" && pos != "0") ? `/dynamic/searchByDeptPos/${dept}/${pos}` : 
              (dept != "0") ? `/dynamic/searchByDept/${dept}` : `/dynamic/searchByPos/${pos}`;

    sendRequest(url, { searchDept: dept, searchPos: pos }, (data) => renderTable(data));
    return false;
}

function searchAll() {
    sendRequest('/dynamic/searchAll/', {}, (data) => renderTable(data));
    $('#searchDept, #searchPos').val("0").trigger('change');
    return false;
}

function renderTable(data) {
    // IMPORTANT: Clear and Destroy for Paging to work
    if ($.fn.DataTable.isDataTable('#employee_table')) {
        $('#employee_table').DataTable().clear().destroy();
    }

    let html = data.map((row, i) => `
        <tr style="line-height: 20px; cursor: pointer;" 
            ondblclick="window.location.href='<?= base_url('Employee/profile') ?>?id=${row._id}'">
            <td class="pl-3">${i + 1}</td>
            <td>${row.pgbid.toUpperCase()}</td>
            <td><b>${row.lastname.toUpperCase()}, ${row.firstname.toUpperCase()}</b></td>
            <td>${row.nickname.toUpperCase()}</td>
            <td>${row.gender.toUpperCase()}</td>
            <td>${row.birthdate}</td>
            <td>${row.department}</td>
            <td>${row.position}</td>
            <td>${row.sg_code}</td>
            <td>${row.status.toUpperCase()}</td>
        </tr>`).join('');

    $('#search').html(html);
    $('#employee_table').DataTable(dtConfig); // Re-initialize
}

// --- VIEW DETAILS ---
function viewDetail(id) {
    sendRequest('/dynamic/viewDetail/' + id, { id: id }, (data) => {
        if (!data.length) return swal.fire('Warning', 'Details not found', 'warning');
        const row = data[0];

        // Automatic mapping to v_ IDs
        Object.keys(row).forEach(key => {
            const el = $(`#v_${key}`);
            if (el.length) {
                el.val(row[key]?.toString().toUpperCase());
                if (el.hasClass('select2')) el.trigger('change');
            }
        });

        // Load Sub-tables
        loadSubTable('/dynamic/viewDetailEducation/', id, '#v_education');
        loadSubTable('/dynamic/viewDetailEligibility/', id, '#v_eligibility_table');
        
        $('.nav-tabs a[href="#custom-tabs-three-Profile"]').tab('show');
        $('#modal-view').modal('show');
    });
}

function loadSubTable(url, id, target) {
    sendRequest(url + id, { id: id }, (data) => {
        let html = data.map(r => `<tr><td><input type="checkbox" name="record"></td>${Object.values(r).slice(1).map(v => `<td>${v.toUpperCase()}</td>`).join('')}</tr>`).join('');
        $(target).html(html);
    });
}

// --- VALIDATION & ID GEN ---
function checkJOID() {
    const status = $('#status').val();
    const dept = $('#dept_code').val();
    let prefix = (status == "JO") ? "JO" + (dept < 10 ? '0'+dept : dept) : (status == "Contractual" ? "CO" : "PGB");

    sendRequest('/Employee/getIDNO/' + prefix, { pgbid_txt: prefix.toLowerCase() }, (data) => {
        const id_no = (data ? parseInt(data) + 1 : 1).toString().padStart(4, '0');
        $('#pgbid').val(`${prefix}-${id_no}`);
        checkDuplicateID($('#pgbid').val());
    });
}

function checkDuplicateID(id) {
    sendRequest('/Employee/checkDuplicateID/' + id, { pgbid: id.toLowerCase() }, (data) => {
        const isDup = data >= 1;
        $('#pgbid').toggleClass('is-invalid', isDup);
        if (isDup) swal.fire("Warning", "Duplicate PGB ID !!!", "warning");
        disableButton();
    });
}

function disableButton() {
    const invalid = $('.is-invalid').length > 0;
    const empty = !$('#lastname').val() || !$('#firstname').val();
    $('#addButton').prop('disabled', invalid || empty);
}

// --- FORM SAVE/UPDATE ---
function saveEmployee(formId, endpoint, isUpdate = false) {
    const formData = new FormData(document.getElementById(formId));
    swal.fire({ title: 'Confirm Save?', icon: 'question', showCancelButton: true }).then((result) => {
        if (result.isConfirmed) {
            sendRequest(endpoint, formData, (tempID) => {
                swal.fire('Saved!', 'Employee record updated.', 'success').then(() => location.reload());
            }, true);
        }
    });
}
</script>