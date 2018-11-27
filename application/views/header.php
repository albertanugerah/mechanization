<!DOCTYPE html>
<html>
<head>
	<title>Mechanization</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Albert Anugerah Putra Siregar">
    <link rel="icon" href="<?php echo base_url(); ?>assets/css/img/Logo.ico">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" >    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" >
     <link href="<?php echo base_url(); ?>assets/css/album.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/open-iconic-bootstrap.css" rel="stylesheet" type="text/css">
     <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <style type="text/css" media="screen">
     	.scale-anm
     	{
  			transform: scale(1);
		}
     </style>
     <script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
		

	</script>
	<style type="text/css" media="screen">
		.container {
    	overflow: hidden;
    }

		.filterDiv {
	    float: left;
	    background-color: #2196F3;
	    color: #ffffff;
	    width: 100px;
	    line-height: 100px;
	    text-align: center;
	    margin: 2px;
	    display: none; /* Hidden by default */
		}

		/* The "show" class is added to the filtered elements */
		.show {
		  display: block;
		}
		img{
			height: 262;
		}
	</style>

<body>
	<header class="navbar navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url(); ?>assets/css/img/Logo.png_64x64.png" width="32" height="32" alt="">
   			<span class="navbar-text align-middle h6"><b>Mechanization</b><br/>
   		AGRONOMY SPECIALIST DIVISION</span>       
  	</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse " id="">
			<span class="navbar-text mx-auto h3 text-white"> HEAVY EQUIPMENT INVENTORY</span>
			<ul class="navbar-nav navbar ml-0">
				
				<li class="nav-item"><a class="nav-link" href="#">SMAWEB</a></li>
				<!-- <div class="dropdown show">
								<li class="nav-item active"><a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarCategory" href="#">Catergory <span class="sr-only">(current)</span></a>
				    <div class="dropdown-menu" aria-labelledby="navbarCategory">
				    	<?php foreach ($category as $nama_category) :?>				    		
				      		<a class="dropdown-item" href="#album" onclick="filterSelection('all')"><?php echo $nama_category->nama_category; ?></a>
				    	<?php endforeach ?>
				      
		
				     </div>
				   </li>
				</div> -->
	<!-- 			<div class="dropdown show">
				  <li class="nav-item active"><a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarDropdown" href="#">Brand</a>
				    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				      <?php foreach ($brand as $nama_brand) :?>				    		
				      		<a class="dropdown-item" href="#album" onclick="filterSelection('<?php echo $nama_brand->nama_brand; ?>')"><?php echo $nama_brand->nama_brand; ?></a>
				    	<?php endforeach ?>
						</div>
				      </li>
				     </div> -->
				     <!-- <div class="dropdown show">
				   <li class="nav-item active"><a class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarDropdown" href="#">Seri</a>
				    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				      <?php foreach ($serie as $nama_serie) :?>				    		
				      		<a class="dropdown-item" href="#album" onclick="filterSelection('<?php echo $nama_serie->seri; ?>')"><?php echo $nama_serie->seri; ?></a>
				    	<?php endforeach ?>
						</div>
				       </li>
				   </div> -->
				 <li class="nav-item dropdown"><a class="nav-link" href="#">GALLERY</a></li>
				 <!-- <li class="nav-item dropdown"><a class="nav-link" href="<?php echo base_url('Welcome/new_content') ?>">Add New Equipment</a></li> -->	  
			</ul>			  
			
			 	<a href="<?php echo base_url('Welcome/new_content') ?>">
				 <button  class="btn btn-outline-info my-2 my-sm-0" type="submit">Add New Equipment</button></a>
		
				  
		</div>
	</header>