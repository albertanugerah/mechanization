 <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="">Back to top</a>
        </p>
        <p>Mechanization Agronomy Specialist Divison &copy; Team Simastrack 2018</p>        
      </div>
 </footer>


  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/holder.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type='text/javascript'>
      // baseURL variable
      var baseURL= "<?php echo base_url();?>";

     
      $(document).ready(function(){
 
      // brand change
      $('#category').change(function(){
        var category = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?php echo base_url('index.php/Welcome/getBrand') ?>',
        method: 'post',
        data: {category: category},
        dataType: 'json',
        success: function(response){

          // Remove options      
         
          $('#seri').find('option').not(':first').remove();
          $('#brand').find('option').not(':first').remove();



          // Add options
          $.each(response,function(index,data){
             $('#brand').append('<option value="'+data['id_brand']+'">'+data['nama_brand']+'</option>');
          });
        }
     });
   });
      //seri change
      $('#brand').change(function(){
        var brand = $(this).val();
      // AJAX request
      $.ajax({
        url:'<?php echo base_url('index.php/Welcome/getSeries') ?>',
        method: 'post',
        data: {brand: brand},
        dataType: 'json',
        success: function(response){
                            
          // Remove options
          $('#seri').find('option').not(':first').remove();
          // Add options
          $.each(response,function(index,data){
          $('#seri').append('<option value="'+data['id_seri']+'">'+data['seri']+'</option>');
          });
        }
      });
    });

    $(function() {
    var selectedClass = "";
    $(".fil-cat").click(function(){ 
    selectedClass = $(this).attr("data-rel"); 
     $("#album").fadeTo(100, 0.1);
    $("#album  .col-md-3 ").not("."+selectedClass).fadeOut().removeClass('scale-anm');
    setTimeout(function() {
      $("."+selectedClass).fadeIn().addClass('scale-anm');
      $("#album").fadeTo(300, 1);
    }, 300); 
    
  });
});



 });
 </script>
  	<script type="text/javascript" charset="utf-8" async defer>
  	function scrollWin() {
    	window.scrollTo(0,340);
    	window.scrollTo('smooth');
		}
  	</script>
  	<script>
			$(document).ready(function(){
			  $("#inlineFormInput").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#album  .col-md-3").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
		</script>

<script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script  type="text/javascript" charset="utf-8" async defer>
        function uploadThumbnail(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
                reader.onload = function (e) {
                   $('#viewThumbnail')
                   .attr('src', e.target.result)
                   .width(auto)
                   .height(500);
          };
          reader.readAsDataURL(input.files[0]);
         }
    }
    function uploadURL1(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
                reader.onload = function (e) {
                   $('#gambar1')
                   .attr('src', e.target.result)
                   .width(100)
                   .height(100);
          };
          reader.readAsDataURL(input.files[0]);
         }
    }
    function Clear1() {
    document.getElementById("photo").value = "";
      $('#gambar1')
          .attr('src', '')
          .width(0)
          .height(0);
    }
      $('#photo').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
      })
      $('#spec').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
      })
      // $('.hehe').on('change',function(){
      //           //get the file name
      //           var fileName = $(this).val();
      //           //replace the "Choose a file" label
      //           $(this).next('.custom-file-label').html(fileName);
      // })
    </script>

</body>

</html>