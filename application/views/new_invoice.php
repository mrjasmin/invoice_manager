<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invoice Manager v1.0</title>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

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
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-users fa-fw"></i>  Customers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Add new</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() .'customers';?>">List all</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-money fa-fw"></i> Invoices</a>
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
                    <h1 class="page-header">Create new invoice</h1>
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
            
             <?php echo form_open('invoices/new_invoice');  ?>
                
             <div class="row">
                 <div class="col-lg-7">

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Billing company</i></span>
                        <input type="text" class="form-control" placeholder="" name="company">                                
                    </div> 

                    <div class="form-group">
                        <label>Customer</label>
                        <select name="customerOption" class="form-control">
                          <?php 
                            foreach($customers as $customer){
                                echo "<option>" .$customer['company'] . "</option>"; 
                            }
                           ?>
                        </select>
                    </div>      

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Reference number</i></span>
                        <input type="text" class="form-control" placeholder="" name="reference_number">                                
                    </div> 

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Date </i></span>
                        <input type="text" class="form-control datepicker" placeholder="" name="date_created" >      
                    </div>    

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Date due</i></span>
                        <input type="text" class="form-control datepicker" placeholder="" name="date_due" >    
                    </div>    
                    
                </div>
            </div>

            <div class="row">
              <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Add Products
                 </div>
                 <div id="addDelButtons">
                <input type="button" id="btnAdd" value="add section"> <input type="button" id="btnDel" value="remove section above">
            </div>
                 <!-- /.panel-heading -->
                 <div class="panel-body">
                  <div id="entry1" class="clonedInput">
                   <div class="table-responsive" id="order_form">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <td>  </td>
                                <td> 
                                    <div class="form-group">
                                        <input class="form-control input_fn" placeholder="article" name="article[]" id="article"> 
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Description" name="description[]">
                                    </div>
                                </td>
                                <td class="col-lg-1">
                                    <div class="form-group">
                                        <input class="form-control input_fn" placeholder="" name="quantity[]" id="quantity">
                                    </div>

                                </td>
                                <td class="col-lg-2">
                                 <div class="form-group input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control input_fn" placeholder="" name="price[]" id="price">
                                </div>
                            </td>
                               <td class="col-lg-2">
                                 <div class="form-group input-group">
                                    <input type="text" class="form-control input_fn" placeholder="" name="tax[]" id="tax" >
                                    <span class="input-group-addon">%</span>
                                </div>
                            </td>
                              <td class="col-lg-2">
                                 <div class="form-group input-group">
                                    <input type="text" class="form-control input_fn" placeholder="" name="discount[]" id="discount" >
                                    <span class="input-group-addon">%</span>
                                </div>
                            </td>
                            <td class="col-lg-1">
                                <label id="product_sum">133$</label>
                            </td>
                            </tr></div>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->   
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- col-lg-6 -->
    </div>
    <br/>

    </div>

    <div class="row">  
        <div class="col-lg-3">
             <?php $button = array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'submit', 'content' => 'Create invoice'); ?>

             <?php echo form_button($button);?>

        </div>
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo site_url('bower_components/jquery/dist/jquery.min.js');?>"></script>

    <!-- jQuery UI-->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url('bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url('dist/js/sb-admin-2.js'); ?>"></script>

     <!-- DataTables JavaScript -->
    <script src="<?php echo site_url('bower_components/datatables/media/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo site_url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js');?>"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url('dist/js/clone-form-td-multiple.js'); ?>">

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <!-- DatePicker -->
    <script>
    $(function() {
        $( ".datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
       
    });
    </script>


</body>

</html>