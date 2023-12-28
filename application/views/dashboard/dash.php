<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Dashboard</title>
  
  <link rel="stylesheet" href=" <?php echo base_url('asset/style/dashboard.css') ?>">
  <link rel="icon" href="<?php echo base_url('asset/img/logo.png') ?>" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&family=Pontano+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

</head>

<body>

  <nav>
    <p>VISIT<span>JOGJA</span></p>
    <ul>
        <li class="dash"><a href="<?php echo base_url('visit/dashboard') ?>">Kontrol</a></li>
        <li><a href="<?php echo base_url('visit/dashboard/wisata_dash_data') ?>">Wisata</a></li>
        <li><a href="<?php echo base_url('visit/dashboard/dash_wisata_user') ?>">Pengguna</a></li>
        <li><a href="<?php echo base_url('visit/dashboard/dash_wisata_admin') ?>">Admin</a></li>
        <li><a href="<?php echo base_url('visit/dashboard/dash_wisata_komen') ?>">Komentar</a></li>
        <li><a href="<?php echo base_url('visit/dashboard/dash_wisata_hubungi') ?>">Hubungi</a></li>
    </ul>
    <a class="button" href="<?=  base_url('visit/logout_admin') ?>">Keluar</a>
</nav>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('nav ul li a');

    const lastSelected = sessionStorage.getItem('lastSelected');
    if (lastSelected) {
        
        navItems.forEach(item => item.parentElement.classList.remove('dash'));
      
        document.querySelector(`a[href="${lastSelected}"]`).parentElement.classList.add('dash');
    }

    navItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            
          
            navItems.forEach(item => item.parentElement.classList.remove('dash'));
            
           
            this.parentElement.classList.add('dash');
            
            sessionStorage.setItem('lastSelected', this.getAttribute('href'));
            const targetUrl = this.getAttribute('href');
            

            setTimeout(() => {
                window.location.href = targetUrl;
            }, 100); 
        });
    });
});
</script>
