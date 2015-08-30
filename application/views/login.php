<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo site_url('bower_components/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="...../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
     body{background: #363636; }
    </style>


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Invoice Manager</b> | Please Sign In</h3>
                    </div>
                    <div class="panel-body">


                    <?php if(isset($error)){
                        echo "Wrong username or password!<br></br>"; 
                    }
                    ?>
                    
                    <?php echo validation_errors(); ?>

                    <?php echo form_open('Index/login_'); ?>
        
                    <?php
                    
                    $pw = array(
                        'name'        => 'password',
                        'id'          => 'password',
                        'class'       => 'form-control',
                        'value'       => '',
                        'type'        => 'password',
                        'maxlength'   => '100',
                        'size'        => '50',
                    );

                    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'class'       => 'form-control',
                        'value'       => '',
                        'type'        => 'username',
                        'maxlength'   => '100',
                        'size'        => '50', 
                    );

                    $button= array(
                        'class'       => 'btn btn-lg btn-success btn-block',
                    );
        
                    ?>
    
                       <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <?php echo form_input($username); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input($pw); ?>
                                </div>
                                <?php echo form_submit($button, 'Login', 'Login');?>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="..../dist/js/sb-admin-2.js"></script>

</body>

</html>
