<script>
  function logout() {
    Swal.fire({
      title: 'Are you sure?',
      text: "Logout!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '<?php echo base_url(); ?>/login/logout',
          method: "POST",
          async: true,
          dataType: 'json',
        });
        Swal.fire({
          title: 'Logout!',
          text: "You've been logout.",
          icon: 'success',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ok'
        }).then((result) => {
          window.location.href = "<?php echo base_url().'/admin'; ?>";
        })

      }
    })
  }
</script>