<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./mvc/views/blocks/head.php"; ?>
    <?php require_once "./mvc/views/blocks/head-admin.php"; ?>
</head>

<body>
    <header class="header">
        <?php
    require_once "./mvc/views/blocks/header-admin.php";
    ?>
    </header>
    <main class="main-view3">
        <div class="position-relative">
            <?php
            require_once "./mvc/views/blocks/aside-admin.php";
            ?>
        </div>
        <article>
            <?php
            require_once "./mvc/views/pages/" . $data['page'] . ".php";
            ?>
        </article>
    </main>
    <footer class="footer">
        <?php
    require_once "mvc/views/blocks/footer.php";
    ?>
    </footer>
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- DataTables  & Plugins -->
    <script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

    <script src="public/plugins/jszip/jszip.min.js"></script>
    <script src="public/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="public/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $(function() {
        //Add text editor
        $('#compose-textarea').summernote()
    })
    </script>
    <script src="public/assets/js/endpage.js"></script>
</body>

</html>