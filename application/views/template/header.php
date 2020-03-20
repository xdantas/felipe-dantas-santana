<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Felipe Dantas de Santana</title>
  <link href="<?php echo base_url();?>public/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/css/styles.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/css/mdb.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/css/animate.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/css/datatables.min.css" rel="stylesheet">
  <link rel="icon" href="<?php echo base_url();?>public/assets/summerlogo.png" type="image/x-icon">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>

  <?php if (isset($styles)) {
			foreach ($styles as $style_name) {
				$href = base_url() . "public/css/" . $style_name; ?>
				<link href="<?=$href?>" rel="stylesheet">
			<?php }
		} ?>
    
</head>
<body>

  <header>
      
  <nav class="navbar navbar-expand-lg navbar-dark nav-green fixed-top scrolling-navbar" style="padding-left: 10%; padding-right: 10%;">
      <a class="navbar-brand wow fadeIn" href="#"><img id="logo" src="<?php echo base_url();?>public/assets/summerlogo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav wow fadeIn">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Acomodações</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Contatos</a>
        </li>
        <div class="wpp-tel">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="https://wa.me/5513997597182"><img src="<?php echo base_url();?>/public/assets/tel-icon.png"
           style="max-height: 25px;" target="_blank">&nbsp&nbsp13 99759.CLIQUE</a>
        </li>
        </div>
      </ul>
    </div>
  </nav>
            
</header>