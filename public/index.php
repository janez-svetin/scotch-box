<!doctype html>
<!--[if lt IE 7 ]><html itemscope itemtype="http://schema.org/Product" id="ie6" class="ie ie-old" lang="en-US" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 7 ]>   <html itemscope itemtype="http://schema.org/Product" id="ie7" class="ie ie-old" lang="en-US" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8 ]>   <html itemscope itemtype="http://schema.org/Product" id="ie8" class="ie ie-old" lang="en-US" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 9 ]>   <html itemscope itemtype="http://schema.org/Product" id="ie9" class="ie" lang="en-US" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 9]><!--><html itemscope itemtype="http://schema.org/Product" lang="en-US" prefix="og: http://ogp.me/ns#"><!--<![endif]-->
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <title>Project Scaffold</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Favicons -->
    <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="favicon.ico">

    <!-- Styles -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Oswald:400,300|Pathway+Gothic+One">
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        ::selection {
            background: #000;
            color: #fff;
        }
        ::-moz-selection {
            background: #000;
            color: #fff;
        }
        body {
            font-family: 'Pathway Gothic One', sans-serif;
            height: 2000px;
            font-size: 10px;
        }
        a {
            -webkit-transition: all 310ms ease;
            -moz-transition: all 310ms ease;
            transition: all 310ms ease;
            text-decoration: none !important;
        }
        section {
            position: relative;
        }
        article {
            padding: 50px 0;
        }
        article table {
            background: #e3e3e3;
        }
        article .content .wrap {
            background: #ccc;
            margin-bottom: 50px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        article .content .wrap h2 {
            margin: 10px 0 15px;
            color: #fff;
        }
        article .content .wrap td {
            font-size: 20px;
        }
        article .fa-times {
            color: rgb(255, 69, 69);
        }
        article .fa-check {
            color: rgb(0, 179, 64);
        }
    </style>

</head>
<body>

    <article>
        <div class="container">

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>System Stuff</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>OS</td>
                            <td>Ubuntu 14.04 LTS (Trusty Tahr) </td>
                        </tr>
                        <tr>
                            <td>PHP Version</td>
                            <td><?php echo phpversion(); ?></td>
                        </tr>
                        <tr>
                            <td>Ruby 2.2.x</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Vim</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Git</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>cURL</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Imagick</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Composer</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Beanstalkd</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>Node</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>NPM</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>Database Stuff</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <?php
                        $mysql_exists = FALSE;
                        if (extension_loaded('mysql') or extension_loaded('mysqli')) :
                            $mysql_exists = TRUE;
                        endif;
                        $mysqli = @new mysqli('localhost', 'root', 'root');
                        $mysql_running = TRUE;
                        if (mysqli_connect_errno()) {
                            $mysql_running = FALSE;
                        } else {
                            $mysql_version = $mysqli->server_info;
                        }

                        $mysqli->close();
                        ?>
                        <tr>
                            <td>MySQL is installed</td>
                            <td><i class="fa fa-<?php echo ($mysql_exists ? 'check' : 'times'); ?>"></i></td>
                        </tr>
                        <tr>
                            <td>MySQL is connected</td>
                            <td><i class="fa fa-<?php echo ($mysql_running ? 'check' : 'times'); ?>"></i></td>
                        </tr>
                        <tr>
                            <td>MySQL Version</td>
                            <td><?php echo ($mysql_running ? $mysql_version : 'N/A'); ?></td>
                        </tr>


                        <?php
                        $psql_is_connected = FALSE;
                        $psql_conn = pg_connect('host=localhost port=5432 dbname=scotchbox user=root password=root');
                        if ($psql_conn) $psql_is_connected = TRUE;
                        $psql_version = pg_version($psql_conn)['client'];
                        pg_close($psql_conn);
                        ?>
                        <tr>
                            <td>PostgreSQL is installed</td>
                            <td><i class="fa fa-<?php echo ($psql_is_connected ? 'check' : 'times'); ?>"></i></td>
                        </tr>
                        <tr>
                            <td>PostgreSQL is connected</td>
                            <td><i class="fa fa-<?php echo ($psql_is_connected ? 'check' : 'times'); ?>"></i></td>
                        </tr>
                        <tr>
                            <td>PostgreSQL Version</td>
                            <td><?php echo ($psql_version ? $psql_version : 'N/A'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>Caching stuff</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <?php
                        $redis = new Redis();
                        $redis->connect('127.0.0.1', 6379);
                        ?>
                        <tr>
                            <td>Redis</td>
                            <td><i class="fa fa-<?php echo ($redis->ping() ? 'check' : 'times'); ?>"></i></td>
                        </tr>

                        <?php
                        $memcached_running = FALSE;
                        $memcached_version = FALSE;
                        $memcached_version = FALSE;
                        if (class_exists('Memcache')) :
                            $m = new Memcached();
                            if ($m->addServer('localhost', 11211)) {
                                $memcached_running = TRUE;
                                $memcached_version = $m->getVersion();
                                $memcached_version = current($memcached_version);
                            }
                        endif;
                        ?>
                        <tr>
                            <td>Memcached running</td>
                            <td><i class="fa fa-<?php echo ($memcached_running ? 'check' : 'times'); ?>"></i></td>
                        </tr>
                        <tr>
                            <td>Memcached version</td>
                            <td><?php echo ($memcached_version ? $memcached_version : 'N/A'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>Node/NPM Stuff</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>Grunt</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td>Bower</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td>Yeoman</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td>Gulp</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td>Browsersync</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td>PM2</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>Laravel Stuff</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>Laravel Installer</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td>Laravel Envoy</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>

                        <tr>
                            <td>Blackfire Profiler</td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>MySQL Database Credentials</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>Hostname</td>
                            <td>localhost</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>root</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>root</td>
                        </tr>
                        <tr>
                            <td>Database</td>
                            <td>scotchbox</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>PostgreSQL Database Credentials</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>Hostname</td>
                            <td>localhost</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>root</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>root</td>
                        </tr>
                        <tr>
                            <td>Database</td>
                            <td>scotchbox</td>
                        </tr>
                        <tr>
                            <td>Port</td>
                            <td>5432</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>MongoDB Credentials</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>Hostname</td>
                            <td>localhost</td>
                        </tr>
                        <tr>
                            <td>Database</td>
                            <td>scotchbox</td>
                        </tr>
                        <tr>
                            <td>Port</td>
                            <td>27017</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>Mailcatcher</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>Enable it first with</td>
                            <td>mailcatcher --http-ip=0.0.0.0</td>
                        </tr>
                        <tr>
                            <td>URL</td>
                            <td>http://192.168.33.10:1080</td>
                        </tr>
                    </table>
                </div>
            </div>



            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>SSH Credentials</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <tr>
                            <td>SSH Host</td>
                            <td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
                        </tr>
                        <tr>
                            <td>SSH User</td>
                            <td>vagrant</td>
                        </tr>
                        <tr>
                            <td>SSH Password</td>
                            <td>vagrant</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-6 col-md-offset-3 wrap">
                    <h2>All PHP Modules</h2>
                    <table class="table table-responsive table-striped table-hover">
                        <?php
                        $modules = get_loaded_extensions();
                        asort($modules);
                        foreach ($modules as $extension) :
                        ?>
                        <tr>
                            <td><?php echo $extension; ?></td>
                            <td><i class="fa fa-check"></i></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>
    </article>

    <!-- Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>
