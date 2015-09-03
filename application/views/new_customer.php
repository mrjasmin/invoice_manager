<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invoice Manager v1.0</title>


     <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo site_url('bower_components/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo site_url('dist/css/timeline.css');?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo site_url('bower_components/morrisjs/morris.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo site_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo site_url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css');?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo site_url('bower_components/datatables-responsive/css/dataTables.responsive.css');?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Invoice Manager v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url(). 'Index/logout';?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="<?php echo site_url();?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li class ="active">
                            <a href=""><i class="fa fa-users fa-fw"></i>  Customers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="<?php echo site_url() .'customers/new_customer_form';?>">Add new</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() .'customers';?>">List all</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                           <li>
                                <a href="tables.html"><i class="fa fa-money fa-fw"></i> Invoices<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo site_url(). 'invoices/new_invoice_form';?>">Add new</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url() .'invoices';?>">List all</a>
                                    </li>
                                </ul>
                            </li>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-users fa-fw"></i>Users</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create new customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if(validation_errors() == NULL){
           
             }
            else {?>
                <div class="alert alert-info"><?php echo validation_errors(); ?></div><?php  
            }
            ?>
            
             <?php echo form_open('customers/new_customer');  ?>
                
                   <div class="row">
                   <div class="col-lg-6">

                   <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Company Name</i></span>
                        <input type="text" class="form-control" placeholder="" name="company">                                
                   </div>       

                   <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">City</i></span>
                        <input type="text" class="form-control" placeholder="" name="city">                                
                   </div> 

                   <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Address</i></span>
                        <input type="text" class="form-control" placeholder="" name="address">                                
                   </div>    

                   <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Country</i></span>
                        <input type="text" class="form-control" placeholder="" name="country">                                
                   </div>

                   <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Phone</i></span>
                        <input type="text" class="form-control" placeholder="" name="phone">                                
                   </div>   

                   <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Email</i></span>
                        <input type="text" class="form-control" placeholder="" name="email">                                
                   </div>                            

                   <br/>

                   <?php $button = array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'submit', 'content' => 'Create customer'); ?>

                   <?php echo form_button($button);?>
                   
                </div>
           </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo site_url('bower_components/jquery/dist/jquery.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url('bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url('dist/js/sb-admin-2.js'); ?>"></script>

     <!-- DataTables JavaScript -->
    <script src="<?php echo site_url('bower_components/datatables/media/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo site_url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js');?>"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>


</body>

</html>
