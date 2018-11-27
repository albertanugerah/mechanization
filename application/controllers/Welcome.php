<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('MechanizationModel'); 
    }
	public function index()
	{
		// $data['get_series']		= $this->MechanizationModel->getSeries($postSeries)->result_array();
		// $data['get_brand'] 		= $this->MechanizationModel->getBrand($postBrand)->result_array();
		$data['category'] 		= $this->MechanizationModel->category()->result_array();
		$data['brand'] 			= $this->MechanizationModel->brand()->result();
		$data['serie'] 			=  $this->MechanizationModel->serie()->result();
		$data['serie_row'] 		= $this->MechanizationModel->serie()->row();
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
	public function search(){
		$brand 		= $this->input->post('nama_brand');
		$category 	= $this->input->post('nama_category');
		$seri 		= $this->input->post('nama_seri');

		$data['search'] 		= $this->MechanizationModel->search($brand,$category,$seri)->result();
		$data['category'] 		= $this->MechanizationModel->category()->result_array();
		$data['brand'] 			= $this->MechanizationModel->brand()->result();
		$data['serie'] 			=  $this->MechanizationModel->serie()->result();
		$data['serie_row'] 		= $this->MechanizationModel->serie()->row();
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}


  public function getBrand(){ 
    // POST data 
    $postData = $this->input->post();
    
    // load model 
    $this->load->model('MechanizationModel');
    
    // get data 
    $data = $this->MechanizationModel->getBrand($postData);
    echo json_encode($data); 
  }

	public function getSeries(){
		//POST data
		$postData = $this->input->post();
		 $this->load->model('MechanizationModel');

		//GET data
		$data = $this->MechanizationModel->getSeries($postData);
		echo json_encode($data);
	}

	public function getImage($id){
			$id = $this->input->post('id');
			$data['gallery'] = $this->MechanizationModel->gallery($id)->result();
			$this->load->view('home',$data);
	}

	public function new_content(){
		$data['category'] = $this->MechanizationModel->category()->result_array();
		$this->load->view('header');
		$this->load->view('new_content',$data);
		$this->load->view('footer');
	}

	public function insert_content(){
	   
		$this->form_validation->set_error_delimiters('<div class="alert alert-success">', '</div>');
		$this->form_validation->set_rules('nama_category', 'Category', 'required');
		$this->form_validation->set_rules('nama_brand', 'Brand', 'required');
		$this->form_validation->set_rules('seri', 'Serie', 'required');

		
		
		if($this->form_validation->run() == FALSE) {
			$data['category'] = $this->MechanizationModel->category()->result_array();
			$data['message'] = 'Data Corrupted';
			$this->load->view('header');
			$this->load->view('new_content',$data);
			$this->load->view('footer');
		} else {
			//thumbnail
		$config_image['upload_path']   				= '../Mechanization/assets/thumbnail';
		$config_image['allowed_types'] 				= 'gif|jpg|png|jpeg|';
		$config_image['max_size']         		= 2048;
		$config_image['max_width']            = 1024;
		$config_image['max_height']           = 768;
    		
		$this->load->library('upload', $config_image);
		$this->upload->initialize($config_image);

		if ($this->upload->do_upload('gambar1')){
			$path_image = 'assets/thumbnail';
       $data = $this->upload->data();
        $picture =  $path_image.'/'.$data['file_name'];
      
    }
    else{
          $error = array('error' => $this->upload->display_errors('<div class="alert alert-danger text-center">', '</div>'));
    			$this->session->set_flashdata('error',$error['error']);
    			redirect('Welcome/new_content','refresh');
    }

    $config_spec['upload_path']   				= '../Mechanization/assets/spec';
		$config_spec['allowed_types'] 				= 'pdf';
		$config_spec['max_size']         		= 0;
		$this->load->library('upload', $config_spec);
		$this->upload->initialize($config_spec);

    if ($this->upload->do_upload('spec1')){
       $path_spec = 'assets/spec';
       $data = $this->upload->data();
       $spec =  $path_spec.'/'.$data['file_name'];
      
    }
    else{
          $error = array('error' => $this->upload->display_errors('<div class="alert alert-warning text-center">', '</div>'));
    			$this->session->set_flashdata('error',$error['error']);
    			redirect('Welcome/new_content','refresh');
    }



		$data =  array(	'category' =>$this->input->post('nama_category') ,
						'brand' 	 	=>	$this->input->post('nama_brand') ,
						'seri'		 	=> $this->input->post('seri'),
						'thumbnail' => $picture,
						'spec'			=> $spec,
						'kegunaan'			=>	$this->input->post('about')
						 );
		$this->MechanizationModel->insert_content($data);
		$data['category'] = $this->MechanizationModel->category()->result_array();
		$data['message'] = 'Data Inserted Successfully';		
		$this->load->view('header');
		$this->load->view('new_content',$data);
		$this->load->view('footer');
		
	}
}

}
