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

      <style>

     
        #install_form {width: 480px;  margin: 10% auto; }
      </style>

   </head>
   <body>
      
      <div class="container">  
    <div class="row">  
    <div class="center-block">  
        
          <?php $data_array = array('id' => 'install_form'); 
           echo form_open('install', $data_array);  ?>

           
           <h2>Invoice Manager Installer</h2>
           <p>Please fill in the information below!</p>
     

            <?php if((validation_errors() == NULL) && isset($error_message)){?>
                   <div class="alert alert-info"><?php echo $error_message;?></div><?php
             }
            else {?>
                <div class="alert alert-info"><?php echo validation_errors(); ?></div><?php  
            }
            ?>

            <div class="form-group">  
               <label>Database hostname</label>
               <input type="text" class="form-control" placeholder="" name="host">                                
            </div>

            <div class="form-group">
               <label>Username</label>
               <input type="text" class="form-control" placeholder="" name="username">                                
            </div>

            <div class="form-group">
               <label>Password</label>
               <input type="text" class="form-control" placeholder="" name="password">                                
            </div>

            <div class="form-group">
               <label>Database name</label>
               <input type="text" class="form-control" placeholder="" name="database">                                
            </div>
         

         <?php $button = array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'submit', 'content' => 'Next step'); ?>
         <?php echo form_button($button);?>

     
    </div>
  </div>
</div>
   </body>
</html>