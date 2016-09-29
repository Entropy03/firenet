<?php
//var_dump($this);
$this->head(
    array(
        'title' => '登陆',
        'css' => array(
            '/admin/AdminLTE.css',
            '/admin/bootstrap.min.css',
            'admin/ionicons.min.css'
        ),
        'js' => array(
            '/jquery.min.js',
            '/bootstrap.js',
            '/admin/adminLogin.js'
        ),
    )
);

?>  

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
 

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                保鲜车
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
            
           
            </nav>
        </header>            <!-- Left side column. contains the logo and sidebar -->
      
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
            

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">后台</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="username">帐号</label>
                                            <input type="username" class="form-control" id="username" placeholder="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">密码</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                      
                                        <div class="checkbox">
                                            <label>
                                                <input id="autoLogin" type="checkbox"> 自动登录
                                            </label>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="button" onclick="userObj.login();return false;" value="登录" class="btn btn-primary"> 
                                    </div>
                                </form>
                            </div><!-- /.box -->

                         
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
	     
    </body>
</html>