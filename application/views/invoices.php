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
    <link href="<?php echo site_url('dist/css/all.min.css');?>" rel="stylesheet">

     <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo site_url('bower_components/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo site_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo site_url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css');?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo site_url('bower_components/datatables-responsive/css/dataTables.responsive.css');?>" rel="stylesheet">

     <!-- DataTables Responsive CSS -->
    <link href="<?php echo site_url('dist/css/all.min.css');?>" rel="stylesheet">
   

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
                            <a href="<?php echo site_url(). 'Index';?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                       
                             <li class="active">
                                <a href="tables.html"><i class="fa fa-money fa-fw"></i> Invoices<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo site_url(). 'invoices/new_invoice_form';?>">Add new</a>
                                    </li>
                                    <li>
                                        <a class="active" href="<?php echo site_url() .'invoices';?>">List all</a>
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
                    <h1 class="page-header">Invoices</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- link that opens popup -->
            
            <div class="row">

            

                <form id="test-form" class="mfp-hide white-popup-block">
                <h1>Send invoice id <label id="inv_id"></label></h1>
                <input type="hidden" name="customerID" class="customerID">
                <fieldset style="border:0;">
                    <p>Please fill in the information below</p>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">To</i></span>
                        <input type="text" class="form-control" placeholder="" name="email_to" value="" id="email_to">                                
                    </div> 
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="">Subject</i></span>
                        <input type="text" class="form-control" placeholder="" name="email_subject" value="" id="email_subject">                                
                    </div> 
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" rows="3" id="email_message"></textarea>
                    </div>
                </fieldset>

                <?php $button = array('class' => 'btn btn-default', 'id' => 'email_submit', 'type' => 'submit', 'name' => 'submit', 'content' => 'Send'); ?>

                <?php echo form_button($button);?>

            </form>
                   <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date Created</th>
                                            <th>Billing company</th>
                                            <th>Ref#</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                         <?php foreach($invoices as $invoice){
                                             echo "<tr class='even gradeX'>";
                                             echo "<td>" .$invoice['ID']. "</td>";
                                             echo "<td>" .$invoice['date_created']. "</td>";
                                             echo "<td>" .$invoice['billing_company']. "</td>";
                                             echo "<td>" .$invoice['reference_number']. "</td>";
                                             echo "<td class='customer' id='.invoice[customer]'>" .$invoice['customer']. "</td>";
                                             echo "<td>" .$invoice['total']. "</td>";
                                             echo "<td>" .$invoice['paid_amount']. "</td>"; ?>
                                             
                                             <td class="col-lg-1">
                                                <ul class="actions_list">
                                                    <li><a href="<?php echo base_url().'Download/downloadPDF/' . $invoice['ID']. '/'. $invoice['customer'];?>" title="Download "><img src="<?php echo site_url().'img/pdf.png';?>"></a></li>
                                                    <li><a href="<?php echo base_url().'Download/downloadXLS/' . $invoice['ID']. '/'. $invoice['customer'];?>" title="edit"><img src="<?php echo site_url().'img/excel.png';?>"></a></li>
                                                    <li><a href="<?php echo base_url(). 'invoices/edit_invoice_form/' . $invoice['ID'];?>"><img src="<?php echo site_url().'img/edit.png';?>"></a></li>
                                                    <li><a href="<?php echo base_url() . 'invoices/delete_invoice/' . $invoice['ID'];?>" onClick="return confirm('You are going to delete this invoice. Are you sure?')"
                                                        title="delete"><img src="<?php echo site_url().'img/delete.png';?>"></a></li>
                                                    <li><a href="#test-form" title="email" id="<?php echo $invoice['ID'];?>" class="popup-with-form email"><img src="<?php echo site_url().'img/email.png';?>"></a></li>
                                               </ul> 
                                             </td>
                                            
                                             <?php
                                             echo "</tr>";
                                         }
                                         ?>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                <a href="<?php echo base_url().'invoices/new_invoice_form';?>" class="btn btn-default">New invoice</a>
            </div>
          
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo site_url('bower_components/jquery/dist/jquery.min.js');?>"></script>

    <script src="<?php echo site_url('dist/js/jquery.magnific-popup.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url('bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url('dist/js/sb-admin-2.js'); ?>"></script>

     <!-- DataTables JavaScript -->
    <script src="<?php echo site_url('bower_components/datatables/media/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo site_url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js');?>"></script>

    <!-- LightBox -->
    <script src="<?php echo site_url('dist/js/jquery.magnific-popup.min.js');?>"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
  
    <script>
    $(document).ready(function() {
    $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
             }
            }
        });
    });
    </script>

    <script>

    $(document).ready(function() {

        $('.popup-with-form.email').click(function(){
        
            $('#inv_id').text(this.id); 

            var t = $(this).parent().parent().parent().parent(); 

            var customer_id  = t.find('.customer').html(); 
            $('.customerID').val(customer_id); 

        }); 

        $('#email_submit').click(function(){
        
          var invoice_ID = parseInt($('#inv_id').text(), 10); 
          var customer_id = $('.customerID').val(); 

          var vto = $('#email_to').val();
          var vsubject = $('#email_subject').val();
          var vmessage = $('#email_message').val();

          createInvoice(customer_id, invoice_ID); 

          if(vto != ''){
            $.ajax({
                type: "post", 
                url: "<?php echo base_url();?>/email/send_email",
                data : {id: invoice_ID, to: vto, subject: vsubject, message: vmessage},
                success: function(result){
                    alert(result);
                }, 
                error: function(result){
                    alert(result); 
                }

            }); 
          }

        }); 

    });

     function createInvoice(customerID, invoiceID){
        $.ajax({
            type: "post", 
             url: "<?php echo base_url();?>/Download/savePDF",
             data: {inv_id: invoiceID, c_id: customerID},
             succes: function(){
                
             },
             error: function(){
                alert("Error creating PDF file"); 
             }
        })
    }

    </script>

</body>

</html>