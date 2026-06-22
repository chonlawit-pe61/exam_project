<?php
include "config.php";

$application = $_GET['application'] ?? '';
$module      = $_GET['module'] ?? '';
$com_file    = $_GET['com'] ?? '';
$alerttext   = $_GET['alerttext'] ?? '';
$alerttype   = $_GET['alerttype'] ?? 'warning';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
    if (file_exists("application/" . $application . "/" . $module . "/header.php")) {
        include("application/" . $application . "/" . $module . "/header.php");
    }
    ?>
</head>

<body>
    <div class="my-5">
        <?php
        if ($application == '' and $module == '') {
            echo "<script>location.href='index.php?application=dashboard&module=indicator';</script>";
        } else {
            if ($com_file == '') {
                $com_file = "index.php";
            }
            include("application/" . $application . "/" . $module . "/" . $com_file);
        }
        ?>
    </div>
</body>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        $('#dashboardTable').DataTable({
            "dom": "tip",
            "pageLength": 5,
            "ordering": true,
            "columnDefs": [{
                "orderable": false,
                "targets": 6
            }]
        });
        $('.DataTable').DataTable({
            language: {
                "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                "info": "แสดงหน้าที่ _PAGE_ จากทั้งหมด _PAGES_ หน้า",
                "infoEmpty": "ไม่มีข้อมูลให้แสดง",
                "infoFiltered": "(กรองข้อมูลจากทั้งหมด _MAX_ รายการ)",
                "search": "ค้นหา:",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            },
            searching: false,
        });
    });
</script>
<?php
if (file_exists("application/" . $application . "/" . $module . "/footer.php")) {
    include("application/" . $application . "/" . $module . "/footer.php");
}
?>



<?php
if ($alerttext != '') {

    $swalTitle = json_encode($alerttext);
    $swalIcon = 'warning';
    if ($alerttype == 'success') {
        $swalIcon = 'success';
    } elseif ($alerttype == 'danger') {
        $swalIcon = 'error';
    } elseif ($alerttype == 'info') {
        $swalIcon = 'info';
    }
?>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            Swal.fire({
                title: <?php echo $swalTitle; ?>,
                icon: '<?php echo $swalIcon; ?>',
                timer: 3000
            });
        });
    </script>
<?php
}
?>

</html>