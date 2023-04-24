<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dash-style.css">
    <title>AFR Management System</title>
</head>
<body>
<div class="user-profile" id="profMenu">
   <div class="user-profile-options">
        <img src="System/img/Default-prof.jpg" alt="Profile Picture">
              <div class="username-role">
                  <h3>Juan Dela Cruz
                  <p>Admin</p>
              </div>       
         <hr class="hr-line">
            <a href="#">
                   <span class="material-symbols-outlined">manage_accounts</span>
                  Edit Profile
               </a>
               <a href="#">
                <span class="material-symbols-outlined">settings</span>
                   Settings
                </a>
               <a href="login.php">
                <span class="material-symbols-outlined">logout</span>
                   Log out
               </a>
    </div>
</div>

<aside class="side-bar">
    <div class="logo">
    <img src="system/img/SVGLOG.svg" alt="Logo">
        <h3>Aqua Fusion</h3>
    </div>
    <div class="nav-items">
        <a href="dash.php">
            <i class="material-icons md-48">dashboard</i>
            Dashboard
        </a>                
        <a href="sales.php">
            <span class="material-icons">shopping_cart</span>
            Sales
        </a>
        <a href="reportsales.php">
            <span class="material-symbols-outlined">equalizer</span>
            Report sales
        </a>
    </div>
</aside>
    <section class="top-bar">
        <div class="profile">
            <img src="System/img/Default-prof.jpg" alt="Profile Picture" onclick="profClick()">
        <!-- user profile onclick function -->
            <script>
                let profMenu = document.getElementById("profMenu");
                function profClick(){
                    profMenu.classList.toggle("open-prof-menu");
                }
            </script>