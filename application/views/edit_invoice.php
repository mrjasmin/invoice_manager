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
                            <a href="<?php echo site_url();?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li >
                            <a href=""><i class="fa fa-users fa-fw"></i>  Customers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li >
                                    <a href="<?php echo site_url(). 'customers/new_customer_form';?>">Add new</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() .'customers';?>">List all</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="active">
                            <a href="tables.html"><i class="fa fa-money fa-fw"></i> Invoices<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                    <li>
                                        <a class="active" href="<?php echo site_url(). 'invoices/new_invoice_form';?>">Add new</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url() .'invoices';?>">List all</a>
                                    </li>
                                </ul>
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
                    <h1 class="page-header">Edit Invoice #<?php echo $invoice['reference_number']; ?></h1>

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
            
             <?php echo form_open('invoices/edit_invoice/'.$invoice['ID']);  ?>
                
             <div class="row">
                 <div class="col-md-6">
                    <label>Billing company</label>
                     <select name="company" class="form-control">
                        <option>Nobtec AB</option>
                    </select>
                </div>
                 <div class="col-md-6">
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
                </div>

                    <div class="col-md-6">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="">Reference number</i></span>
                            <input type="text" class="form-control" placeholder="" name="reference_number" value="<?php echo $invoice['reference_number']; ?>">                                
                        </div> 
                    </div>

                    <div class="col-md-6">
                           <div class="form-group input-group">
                            <span class="input-group-addon"><i class="">Discount</i></span>
                            <input type="text" class="form-control discount" placeholder="" name="discount" value="<?php echo $invoice['discount']; ?>" onChange="calculateTotalSum()">  
                            <span class="input-group-addon">%</span>  
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="">Date due</i></span>
                            <input type="text" class="form-control datepicker" placeholder="" name="date_due" value="<?php echo $invoice['date_due']; ?>" > 
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"> </i></span>   
                        </div> 
                    </div>   
                     
                     <div class="col-md-6">
                         <div class="form-group input-group">
                            <span class="input-group-addon"><i class="">Tax %</i></span>
                            <input type="text" class="form-control tax" placeholder="" name="tax" value="<?php echo $invoice['tax']; ?>" onChange="calculateTotalSum()"> 
                            <span class="input-group-addon">%</span>   
                        </div>  
                    </div>  

                     <div class="col-md-6">
                          <div class="form-group input-group">
                            <span class="input-group-addon"><i class="">Date </i></span>
                            <input type="text" class="form-control datepicker" placeholder="" name="date_created" value="<?php echo $invoice['date_created']; ?>" >      
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"> </i></span>
                        </div> 
                    </div>
                    
                </div>
            
            <div class="row">
               <div class="col-md-12">
               <div class="table-responsive" id="order_form">
                   
               
                   <div class="table-responsive" id="order_form">
                    <table class="table table-bordered table-hover table-striped" id="table_orders">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>   
                            <?php foreach($orders as $order){  

                                   
                                ?>
                                <tr>
                                <td> 
                                   
                                    <input type="hidden" name="ID[]"  value="<?php echo $order['ID']; ?>">
                                   
                                    <div class="form-group">
                                        <input class="form-control input_fn" placeholder="article" name="article[<?php echo $count;?>]" id="<?php echo 'article' .$count;?>" value="<?php echo $order['article'];?>"> 
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Description" name="description[<?php echo $count;?>]" value="<?php echo $order['description'];?>">
                                    </div>
                                </td>
                                <td class="col-lg-1">
                                    <div class="form-group">
                                        <input class="form-control input_fn quantity" placeholder="" name="quantity[<?php echo $count;?>]" id="<?php echo $count;?>" value="<?php echo $order['quantity'];?>" 
                                        onChange="calculateTotalRow(this)" >
                                    </div>

                                </td>
                                <td class="col-lg-2">
                                 <div class="form-group input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control input_fn price" placeholder="" name="price[<?php echo $count;?>]" id="<?php echo $count;?>" value="<?php echo $order['price'];?>"
                                     onChange="calculateTotalRow(this)">
                                </div>
                            </td>
                            <td class="col-lg-1 product_sum_td">
                                <label class="product_sum">
                                    <?php echo $order['total']; ?>
                                </label>
                                <input type="hidden" name="total_row[<?php echo $count;?>]"  value="<?php echo $order['total'];?>" class="total_row">
                            </td>
                            </tr>
                           
                             <?php
                                ++$count; 
                              }?>

                             <input type="hidden" name="rows" class="rows" value="<?php echo $count; ?>">
                            
                        </tbody>
                        </table>
                 
                    <!-- /.table-responsive -->   
                </div> 

                 <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Add/remove products</th>
                            </tr>
                        </thead>
                          <tbody>   
                            <tr>
                                <td><div id="addDelButtons">
                                        <input type="button" id="btnAdd"></div>
                                        <input type="button" id="btnDel"></div>
                                    </div> </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
           
 
    <div class="row">
         <div class="col-md-3">
            <div id="totalSum">
                TOTAL:<span><?php echo $invoice['total'];?></span>
                <input type="hidden" name="total_invoice_sum" value="" class="total_invoice">
            </div>
        </div>
    </div>

     <br/>

    <div class="row">  
        <div class="col-lg-3">
             <?php $button = array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'submit', 'content' => 'Save changes'); ?>

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
    <script src="<?php echo site_url('dist/js/clone-form-td-multiple.js'); ?>"></script>

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

    <script>

    $(document).ready(function(){

        var counter = $('.rows').val(); 

        $('#btnAdd').click(function(){
            if(counter > 10){
                alert("Action is not allowed"); 
            }
            else{   

                var element = $('<tr></tr>').attr("id", "order" + counter);     

                element.html('<td><div class="form-group"><input class="form-control input_fn" placeholder="article" name="article['+ counter+']" id="'+counter+'"></div>' +
                  '<div class="form-group"><input class="form-control" placeholder="Description" name="description[]"></div></td><td class="col-lg-1">' +
                  '<div class="form-group"><input class="form-control input_fn quantity" placeholder="" name="quantity[' + counter+']" id="'+counter+'"  onChange="calculateTotalRow(this)"></div></td>' +
                  '<td class="col-lg-2"><div class="form-group input-group"><span class="input-group-addon">$</span>' +
                  '<input type="text" class="form-control input_fn price" placeholder="" name="price[' + counter+']" id="'+counter+'"  onChange="calculateTotalRow(this)"></div></td><td class="col-lg-1 product_sum_td">' +
                  '<label class="product_sum">0</label><input type="hidden" name="total_row[' + counter+']" class="total_row">' +
                  '</td>');  

                element.appendTo('#table_orders'); 

                ++counter; 

                $('.rows').val(counter); 
               
            }
        })

    }); 
    </script>


    <script>

     function calculateTotalRow(obj){

        var id_row = obj.id;

        var tr = $(obj).parent().parent().parent(); 

        var quantity = tr.find('.form-control.input_fn.quantity').val(); 
        var price = tr.find('.form-control.input_fn.price').val()

        var totalPrice = quantity * price; 

        tr.find('.product_sum').text(totalPrice); 

        var total_row_array = tr.find(('input[name="total_row['+id_row+']"]')); 

        total_row_array.val(totalPrice); 

        console.log(total_row_array.val()); 

        calculateTotalSum(); 

     }

     function calculateTotalSum(){

        var totalSum = 0; 
        var discount =  (1 - ($('.form-control.discount').val())/100).toFixed(2); 
        var tax = 1 + ($('.form-control.tax').val())/100; 

        $('#order_form .product_sum ').each(function(index){
            totalSum +=parseInt($(this).text(), 10); 
        }); 

        var totalToPay = (tax * discount * totalSum).toFixed(2); 

        $('#totalSum span').text(totalToPay); 

        $('.total_invoice').val(totalToPay); 
        
     }

    </script>


</body>

</html>