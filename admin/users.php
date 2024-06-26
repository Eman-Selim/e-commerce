<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Users</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $current='users';
        include'includes/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
             <?php include'includes/header.php'; ?> 
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                               if(!isset($_GET['action']))
                                    include'design/userTable.php';
                               elseif($_GET['action']=='edit')
                                    include'design/editUser.php';                  
                            ?>
                        </div>
                        
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include"includes/footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>
    
$('.modalUBtn').click(function(){
   let x=$(this).data('target');
   let nam=$(this).attr('name');
   let priv=$(this).attr('priv');
   $('.modalTarget').attr('id',x.substring(1));
   $('.modal-titled').text('Delete'+x.substring(9));
   $('.modal-body p').text('Are you sure you want to delete the '+priv+' '+nam);

   //delete user
   $('.delBtn').click(function(){ 

       $('.listUsr').each(function(index,item){
           if($(item).attr('id')==x.substring(9)){
                  $(item).remove();
                  $.get('Functions/delete.php',{
                        id:x.substring(9)},
                  function(data){
                        $('.nData').replaceWith(data); })
           }
       })
    });

})


//add users
$('.addUser').click(function(){
    var data = {};
    $('#modalRegisterForm input , select').each(function(index,item){
        if ($(item).val() == '') {
            $(item).attr('placeholder', 'can`t be empty');
        } else {
            data[$(item).attr('name')] = $(item).val();
        }
    })
     if (Object.keys(data).length >= 7) {
        $.post('Functions/userAdd.php', data, function (ec) {
        $('.newData').replaceWith(ec);

        })
     }
})



</script>

</body>

</html>