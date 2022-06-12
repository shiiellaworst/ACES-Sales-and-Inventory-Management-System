<?php 
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

$query = "SELECT *, COUNT(`QTY`) AS `QTY` FROM `transaction` WHERE `STATUS` = 'RECEIVED' GROUP BY `TRANSACTION_CODE`;";
if ($result = mysqli_query($conn, $query)) {
  $row = $result->fetch_assoc();
  $rowcount=mysqli_num_rows($result);

}

    

?>

          


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../ACESAdmin/assets/css/style.css">
    <link rel="stylesheet" href="../ACESAdmin/assets/css/print.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--Font Awoseme-->
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
    
    <title>Admin Dashboard Panel</title> 



</head>

<body>
    


<style> 
@media print {
    body * {
      visibility: hidden;
    }
    #section-to-print, #section-to-print * {
      visibility: visible;
    }
    #section-to-print {
    
      position: absolute;
      height: 100%;
        width: 100%;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
      left: 0;
      top: 0;
    }
    #printBtn{
        display: none;
    }
  }
</style>
<nav>
<?php include('../ACESAdmin/sidebar.php');?>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                <i class="fab fa-product-hunt"></i>
                    <span class="text"> Sales Report</span>
                </div>

                <div  class="container-fluid" id="section-to-print">            
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group row text-left mb-0">
                            <div class="col-sm-9">
                            <h5 class="font-weight-bold" id="section-to-print">
                            ACES SALES AND INVENTORY MANAGEMENT SYSTEM
                            </h5>
                            </div>
                            <div class="col-sm-3 py-1">
                                <button id="printBtn" onclick="window.print();" style="border: 1px;">
                                Print Sales Report
                                </button>
                                
                            </div>
                        </div>
                        <hr>
                        <div align="center">
                            <h2>SALES REPORT</h2>
                            <h5>of date</h5>
                        </div>

                        <div align="center">
                            <input type="text" id="min" name="min">
                            <label>  from  </label>
                            <input type="text" id="max" name="max">
                        </div>
                        <div class="table-responsive mt-2">
                        <table id="myTable" class="table table-striped mb-0" >
                            <thead style="background-color: #fff; color: black; height: 50px; text-align: middle;">
                            <th style="width:70px">INVOICE#</th>
                            <th style="width:70px">DATE</th>
                            <th style="width:200px">DESCRIPTION</th>
                            <th style="width:80px">PRICE</th>
                            <th style="width:80px">QTY</th>
                            <th style="width:80px">SUBTOTAL</th>
                            </thead>
                            <tbody>
                            <?php do { ?>
                            <tr style="border-bottom:1px solid gray;">
                                <td><?php echo $row['TRANSACTION_CODE'];?></td>
                                <td><?php echo $row['DATEOF'];?></td>
                                <td><?php echo $row['PRODUCT_NAME'];?></td>
                                <td><?php echo $row['PRICE'];?></td>
                                <td><?php echo $row['QTY'];?></td>
                                <td class="forTotal"><?php echo $row['TOTAL'];?></td>
                                
                            </tr>
                            <?php } while($row = $result->fetch_assoc());?>
                            </tbody>
                        </table>
                        </div>

                        <div class="card-body">
                            <div class="form-group row text-left mb-0">
                                <div class="col-sm-9">
                                <h5 class="font-weight-bold"></h5>
                                </div>
                                <div class="col-sm-3 py-1">
                                    <h5 class="font-weight-bold">TOTAL: <span id = "totalna" class="font-weight-bold"></span></h5>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

 </section>


    <script src="../ACESAdmin/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    
    <script> 

    var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[1] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
 
    // DataTables initialisation
    var table = $('#myTable').DataTable({
            paging: false,
        bFilter: false,
        ordering: false,
        searching: true,

        dom: 't' 
      });
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();

        var sum = 0;
        $('.forTotal').each(function() {
        sum += +$(this).text()||0;
        });
        $("#totalna").text(sum);

    });

    var sum = 0;
        $('.forTotal').each(function() {
        sum += +$(this).text()||0;
        });
        $("#totalna").text(sum);


});
    </script>

</body>
</html>



