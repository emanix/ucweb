<?php if ($this->session->userdata('loggedin') == 1 && $this->session->userdata('user_role') == 'admin'){

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Unity Chorale | Admin Page</title>
    <!-- UCicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/unity_choralelogo.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/dist/css/themes/all-themes.css" rel="stylesheet" />

    <!-- Jquery Core Js 
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery/jquery.min.js"></script>-->

    <!-- Ckeditor 
    <script src="<?php echo base_url(); ?>assets/dist/plugins/ckeditor/ckeditor.js"></script>-->

    
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <img style="float: left; padding-right: 10px" src="<?php echo base_url(); ?>assets/images/unity_chorale_logo1.jpg" alt="Unity Chorale logo" />
                <a class="navbar-brand" href="#">UNITY CHORALE ADMINISTRATIVE PAGE</a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/dist/images/user.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('name'); ?></div>
                    <div class="email"><?php echo $this->session->userdata('username'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>Login/display_change_password"><i class="material-icons">lock</i>Change Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>Login/sign_out"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url(); ?>Admin">
                          <i class="material-icons">dashboard</i>
                          <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo base_url(); ?>Home">
                          <i class="material-icons">home</i>
                          <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                          <i class="material-icons">home</i>
                          <span>Manage Home Page</span>
                        </a>
                        <ul class="ml-menu">
                          <li>
                            <a href="<?php echo base_url(); ?>Admin/manage_banner"><i class="material-icons">wallpaper</i><span>Add banner</span></a>
                          </li>
                          <li>
                            <a href="<?php echo base_url(); ?>Admin/edit_banner"><i class="material-icons">view_list</i><span>View banner</span></a>
                          </li>
                          <li>
                            <a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">laptop</i><span>Manage content</span></a>
                            <ul class="ml-menu">
                              <li>
                                <a href="<?php echo base_url(); ?>Home/editWelcome"><i class="material-icons">create</i><span>Edit Welcome</span></a>
                              </li>
                              <li>
                                <a href="<?php echo base_url(); ?>Events/addEvents"><i class="material-icons">add_box</i><span>Add Events</span></a>
                              </li>
                              <li>
                                <a href="<?php echo base_url(); ?>Admin/addConnectsView"><i class="material-icons">add_box</i><span>Add Contacts</span></a>
                              </li>
                              <li>
                                <a href="<?php echo base_url(); ?>Events/viewEvents"><i class="material-icons">view_list</i><span>View Events</span></a>
                              </li>
                              <li>
                                <a href="<?php echo base_url(); ?>Home/getServices"><i class="material-icons">view_list</i><span>View Services</span></a>
                              </li>
                            </ul> 
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                          <i class="material-icons">laptop</i>
                          <span>Manage AboutUs Page</span>
                        </a>
                        <ul class="ml-menu">
                          <li>
                            <a href="<?php echo base_url(); ?>AboutUs/editAbout"><i class="material-icons">create</i><span>Edit AboutUs</span></a>
                          </li>
                          <li>
                            <a href="<?php echo base_url(); ?>AboutUs/view_team"><i class="material-icons">view_list</i><span>View Team</span></a>
                          </li>
                        </ul> 
                     </li>
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                          <i class="material-icons">laptop</i>
                          <span>Manage Gallery</span>
                        </a>
                        <ul class="ml-menu">
                          <li>
                            <a href="<?php echo base_url(); ?>Gallery/addPhotoView"><i class="material-icons">add_box</i><span>Add Photo</span></a>
                          </li>
                          <li>
                            <a href="<?php echo base_url(); ?>Gallery/viewGallery"><i class="material-icons">view_list</i><span>View Gallery</span></a>
                          </li>
                        </ul> 
                     </li>
                     <li>
                        <a href="<?php echo base_url(); ?>ContactUs/viewMessages">
                          <i class="material-icons">inbox</i>
                          <span>Messages<?php if($unread != ""){ ?><span class="bg-light-blue" style="color:white; padding: 5px"><?php echo $unread; } ?> Unread</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>SignUp/viewSignups">
                          <i class="material-icons">laptop</i>
                          <span>Manage Signups<?php if($signups != ""){ ?><span class="bg-light-green" style="color:white; padding: 5px"><?php echo $signups; } ?> New Signup</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                          <i class="material-icons">laptop</i>
                          <span>Manage Repertoire</span>
                        </a>
                        <ul class="ml-menu">
                          <li>
                            <a href="<?php echo base_url(); ?>Repertoire/addRepertoireView"><i class="material-icons">cloud_upload</i><span>Upload Musics</span></a>
                          </li>
                          <li>
                            <a href="<?php echo base_url(); ?>Repertoire/viewRepertoire"><i class="material-icons">view_list</i><span>View Repertoire</span></a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Admin/ViewMembers"><i class="material-icons">view_list</i><span>View Members</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                          <i class="material-icons">laptop</i>
                          <span>Manage Newsletters</span>
                        </a>
                        <ul class="ml-menu">
                          <li>
                            <a href="<?php echo base_url(); ?>Newsletter/addNewsletterView"><i class="material-icons">cloud_upload</i><span>Upload Newsletter</span></a>
                          </li>
                          <li>
                            <a href="<?php echo base_url(); ?>Newsletter/viewNewsletter"><i class="material-icons">view_list</i><span>View Newsletter</span></a>
                          </li>
                          <li>
                            <a href="<?php echo base_url(); ?>Newsletter/viewSubscriber"><i class="material-icons">view_list</i><span>View Subscriber</span></a>
                          </li>
                        </ul>
                    </li>       
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);"><i>emanixWEB Design</i></a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php $this->load->view($content_view); ?>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Input Mask Plugin Js--> 
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/dist/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/forms/editors.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/forms/advanced-form-elements.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/forms/basic-form-elements.js"></script>

    <!-- Ckeditor -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/ckeditor/ckeditor.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
</body>

</html>
<?php } elseif($this->session->userdata('loggedin') == 1 && $this->session->userdata('user_role') == 'pro'){

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Unity Chorale | Admin Page</title>
    <!-- UCicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/unity_choralelogo.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/dist/css/themes/all-themes.css" rel="stylesheet" />

    <!-- Jquery Core Js 
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery/jquery.min.js"></script>-->

    <!-- Ckeditor 
    <script src="<?php echo base_url(); ?>assets/dist/plugins/ckeditor/ckeditor.js"></script>-->

    
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <img style="float: left; padding-right: 10px" src="<?php echo base_url(); ?>assets/images/unity_chorale_logo1.jpg" alt="Unity Chorale logo" />
                <a class="navbar-brand" href="#">UNITY CHORALE ADMINISTRATIVE PAGE</a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/dist/images/user.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('name'); ?></div>
                    <div class="email"><?php echo $this->session->userdata('username'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>Login/display_change_password"><i class="material-icons">lock</i>Change Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>Login/sign_out"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url(); ?>Admin">
                          <i class="material-icons">dashboard</i>
                          <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo base_url(); ?>Home">
                          <i class="material-icons">home</i>
                          <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                          <i class="material-icons">laptop</i>
                          <span>Manage Newsletters</span>
                        </a>
                        <ul class="ml-menu">
                          <li>
                            <a href="<?php echo base_url(); ?>Newsletter/addNewsletterView"><i class="material-icons">cloud_upload</i><span>Upload Newsletter</span></a>
                          </li>
                          <li>
                            <a href="<?php echo base_url(); ?>Newsletter/viewNewsletter"><i class="material-icons">view_list</i><span>View Newsletter</span></a>
                          </li>
                          <!--<li>
                            <a href="<?php echo base_url(); ?>Newsletter/viewSubscriber"><i class="material-icons">view_list</i><span>View Subscriber</span></a>
                          </li>-->
                        </ul>
                    </li>       
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);"><i>emanixWEB Design</i></a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php $this->load->view($content_view); ?>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Input Mask Plugin Js--> 
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/dist/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/forms/editors.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/forms/advanced-form-elements.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/forms/basic-form-elements.js"></script>

    <!-- Ckeditor -->
    <script src="<?php echo base_url(); ?>assets/dist/plugins/ckeditor/ckeditor.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
</body>

</html>
<?php } else {redirect(base_url().'Login');}

