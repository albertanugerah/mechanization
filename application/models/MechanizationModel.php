<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MechanizationModel extends CI_Model {

	public function category(){
		$this->db->where('nama_category <>','Flying Spreader');
		$this->db->where('nama_category <>','Flying Sprayer');
		$this->db->where('nama_category <>','Mini Excavator');
		$this->db->order_by('nama_category', 'asc');
		return $this->db->get('category');
	}

	public function brand(){
		$this->db->where('id_brand <>','10');
		$this->db->where('id_brand <>','12');
		$this->db->order_by('nama_brand', 'asc');
		return $this->db->get('brand');
	}

	public function serie(){
		$this->db->select('*','nama_category');
		$this->db->from('category');
		$this->db->join('seri', 'category.id_category = seri.category');
		$this->db->join('brand', 'category.id_category = brand.category AND seri.brand = brand.id_brand');
		return $this->db->get();
	}

	public function inventory(){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('brand', 'category.id_category = brand.category');
		$this->db->join('seri', 'brand.id_brand = seri.brand');
		return $this->db->get();
	}

	function getBrand($postData){
    $response = array();
 
    // Select record
    $this->db->select('id_brand,nama_brand');
    $this->db->where('category', $postData['category']);
    $q = $this->db->get('brand');
    $response = $q->result_array();

    return $response;
  }

  function getSeries($postData){
    $response = array();
 
    // Select record
    $this->db->select('*');
    $this->db->where('brand', $postData['brand']);
    $q = $this->db->get('seri');
    $response = $q->result_array();

    return $response;
  }

  public function insert_content($data){
  	$this->db->insert('seri', $data);

  }

  public function update_content($data,$id_seri){
  	$this->db->where('id_seri', $id_seri);
  	$this->db->update('seri', $data);
  }

  public function edit_content($id_seri){
  	$this->db->where('id_seri', $id_seri);
  	$this->db->delete('seri');
  }

  public function search($brand,$seri,$category){
  	$this->db->where('category', $category);
  	$this->db->where('brand', $brand);
  	$this->db->where('seri', $seri);
  	return $this->db->get('seri');  	
  }



}

/* End of file MechanizationModel.php */
/* Location: ./application/models/MechanizationModel.php */