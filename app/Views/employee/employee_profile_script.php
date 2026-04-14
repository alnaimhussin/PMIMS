<script>
  $(document).ready(function () {
    // Initialization code here if needed
    
    // 1. Get the URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const employeeId = urlParams.get('id');

    // 2. If ID exists, automatically fetch and show details
    if (employeeId) {
        console.log("Loading profile for ID:", employeeId);
        getDetail(employeeId); 
    }
  });

  // Reusable AJAX wrapper to reduce redundancy
  function fetchData(endpoint, postData, successCallback) {
    $.ajax({
      url: `<?php echo base_url(); ?>/dynamic/${endpoint}`,
      method: "POST",
      data: postData,
      dataType: 'json',
      success: successCallback,
      error: function (xhr, status, error) {
        const msg = xhr.responseJSON?.error || xhr.responseText || status;
        swal.fire({
          title: 'System Error',
          html: `<div style="text-align:left; font-size:12px;">${msg}</div>`,
          icon: 'error'
        });
      },
      timeout: 5000
    });
  }

  function searchID() {
    const pgbid = $('#search_employee_id').val();
    if (!pgbid) return;

    fetchData(`search_pgbid/${pgbid}`, { pgbid }, (data) => {
      let html = data.map(row => `
        <tr ondblclick="getDetail(${row._id})">
          <td>${s(row.lastname)}, ${s(row.firstname)} ${s(row.middlename)}</td>
          <td>${s(row.department)}</td>
        </tr>`).join('');
      $('#search_table').html(html);
      $('#search_employee_id').val("");
    });
  }

  function searchName() {
    const lastname = $('#search_employee_last_name').val().trim();
    const firstname = $('#search_employee_first_name').val().trim();

    // Check if BOTH fields have values before proceeding
    if (lastname !== "" && firstname !== "") {
      fetchData(`search_name/${lastname}/${firstname}`, { 
        lastname: lastname, 
        firstname: firstname 
      }, (data) => {
        let html = '';
        if (data.length === 0) {
          html = '<tr><td colspan="2" class="text-center">No results found.</td></tr>';
        } else {
          html = data.map(row => `
            <tr ondblclick="getDetail(${row._id})" style="cursor:pointer">
              <td>${s(row.lastname)}, ${s(row.firstname)} ${s(row.middlename)}</td>
              <td>${s(row.department)}</td>
            </tr>`).join('');
        }
        
        $('#search_table').html(html);
        
        // Optional: Clear search inputs after successful search
        // $('#search_employee_last_name, #search_employee_first_name').val("");
      });
    } else {
      // Optional: Provide visual feedback or clear the table if inputs are incomplete
      console.log("Waiting for both Name fields to be filled...");
    }
    
    return false;
  }

  function getDetail(id) {
    if (!id) return;

    // 1. Basic Details & Address
    fetchData(`viewDetail/${id}`, { id }, (data) => {
      if (!data.length) return;
      const row = data[0];

      // Image Handling
      const imgPath = `<?php echo base_url("/public/assets/img/"); ?>/${s(row.dept_code)}/${s(row.lastname)}${s(row.firstname)}-picture.png`;
      $('#employee_picture').attr('src', imgPath);

      // Mapping Data to Input IDs
      const fieldMap = {
        "lastname": row.lastname, "firstname": row.firstname, "middlename": row.middlename,
        "birthdate": row.birthdate, "birthplace": row.birthplace, "gender": row.gender,
        "civil_status": row.civilstatus, "title": row.profession, "height": row.height,
        "weight": row.weight, "blood_type": row.bloodtype, "mobile_number": row.contact,
        "position": row.position, "department": row.department, "salary_grade_step": row.sg_code,
        "monthly_rate": row.rate, "id_number": row.pgbid, "emp_status": row.status,
        "gsis": row.gsis, "philhealth": row.philhealth, "tin": row.tin, "pagibig": row.pagibig, "sss": row.sss,
        "contact_last_name": row.e_lastname, "contact_first_name": row.e_firstname, "contact_middle_name": row.e_middlename,
        "contact_relation": row.e_relation, "contact_ext_name": row.e_extname, "contact_contact_number": row.e_contact,
        "res_lot": row.r_lot, "res_street": row.r_street, "res_subdivision": row.r_village, "res_barangay": row.r_barangay,
        "per_lot": row.p_lot, "per_street": row.p_street, "per_subdivision": row.p_village, "per_barangay": row.p_barangay,
        "res_province": row.provDesc, "res_city_municipal": row.citymunDesc,
        "per_province": row.provDesc, "per_city_municipal": row.citymunDesc
      };

      Object.keys(fieldMap).forEach(key => $(`#${key}`).val(s(fieldMap[key])));
      $('#email_address').val(row.email || "");
      $('#startingDate').val(row.startingDate ? moment(row.startingDate).format('MMMM DD, YYYY').toUpperCase() : "");
    });

    // 2. Education
    fetchData(`viewDetailEducation/${id}`, { id }, (data) => {
      const html = data.length ? data.map(v => `<tr><td>${s(v.category)}</td><td>${s(v.name_school)}</td><td>${s(v.degree)}</td><td>${s(v.level_earned)}</td><td>${s(v.year_graduate)}</td></tr>`).join('') 
                   : '<tr><td colspan="5" class="text-center">No Education Records Found</td></tr>';
      $('#education').html(html);
    });

    // 3. Eligibility
    fetchData(`viewDetailEligibility/${id}`, { id }, (data) => {
      const html = data.length ? data.map(v => `<tr><td>${s(v.eligibility)}</td><td>${s(v.license)}</td><td>${s(v.validity)}</td></tr>`).join('')
                   : '<tr><td colspan="3" class="text-center">No Eligibility Records Found</td></tr>';
      $('#eligibility').html(html);
    });

    // 4. Service Record
    fetchData(`searchServiceRecord/${id}`, { id }, (data) => {
      const html = data.map(v => `<tr><td>${s(v.startDate)} - ${s(v.endDate)}</td><td>${s(v.position_title)}</td><td>${s(v.sg_step)}</td><td>${s(v.monthly_salary)}</td><td>${s(v.appointment_status)}</td><td>${s(v.department_agency)}</td></tr>`).join('');
      $('#search').html(html);
    });

    // 5. Leave Credits
    fetchData(`viewLeaveCredit/${id}`, { id }, (data) => {
      if (!data.length) return;
      const r = data[0];
      const html = `
        <tr><td>Vacation</td><td>${getVacationLeaveCredit(r.startingDate, r.vacation)}</td></tr>
        <tr><td>Sick</td><td>${getVacationLeaveCredit(r.startingDate, r.sick)}</td></tr>
        <tr><td>Maternity</td><td>${getMaternity(r.maternity, r.gender)}</td></tr>
        <tr><td>Paternity</td><td>${getPaternity(r.paternity, r.gender)}</td></tr>
        <tr><td>Special Privilege</td><td>${getSPL(r.spl)}</td></tr>
        <tr><td>Solo Parent</td><td>${getSolo(r.solo, r.solo_parent)}</td></tr>`;
      $('#leave_credit').html(html);
    });
  }

  // Sanitizer
  function s(v) { return v ? String(v).trim().toUpperCase() : ""; }

  // Calculation Helpers
  function getVacationLeaveCredit(target, used) {
    if (!target) return 0;
    const start = new Date(target), now = new Date();
    let months = ((now.getFullYear() - 1) - start.getFullYear()) * 12 - start.getMonth() + (now.getMonth() + 1);
    return (months * 1.250 - (parseFloat(used) || 0)).toFixed(3);
  }

  function getMaternity(u, g) { return s(g) === "FEMALE" ? 105 - (parseFloat(u) || 0) : "N/A"; }
  function getPaternity(u, g) { return s(g) === "MALE" ? 7 - (parseFloat(u) || 0) : "N/A"; }
  function getSPL(u) { return 3 - (parseFloat(u) || 0); }
  function getSolo(u, p) { return s(p) === "YES" ? 7 - (parseFloat(u) || 0) : "N/A"; }
</script>