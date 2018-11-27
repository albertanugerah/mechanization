
	<main role="main">
    <section class="jumbotron jumbotron-fluid text-center bg-dark">
        <div class="container">
        	<div class="uncover bg-primary" >
        	  <h1 class="display-6 text-white"></h1>                 		
        	</div>        
        </div>
    </section>
    <section id="form-filter" class=" navbar nav sticky-top fixed-top bg-light">
    	<form class="form-group container-fluid">    		
			
			  	 <div class="col my-1" >
			      <label for="selectCategory">Category</label>
			         <select name="nama_category" class="form-control custom-select" id="category" required="required">
             <option value="" data-rel="all"> Select Category</option>
              <?php foreach ($category as $nama_category) {
              	$nama = str_replace(' ','_',$nama_category['nama_category']);
                   echo  "<option class='fil-cat' data-rel= '$nama' value='".$nama_category['id_category']."'> ".$nama_category['nama_category']." </option>";
                  } ?>
            </select>
			    </div>
			   
			  	   <div class="col my-1">
			      <label for="selectBrand">Brand</label>
			      <select class="custom-select" id="brand" name="nama_brand">
			      	 <option value=""> Select brand</option>			       
			      </select>
			    </div>
			    <div class="col my-1">
			      <label for="selectSeries">Series</label>
			      <select class="custom-select" id="seri" name="nama_seri">
			      	<option value="">Select Seri</option>			     
			      </select>
			    </div>
			 <!--      <div class="col-3 " style="margin-top: 2.1rem;">
			  		<button class="btn btn-info" type="submit"> Search</button>
			    </div> -->
			    <div class="col my-1">
			    	<label>Search</label>
			    	<div class="input-group">
				      <input type="text" class="form-control" id="inlineFormInput" onclick="scrollWin()" placeholder="Search...">
				        <div class="input-group-append">
						    	<button class="btn btn-info" type="button">submit</button>
						  	</div>
			   		</div>
			    </div>			   
			</form>
    	 <div class="com my-1">
			    	  <?php foreach ($category as $nama_category) {
              	$nama = str_replace(' ','_',$nama_category['nama_category']);
                   echo  "<button class=' btn btn-sm-info fil-cat' data-rel= '$nama'>".$nama_category['nama_category']." </button>";
                  } ?>
			    </div>
    </section>
    <section id="album">
		 	<div class="bg-light">
	      <div class="container">
	        <div class="row">
	          	<!-- Buldozer -->
	          <?php foreach ($serie as $content):
	          	$nama1 = str_replace(' ','_',$content->nama_category);
	          	?>
		          <div class="col-md-3 scale-anm <?php echo $nama1; ?> All">
		            <div class="card mb-4 shadow-md">
		              <img class="card-img-top" src="<?php echo base_url($content->thumbnail);?>" alt="<?php echo $content->nama_category . ' '. $content->nama_brand . ' ' . $content->seri ?>" height="200">
		              <div class="card-body">
		                	<h6 class="card-title"><?php echo $content->nama_brand . ' ' . $content->seri  ?></h5>
				                <ul class="list-group list-group-flush">
												  <li class="list-group-item px-1" id="category"><span class="badge badge-info badge-pill px-2">Category</span> <?php echo $content->nama_category ?></li>
												  <li class="list-group-item px-1" id="brand"><span class="badge badge-info badge-pill px-3">Brand</span> <?php echo $content->nama_brand; ?></li>
												  <li class="list-group-item px-1" id="seri"><span class="badge badge-info badge-pill px-4">Seri</span> <?php echo $content->seri; ?></li>
											  </ul>
			                  <div class="d-flex justify-content-between align-items-center">
			                    <div class="btn-group">
			                      <button type="button" class="btn btn-sm btn-outline-info" aria-pressed="false" data-toggle="modal" data-target=".modal-<?php echo $content->seri ?>-modal-lg">Specifications</button>

			                      <button type="submit" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target=".gallery-<?php echo $content->seri; ?>-modal-lg">Gallery</button>

			                      <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target=".modal-lg-about-<?php echo $content->seri; ?>">About</button>
			                    </div>	
			                      	 <!-- Spec  -->
			                      	<div class="modal fade modal-<?php echo $content->seri ?>-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
															  <div class="modal-dialog modal-lg" style="margin: auto;">
															    <div class="modal-content">
															    	<div class="modal-header">
															        <h5 class="modal-title" id="spec"><?php echo $content->nama_category . ' '. $content->nama_brand . ' ' . $content->seri  ?></h5>
															        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
															          <span aria-hidden="true">&times;</span>
													        		</button>
													      		</div>
													      		<?php if(isset($content->spec)){ ?>
															     	<object type="application/pdf" data="<?php echo base_url($content->spec);?>" height="1200"></object>
															     <?php }else{ ?>
															   			<div class="text-center">
															   				<h5>Specification Unavailable</h5>
															   			</div>
															     <?php } ?>
															    </div>
																</div>
															</div>

															<!-- gallery  -->
															<div class="modal fade gallery-<?php echo $content->seri; ?>-modal-lg" tabindex="-2" role="dialog"															aria-labelledby="myLargeModalLabel" aria-hidden="true">
															  <div class="modal-dialog modal-lg" style="margin: auto;">
															    <div class="modal-content">
															    	<div class="modal-header">
															        <h5 class="modal-title" id="gallery">Gallery <?php echo $content->nama_category . ' '. $content->nama_brand . ' ' . $content->seri  ?></h5>
															        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
															          <span aria-hidden="true">&times;</span>
													        		</button>
													      		</div>
													      		<div class="modal-body">												      		
													      			<?php if(isset($gallery->path)){ ?>														    
															     			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
																					  <ol class="carousel-indicators">
																					    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
																					    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
																					    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
																					  </ol>
																					  <div class="carousel-inner">
																					    <div class="carousel-item active">
																					    	<?php foreach ($gallery as $img): ?>
																					      <img class="d-block w-100" src="<?php echo base_url($img->path); ?>" alt="">
																					      <?php endforeach ?>
																					    </div>																				 
																					  </div>
																					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
																					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
																					    <span class="sr-only">Previous</span>
																					  </a>
																					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
																					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
																					    <span class="sr-only">Next</span>
																					  </a>
																					</div>
															     <?php }else{ ?>
															   			<div class="text-center">
															   				<h5>Images Unavailable</h5>
															   			</div>
															     <?php } ?>
													      		</div>												      		
															    </div>
																</div>
															</div>	
																<!-- about  -->
															<div class="modal fade modal-lg-about-<?php echo $content->seri; ?>" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
															  <div class="modal-dialog modal-lg modal-dialog-centered" style="margin: auto;">
															    <div class="modal-content">
															    	<div class="modal-header">
															        <h5 class="modal-title" id="about">About <?php echo $content->nama_category . ' '. $content->nama_brand . ' ' . $content->seri  ?></h5>
															        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
															          <span aria-hidden="true">&times;</span>
													        		</button>
													      		</div>
													      		<div class="modal-body">
													      			<?php if(isset($content->kegunaan)){ ?>														    
															     	<p><?php echo $content->kegunaan; ?></p>
															     <?php }else{ ?>
															   			<div class="text-center">
															   				<h5>About Unavailable</h5>
															   			</div>
															     <?php } ?>
													      		</div>												      		
															    </div>
																</div>
															</div>	
			                	</div>
		              </div>
		            </div>
		          </div>
	          <?php endforeach ?>
	        
	        </div>
	      </div>
	    </div>
 		</section>
 		<section>
 			<nav aria-label="Page navigation example">
			  <ul class="pagination justify-content-center">
			    <li class="page-item disabled">
			      <a class="page-link" href="#" tabindex="-1">Previous</a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#">Next</a>
			    </li>
			  </ul>
			</nav>  	
 		</section>  
  