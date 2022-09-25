<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 CoreZ IT.
         * @author      Tanveer Agmed Ivan
         * @version 	1.0.1
         * 
	 */
        function __construct()
	{
        }
        function category($url = NULL){
            if(empty($url))
            {
                redirect('');
            }
            $where = array('url' => $url, 'status' => 1);
            $data['category'] = $this->CoreZ_IT->get_where('categories',$where)->row();
            if(empty($data['category'])){
                $this->session->set_flashdata('message_error','Product Not Exists.');
                redirect('');
            }
            $where = array( 
                'category_url'  => $url,
                'status'        => 1
            );
            $data['products'] = $this->CoreZ_IT->get_where('products', $where)->result();
            $where = array( 
                'category_url'  => $url,
            );
            $data['attached'] = $this->CoreZ_IT->get_where('attached', $where)->result();
            $data['page_title'] = 'Products';
            $this->CoreZ_IT->_render_frontend('category', $data);
        }
        function all(){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $data['products'] = $this->CoreZ_IT->get('products')->result();
                $categories = $this->CoreZ_IT->get('categories')->result();
                $data['categories'] = array();
                foreach($categories as $category){
                    $data['categories'][$category->url] = $category;
                }
                $data['page_title'] = 'All Products';
                $this->CoreZ_IT->_render_backend('all', $data);
        }
        function add(){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('category', 'Category', 'required');
                $this->form_validation->set_rules('description', 'description', 'required');
                if ($this->form_validation->run() == true)
                {
                    $url = $this->CoreZ_IT->random_string(10);
                    $values = array(
                        'url'           => $this->CoreZ_IT->url_check($url, 'products'),
                        'name'          => $this->input->post('name'),
                        'description'   => $this->input->post('description'),
                        'category_url'  => $this->input->post('category'),
                        'featured'      => ($this->input->post('featured') == 'featured' ? 1 : 0 ),
                        'status'        => 1
                    );
                    $config['upload_path']      = './uploads/products/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = '2048';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('product')){
                        $upload_data = $this->upload->data();
                        $values['image'] = $upload_data['file_name'];
                        $this->CoreZ_IT->insert('products', $values);
                        $this->session->set_flashdata('message','Product Successfully Added.');
                        redirect('products/all');
                    }
                    $data['message_error'] = $this->upload->display_errors();
                }
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (!empty($data['message_error'])) ? $data['message_error'] : ((validation_errors()) ? validation_errors() : $this->session->flashdata('message_error'));
                
                $data['name'] = array(
                    'class' => 'form-control',
                    'name'  => 'name',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('name'),
                );
                $data['code'] = array(
                    'class' => 'form-control',
                    'name'  => 'code',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('code'),
                );
                $data['description'] = array(
                    'class' => 'form-control',
                    'name'  => 'description',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('description'),
                );
                $data['status_value'] = array(
                    'active'     => 'Active',
                    'In-Active'  => 'In-Active'
                );
                $data['status_name'] = 'status';
                $data['status_selected'] = $this->form_validation->set_value('status', 'active');
                $data['featured_value'] = array(
                    'featured'   => 'Featured',
                    'Un-featured'  => 'Un-Featured'
                );
                $data['featured_name'] = 'featured';
                $data['featured_selected'] = $this->form_validation->set_value('featured', 'featured');
                $data['dropdown_class'] = 'class="form-control"';
                $data['categories'] = $this->CoreZ_IT->get('categories')->result();
                $data['page_title'] = 'Add Product';
                $this->CoreZ_IT->_render_backend('add', $data);
        }
        function edit($url = NULL){
                if(empty($url))
                {
                    redirect('products/all');
                }
                $where = array('url' => $url);
                $data['product'] = $this->CoreZ_IT->get_where('products',$where)->row();
                if(empty($data['product'])){
                    $this->session->set_flashdata('message_error','Product Not Exists.');
                    redirect('products/all');
                }
                $this->form_validation->set_rules('name', 'Name', '');
                $this->form_validation->set_rules('category', 'Category', 'required');
                $this->form_validation->set_rules('description', 'description', 'required');
                if ($this->form_validation->run() == true)
                {
                    $values = array(
                        'url'           => $this->CoreZ_IT->url_check($this->input->post('name'), 'products'),
                        'name'          => $this->input->post('name'),
                        'description'   => $this->input->post('description'),
                        'category_url'      => $this->input->post('category'),
                        'featured'      => ($this->input->post('featured') == 'featured' ? 1 : 0 ),
                        'status'        => 1
                    );
                    $config['upload_path']      = './uploads/products/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = '2048';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('photo')){
                        $upload_data = $this->upload->data();
                        $values['image'] = $upload_data['file_name'];
                    }
                    $this->CoreZ_IT->update('products', $values, $where);
                    $this->session->set_flashdata('message','Product Successfully Added.');
                    redirect('products/all');
                }
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                
                $data['name'] = array(
                    'class' => 'form-control',
                    'name'  => 'name',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('name', $data['product']->name),
                );
                $data['description'] = array(
                    'class' => 'form-control',
                    'name'  => 'description',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('description', $data['product']->description),
                );
                $data['status_value'] = array(
                    'active'     => 'Active',
                    'In-Active'  => 'In-Active'
                );
                $data['status_name'] = 'status';
                $data['status_selected'] = $this->form_validation->set_value('status', ($data['product']->status == 1 ? 'active' : 'In-Active'));
                $data['featured_value'] = array(
                    'featured'   => 'Featured',
                    'Un-featured'  => 'Un-Featured'
                );
                $data['featured_name'] = 'featured';
                $data['featured_selected'] = $this->form_validation->set_value('featured', ($data['product']->featured == 1 ? 'featured' : 'Un-featured'));
                $data['dropdown_class'] = 'class="form-control"';
                $data['categories'] = $this->CoreZ_IT->get('categories')->result();
                $data['page_title'] = 'Edit Product';
                $this->CoreZ_IT->_render_backend('edit', $data);
        }
        function activate($url = NULL){ 
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }      
                $product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 1
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully Activated.');
                }
                redirect('products/all', 'refresh');
	}

	function deactivate($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
		$product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 0
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully De-activated.');
                }
                redirect('products/all', 'refresh');
	}
        function featured($url = NULL){ 
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }      
                $product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                }else{
                    $values = array(
                        'featured'  => 1
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Product Successfully Activated.');
                }
                redirect('products/all', 'refresh');
	}

	function un_featured($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
		$product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                }else{
                    $values = array(
                        'featured'  => 0
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Product Successfully De-activated.');
                }
                redirect('products/all', 'refresh');
	}
        function delete($url){
                $data['products'] = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
                if(empty($data['products'])){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                    redirect('products/all', 'refresh');
                }
                $path_to_file = 'uploads/products/'.$data['products']->image;
                if(file_exists($path_to_file))unlink($path_to_file);
                $this->CoreZ_IT->delete('products',array('url' => $url));
                $this->session->set_flashdata('message','Product successfully deleted.');
                redirect('products/all', 'refresh');
               
        }
}
