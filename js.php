<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= BASE_URL ?>assets/js/jquery-3.2.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script src="<?= BASE_URL ?>assets/js/sweetalert2.js"></script>
<script>
  function alertMessage (icon, title, text) {
    Swal.fire({
      icon: icon,
      title: title,
      text: text,
    })
  }

  function loader () {
    Swal.fire({
      allowOutsideClick: false,
      showConfirmButton: false,
      willOpen: () => {
        Swal.showLoading()
      },
    })
  }
</script>