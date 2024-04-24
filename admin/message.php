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
        $current='message';
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


<table class="table table-hover table-bordered table-strip">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>view</th>
            <th>controlls</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'Functions/connect.php';
        $select_users="SELECT * FROM message";
        $query=$conn ->query($select_users);
            foreach($query as $message){?>     
            <tr>
                <td><?= $message['id']?></td>
                <td><?= $message['name']?></td>
                <td><?= $message['email']?></td>
                <td><?= $message['phone']?></td>
                <td class="view"><?= $message['view']?></td>
                <td>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg modalbtn" data-toggle="modal" data-target="#myModal-<?= $message['id']?>" data-id="<?=$message['id']?>">show message</button>

                    <!-- Modal -->
                    <div id="myModal-<?= $message['id']?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">show message<?= $message['id']?></h4>
                          </div>
                          <div class="modal-body">
                            <p><?= $message['message']?></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default success" data-dismiss="modal">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
            </tr>
            <?php } ?>
   </tbody>
</table>
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
    $('.modalbtn').click(function(){
        
        //change unread to read
        $(this).parent().parent().find('.view').text('read');

        //save the id of readed msg
        let id =$(this).data('id');

        $('.note').data('num',$('.note').data('num')-1 );
        //reduce number of unreaded message 
       $('.note').text($('.note').data('num') );

        //remove the msg from the drop list
       $('.listID').each(function (index, item) {
            if($(item).attr('id')==id){
            $(item).remove();
            };

            //send id to server side
        $.post('Functions/editMess.php',{
        messageId:id
        },function(data){

        })
    })
    
       
        });
    </script>

</body>

</html>