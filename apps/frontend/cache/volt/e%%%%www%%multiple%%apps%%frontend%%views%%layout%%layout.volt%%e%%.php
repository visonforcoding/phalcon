a:5:{i:0;s:238:"<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>";s:5:"title";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:12:"phalcon demo";s:4:"file";s:41:"../apps/frontend/views/layout/layout.volt";s:4:"line";i:7;}}i:1;s:1526:"</title>

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
        ";s:4:"body";N;i:2;s:398:"
        <footer>
            <p>&copy; cwp 2014</p>
        </footer>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/public/js/bootstrap.min.js"></script>
</body>
</html>";}