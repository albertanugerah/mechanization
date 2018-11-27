 <body class="bg-light">

    <div class="container">
      <?php if (isset($message)) { ?>
<h5 class="alert alert-success text-center">Data inserted successfully</h5>
<?php }
if($this->session->flashdata('error')){echo $this->session->flashdata('error');}
?>

      <div class="text-center"><h2>Mechanization</h2></div>
        <form class="needs-validation" method="post" enctype="multipart/form-data" action='<?php echo base_url('Welcome/insert_content') ?>' novalidate>
          <div class="row">
              <!-- category -->
            <div class="col-md-4 mb-3">
              <label for="category">Category Name</label>
                <select name="nama_category" class="form-control custom-select" id="category" required="required">
                  <option value=""> Select Category</option>
                  <?php foreach ($category as $category1=>$nama_category) {
                   echo  "<option value='".$nama_category['id_category']."'>".$nama_category['nama_category']." </option>";
                  } ?>
                </select>
                <div class="invalid-feedback">category name is required</div>
            </div>

              <!-- brand -->
            <div class="col-md-4 mb-3">
              <label for="brandLabel">Brand Name</label>
                <select class="form-control custom-select" id="brand" name="nama_brand" required="required">
                  <option value="">Select Brand</option>
                </select>
                <div class="invalid-feedback">Brand name is required.</div>
            </div>

            <!-- Serie -->
            <div class="col-md-4 mb-3">
              <label for="serie">Serie</label>
                <input type="text" class="form-control" id="serie" name="seri" value="" required="required">
                <div class="invalid-feedback">Serie is required</div>
            </div>

            <!-- Photo Thumbnail -->
            <div class="col-md-6 mb-3">
              <label for="exampleFormControlFile1">Photo Thumbnail</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar1" onChange="uploadURL1(this);" alt="upload" id="photo" accept="image/jpg,image/png, image/jpeg, image/gif" required="required">
                  <label class="custom-file-label" for="customFile" id="control1">Choose file</label>
                  <div class="invalid-feedback">Photo is required</div>
                </div>                  
                  <img class="img-thumbnail" id="gambar1"/>
                               
            </div>

            <!-- File Specification -->
            <div class="col-md-6 mb-3">
              <label for="exampleFormControlFile1">File Specification</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="spec1"  alt="upload" id="spec" accept="application/pdf" required="required">
                  <label class="custom-file-label" for="spesification" id="control1">Choose file</label>
                   <div class="invalid-feedback">Spesification is required</div>
                </div>                            
            </div>
            <!-- About -->

            <div class="col-md-12 mb-3">
              <label for="About">About</label>
                <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="5" ></textarea>
                  <div class="invalid-feedback">About is required</div> 
            </div>
            
     
           
              <!-- <div class="form-group col-md-6 mb-3">
                <label for="exampleFormControlFile1">Upload Gallery</label>
                    <?php for ($i=1; $i <= 5; $i++) :?>
                <div class="custom-file mb-1">
                  <input type="file" class="custom-file-input hehe" name="filefoto<?php echo $i;?>"  alt="upload" id="gallery">
                  <label class="custom-file-label" for="spesification" id="control1">Choose file</label>
                   <div class="invalid-feedback">
                  Spesification is required
                </div>
                </div>  
                <?php endfor;?>                          
              </div> -->
               
              
          
             <div class="col-md-3">
               <button class="btn btn-primary  btn-block" type="submit">Submit</button>
             </div>
       <!--       <div class="col-md-3">
               <button class="btn btn-warning  btn-block" type="submit">Edit</button>
             </div>
             <div class="col-md-3">
               <button class="btn btn-danger  btn-block" type="submit">Delete</button>
             </div> -->
            
          </form>
        </div>
      </div>
