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

    <div class="container">
        
        <div class="col-sm-12">
            <div class="thumbnail thumbnail-grand-profile">
              <div class="slider-wrapper">
                <div class="responisve-container">
                  <div class="slider">
                    <div class="fs_loader"></div>
                    <div class="slide" >
                      <img  src="/img/male.png"
                          data-position="98,0" data-in="right" data-step="1" data-delay="" data-out="fade">
                      <img    src="/img/female.png" 
                          data-position="90,200" data-step="1" data-in="left" data-delay="1000" data-out="fade">
                      <img    src="/img/earth.png" 
                          data-position="0, 450" data-step="2" data-in="fade" data-delay="" data-out="fade">
                    </div>
                    <div class="slide">
                      <img  src="/img/keymouse2.png"   
                          data-position="300,0" data-in="bottom" data-step="1"  data-out="fade">
                      <img    src="/img/cpu2.png" 
                          data-position="100,280" data-in="top" data-step="2"  data-out="fade">
                      <img  src="/img/monitor2.png"     
                          data-position="100,0" data-in="top" data-step="3" data-out="fade">
                      <img  src="/img/brainhand.png"     
                          data-position="100,650" data-in="fade" data-step="3" data-delay="1000" data-out="fade" >
                      <img  src="/img/test3.jpg"     
                          data-position="112,8" data-in="fade" data-step="4" data-out="fade" data-special="cycle" >
                      <img  src="/img/connect.png"     
                          data-position="100,500" data-in="fade" data-step="4" data-out="fade"   >
                      <img  src="/img/test4.jpg"     
                          data-position="112,8" data-in="fade" data-step="5" data-out="fade" data-special="cycle" >
                      <img  src="/img/earth2.png"     
                          data-position="50,700" data-in="fade" data-step="5" data-out="fade"  >    
                    </div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-pills nav-grand-profile">
                  <li role="presentation"><?php echo $this->Html->link('Information',['controller' => 'Information', 'action' => 'index', '_full' => true]); ?></li>
                  <li role="presentation"><?php echo $this->Html->link('Seo',['controller' => 'Seo', 'action' => 'index', '_full' => true]); ?></li>
                  <li role="presentation"><a href="#">Knowledge</a></li>
                  <li role="presentation"><a href="#">Share</a></li>
              </ul>
            </div>    
        </div>
        <?php echo $this->fetch('content'); ?>
      
      <!--#timeline-->
    </div><!--#container-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js">
    </script>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery.fractionslider.min.js') ?>
    <?= $this->Html->script('customall.js') ?>
    <?php 
        if (!empty($jsss)) {
            foreach ($jsss as $key => $value) {
                echo $this->Html->script($value);
            }
        }
    ?>
</body>
</html>
