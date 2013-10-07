<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $page['name']; ?> - Glav.in - The Not Robust, Not Very Powerful, Simple CMS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="template/css/normalize.min.css">
        <link rel="stylesheet" href="template/css/main.css">

        <script src="template/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Glav.in</h1>
                <nav>
                    <?php echo pages_list(); ?>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    <h1><?php echo $page['name']; ?></h1>
                    <?php echo $page['content']; ?>
                </article>

                <aside>
                    <h3>Welcome to Glav.in!</h3>
                    <p>This is the default template that comes with Glav.in. Feel free to modifty it or delete it entirely.</p>
                    <p>For help and documentation please visit <a href="http://glav.in">http://glav.in</a></p>
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <p>
                    &copy;2013 Glav.in<br />
                    Hat Tip to <a href="http://www.initializr.com/">Initializr</a>
                </p>
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="template/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="template/js/main.js"></script>
    </body>
</html>
