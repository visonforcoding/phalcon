<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>phalcon demo 1</title>

        <!-- Bootstrap -->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid" style="width:80%;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">绾~</a>
                </div>
                <?php echo $this->elements->getMenu(); ?>
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <?php echo $this->flash->output(); ?>
            
            <hr>
        
    <div class="jumbotron">
        <h1>Welcome to EVA</h1>
        <p>基于phalcon的多模块框架</p>
        <p><?php echo $this->tag->linkTo(array('register', 'Try it for Free &raquo;', 'class' => 'btn btn-primary btn-large btn-success')); ?></p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h2>多模块</h2>
            <p>Create, track and export your invoices online. Automate recurring invoices and design your own invoice using our invoice template and brand it with your business logo. </p>
        </div>
        <div class="col-md-4">
            <h2>组织灵活</h2>
            <p>Gain critical insights into how your business is doing. See what sells most, who are your top paying customers and the average time your customers take to pay.</p>
        </div>
        <div class="col-md-4">
            <h2>完整的工作流</h2>
            <p>Invite users and share your workload as invoice supports multiple users with different permissions. It helps your business to be more productive and efficient. </p>
        </div>
    </div>

        <footer>
            <p>&copy; cwp 2014</p>
        </footer>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/public/js/bootstrap.min.js"></script>
</body>
</html>