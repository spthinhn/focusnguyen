<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="focus nguyen, thiet ke website, hosting gia re, seo website gia re
    ">
    <meta name="description" content="Focus Nguyễn. Thiết kế website chuyên nghiệp. Cung cấp hosting giá rẻ, hosting chất lượng. Seo website chuyên nghiệp và uy tín.">
    <meta property="og:title" content="Focus Nguyễn developer"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://focusnguyen.com"/>
    <meta property="og:image" content="https://focusnguyen.com/img/avatar.jpg"/>
    <meta property="og:description" content="Focus Nguyễn. Thiết kế website chuyên nghiệp. Cung cấp hosting giá rẻ, hosting chất lượng. Seo website chuyên nghiệp và uy tín." />
    <meta name="twitter:card" content="Focus Nguyen" />
    <meta name="twitter:site" content="https://focusnguyen.com" />
    <meta name="twitter:title" content="Focus Nguyễn developer" />
    <meta name="twitter:description" content="Focus Nguyễn. Thiết kế website chuyên nghiệp. Cung cấp hosting giá rẻ, hosting chất lượng. Seo website chuyên nghiệp và uy tín."/>
    <meta name="twitter:image" content="https://focusnguyen.com/img/avatar.jpg"/>
    <link rel="canonical" href="https://focusnguyen.com">
    <title>
        Focus Nguyen
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->css('fractionslider.css') ?>
    <?= $this->Html->css('styleWow.css') ?>
    <?php 
        if (!empty($csss)) {
            foreach ($csss as $key => $value) {
                echo $this->Html->css($value);
            }
        }
    ?>
</head>
<body class="home">
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand icon-brand fa fa-facebook-square" href=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <div class="search">
                <input type="text" class="form-control" placeholder="Search peoples, places and more">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#" class="fa fa-user" alt="resquest"></a></li>
            <li><a href="#" class="fa fa-comments" alt="inbox"></a></li>
            <li><a href="#" class="fa fa-bell" alt="notifications"></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Groups</a></li>
                <li><a href="#">Pages</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Configuration</a></li>
                <li><a href="#">Logout</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Help</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <nav class="social-link">
      <a href="https://www.facebook.com/focus.nguyen"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
      <a href="https://twitter.com/FocusNguyen"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
      <a href="https://plus.google.com/u/0/113048850438278550293"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
      <a href="mailto:info@focusnguyen.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
    </nav>
    <div class="container">
        <div class="col-sm-8">
          <div class="tvbackground">
            <img src="/img/tv2.png" alt="tv2" width="100%">
            <div class="sceen">
              <div id="wowslider-container1">
                <div class="ws_images">
                  <ul>
                    <li><img src="/img/a1.jpg" alt="a1" title="a1" id="wows1_0"/></li>
                    <li><img src="/img/a2.jpg" alt="a2" title="a2" id="wows1_1"/></li>
                    <li><img src="/img/a3.jpg" alt="a3" title="a3" id="wows1_2"/></li>
                    <li><img src="/img/a4.jpg" alt="a4" title="a4" id="wows1_3"/></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
            <div class="thumbnail thumbnail-grand-profile">
              
              <ul class="nav nav-pills nav-grand-profile">
                  <li role="presentation"><?php echo $this->Html->link('Seo',['controller' => 'Seo', 'action' => 'index', '_full' => true]); ?></li>
              </ul>
            </div>    
        </div>
        <?php echo $this->fetch('content'); ?>
      
      <!--#timeline-->
    </div><!--#container-->
    
      <footer class="footer" style="display:table;">
        <div class="container" style="display: table-cell; vertical-align: middle;">
          @2016 by Focus Nguyen developer.
        </div>
      </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js">
    </script>

    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery.fractionslider.min.js') ?>
    <?= $this->Html->script('customall.js') ?>
    <?= $this->Html->script('wowslider.js') ?>
    <?= $this->Html->script('script.js') ?>
    <?php 
        if (!empty($jsss)) {
            foreach ($jsss as $key => $value) {
                echo $this->Html->script($value);
            }
        }
    ?>
</body>
</html>
