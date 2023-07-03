<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6>Sanogo</h6>
                           <p><span class="online_animation"></span> En Ligne</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Admin</h4>
                  <ul class="list-unstyled components">
                  <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Accueil</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="dashboard.html">> <span>Default Dashboard</span></a>
                           </li>
                           <li>
                              <a href="media_gallery.html">> <span>Media Gallery</span></a>
                           </li>
                        </ul>
                     </li>
                     
                     <li>
                        <a href="#client" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Client</span></a>
                        <ul class="collapse list-unstyled" id="client">
                        <li><a href="client.php">> <span>Ajouter client</span></a></li>
                        <li><a href="client_list.php">> <span>Liste des client</span></a></li>
                        </ul>
                     </li>
                     
                     <li>
                        <a href="#voiture" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Voiture</span></a>
                        <ul class="collapse list-unstyled" id="voiture">
                        <li><a href="voiture.php">> <span>Ajouter voiture</span></a></li>
                        <li><a href="voiture_list.php">> <span>Liste des voiture</span></a></li>
                        </ul>
                     </li>

                     <li>
                        <a href="#vente" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Vente</span></a>
                        <ul class="collapse list-unstyled" id="vente">
                        <li><a href="vente.php">> <span>Vendre</span></a></li>
                        <li><a href="vente_list.php">> <span>Liste des vente</span></a></li>
                        </ul>
                     </li>

                     <li>
                        <a href="#location" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Location</span></a>
                        <ul class="collapse list-unstyled" id="location">
                        <li><a href="location.php">> <span>Ajouter location</span></a></li>
                        <li><a href="location_list.php">> <span>Liste des location</span></a></li>
                        </ul>
                     </li>

                     <li>
                        <a href="#payement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Payement</span></a>
                        <ul class="collapse list-unstyled" id="payement">
                        <li><a href="payement.php">> <span>Ajouter payement</span></a></li>
                        <li><a href="payement_list.php">> <span>Liste des payement</span></a></li>
                        </ul>
                     </li>
                     
                     
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.php"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">Sanogo</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.php">Mon Profile</a>
                                       <a class="dropdown-item" href="settings.php">Settings</a>
                                       <a class="dropdown-item" href="#"><span>Se Deconnexion</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               