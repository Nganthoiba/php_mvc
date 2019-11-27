<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Material Design Bootstrap</title>

    <!-- Font Awesome 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">-->
    <link href="MDB/css/font_awesome_4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap core CSS -->
    <link href="<?=Config::get('host')?>/root/assets/compiled.min.css" rel="stylesheet">
    <style>
    .documentation #animated-img {
        max-width: 300px;
    }
    </style>
    
</head>

<body class="fixed-sn mdb-skin-custom">
        <!--Double navigation-->
    <header>

        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed custom-scrollbar">

            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="#"><img src="https://mdbootstrap.com/wp-content/uploads/2017/01/mdb-transparent-1.png" class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-css3"></i> CSS<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=css/animations" class="waves-effect">Animations</a></li>
                                <li><a href="?page=css/colors" class="waves-effect">Colors</a></li>
                                <li><a href="?page=css/helpers" class="waves-effect">Helpers</a></li>
                                <li><a href="?page=css/masks" class="waves-effect">Masks</a></li>
                                <li><a href="?page=css/hover-effects" class="waves-effect">Hover effects</a></li>
                                <li><a href="?page=css/icons" class="waves-effect">Icons usage</a></li>
                                <li><a href="?page=css/icons-list" class="waves-effect">Icons list</a></li>
                                <li><a href="?page=css/layout" class="waves-effect">Grid</a></li>
                                <li><a href="?page=css/flexbox" class="waves-effect">Flexbox</a></li>
                                <li><a href="?page=css/page-layouts" class="waves-effect">Page layouts</a></li>
                                <li><a href="?page=css/skins" class="waves-effect">Skins</a></li>
                                <li><a href="?page=css/parallax" class="waves-effect">Parallax</a></li>
                                <li><a href="?page=css/media" class="waves-effect">Media</a></li>
                                <li><a href="?page=css/shadows" class="waves-effect">Shadows</a></li>
                                <li><a href="?page=css/tables" class="waves-effect">Tables</a></li>
                                <li><a href="?page=css/typography" class="waves-effect">Typography</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-cubes"></i> Components<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=components/buttons" class="waves-effect">Buttons</a></li>
                                <li><a href="?page=components/social-buttons" class="waves-effect">Social buttons</a></li>
                                <li><a href="?page=components/cards" class="waves-effect">Cards</a></li>
                                <li><a href="?page=components/ecommerce" class="waves-effect">E-commerce</a></li>
                                <li><a href="?page=components/blog" class="waves-effect">Blog</a></li>
                                <li><a href="?page=components/inputs" class="waves-effect">Inputs</a></li>
                                <li><a href="?page=components/forms" class="waves-effect">Forms</a></li>
                                <li><a href="?page=components/navbars" class="waves-effect">Navbars</a></li>
                                <li><a href="?page=components/dropdowns" class="waves-effect">Dropdowns</a></li>
                                <li><a href="?page=components/tags" class="waves-effect">Tags, Badges &#038; Labels</a></li>
                                <li><a href="?page=components/list-group" class="waves-effect">List group</a></li>
                                <li><a href="?page=components/panels" class="waves-effect">Panels</a></li>
                                <li><a href="?page=components/progress" class="waves-effect">Progress bars</a></li>
                                <li><a href="?page=components/tabs" class="waves-effect">Tabs &#038; Pills</a></li>
                                <li><a href="?page=components/pagination" class="waves-effect">Pagination</a></li>
                                <li><a href="?page=components/footers" class="waves-effect">Footers</a></li>
                                <li><a href="?page=components/miscellaneous" class="waves-effect">Miscellaneous</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-code"></i> JavaScript<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=javascript/alerts" class="waves-effect">Alerts</a></li>
                                <li><a href="?page=javascript/carousel" class="waves-effect">Carousels</a></li>
                                <li><a href="?page=javascript/material-select" class="waves-effect">Material select</a></li>
                                <li><a href="?page=javascript/date-picker" class="waves-effect">Date Picker</a></li>
                                <li><a href="?page=javascript/time-picker" class="waves-effect">Time Picker</a></li>
                                <li><a href="?page=javascript/light-box" class="waves-effect">Lightbox</a></li>
                                <li><a href="?page=javascript/sidenav" class="waves-effect">SideNav</a></li>
                                <li><a href="?page=javascript/charts" class="waves-effect">Charts</a></li>
                                <li><a href="?page=javascript/collapse" class="waves-effect">Collapse</a></li>
                                <li><a href="?page=javascript/modals" class="waves-effect">Modals</a></li>
                                <li><a href="?page=javascript/tooltips" class="waves-effect">Tooltips</a></li>
                                <li><a href="?page=javascript/popovers" class="waves-effect">Popovers</a></li>
                                <li><a href="?page=javascript/mobile" class="waves-effect">Mobile</a></li>
                                <li><a href="?page=javascript/scrollspy" class="waves-effect">ScrollSpy</a></li>
                                <li><a href="?page=javascript/sticky-content" class="waves-effect">StickyContent</a></li>
                                <li><a href="?page=javascript/smooth-scroll" class="waves-effect">SmoothScroll &#038; ScrollBar</a></li>
                                <li><a href="?page=javascript/waves-effect" class="waves-effect">Waves effect</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-th"></i> Sections<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=sections/intros" class="waves-effect">Intros</a></li>
                                <li><a href="?page=sections/blog" class="waves-effect">Blog</a></li>
                                <li><a href="?page=sections/magazine" class="waves-effect">Magazine</a></li>
                                <li><a href="?page=sections/ecommerce" class="waves-effect">E-commerce</a></li>
                                <li><a href="?page=sections/features" class="waves-effect">Features</a></li>
                                <li><a href="?page=sections/projects" class="waves-effect">Projects</a></li>
                                <li><a href="?page=sections/testimonials" class="waves-effect">Testimonials</a></li>
                                <li><a href="?page=sections/team" class="waves-effect">Team</a></li>
                                <li><a href="?page=sections/contacts" class="waves-effect">Contact</a></li>
                                <li><a href="?page=sections/social" class="waves-effect">Social</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header" href="https://mdbootstrap.com">MDB 4.3.0 Docs</a></li>
                </ul>
            </li>
            <!--/. Side navigation links -->

        </ul>
        <!--/. Sidebar navigation -->

        <!--Navbar-->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>MDBootstrap.com / 4.3.2</p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a href="https://mdbootstrap.com/support/" class="nav-link"><i class="fa fa-comments-o"></i> <span class="hidden-sm-down">Support</span></a>
                </li>
            </ul>
        </nav>
        <!--/.Navbar-->

    </header>
    <!--/Double navigation-->

    <!--Main layout-->
    <main>
      
        <div class="main-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!--Main column-->
                <div class="col-lg-10 col-md-12">
                    <?= $data['content'] ?>
                    <!--Documentation file-->
                </div>
                <!--/.Main column-->
                                                    
                <!-- Right Sidebar -->
                <div class="col-md-2">
                    <div id="scrollspy" class="sticky">
                        <ul class="nav nav-pills smooth-scroll flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#introduction">Introduction</a></li>
                            <li class="nav-item"><a class="nav-link" href="#examples">Examples</a></li>
                            <li class="nav-item"><a class="nav-link" href="#usage">Basic usage</a></li>
                            <li class="nav-item"><a class="nav-link" href="#customize-sidenav">Customize sidenav</a></li>
                            <li class="nav-item"><a class="nav-link" href="#advanced-usage">Advanced usage</a></li>                                     
                        </ul>
                    </div>
                </div>
                            <!--/. Right Sidebar -->
                                                <!-- Post column -->
                                                    <div class="col-md-10">
                                                        
                            </div>
                        </div>
                    </div>
             </div>
</main>
<!--/Main layout-->
    
    <!-- JQuery -->
    <script type="text/javascript" src="<?=Config::get('host')?>/root/assets/compiled.min.js"></script>
    
    <script>
        
        // SideNav init
        $(".button-collapse").sideNav();

        // Custom scrollbar init
        var el = document.querySelector('.custom-scrollbar');
        Ps.initialize(el);
        
        //Sticky
        $(function () {
            $(".sticky").sticky({
                topSpacing: 90
                , zIndex: 2
                , stopper: "#footer"
            });
        });
        
        //ScrollSpy
        $('body').scrollspy({
            target: '#scrollspy'
        })
    
    </script>
    
    
          
</body>

