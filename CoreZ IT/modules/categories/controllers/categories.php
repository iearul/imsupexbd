<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 CoreZ IT.
         * @author      Tanveer Agmed Ivan
         * @version 	1.0.1
         * 
	 */
        function __construct()
	{
		parent::__construct();
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
        }
        function all(){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $data['categories'] = $this->CoreZ_IT->get('categories')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'All Categories';
                $this->CoreZ_IT->_render_backend('all', $data);
        }
        function add(){
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            if ($this->form_validation->run() == true)
                {
                    $values = array(
                        'url'           => $this->CoreZ_IT->url_check($this->input->post('title'), 'categories'),
                        'title'         => $this->input->post('title'),
                        'type'          => $this->input->post('type'),
                        'status'        => 1
                    );
                    $url = $values['url'];
                    $this->CoreZ_IT->insert('categories', $values);
                    $this->session->set_flashdata('message', 'Category Successfully Added');
                    
                    echo '
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

                            </head>
                            <body>

                            <img id="upload" style="position: absolute;"  src="'.site_url().'uploads/loader-icons/128x128/Preloader_8.gif" alt="loading">
                            <script>
                                    var x = $(window).width();
                                    var y = $(window).height();
                                    $("#upload").css("left",(x)/2-32);
                                    $("#upload").css("top",(y/2)-32);
                            </script>
                            ';
                    $files = $_FILES['attached'];
                    $config['upload_path']      = './uploads/attached/';
                    $config['allowed_types']    = '*';
                    $config['max_size']         = '20480';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    $title = $this->input->post('attachedName');
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images']['name']= $files['name'][$key];
                        $_FILES['images']['type']= $files['type'][$key];
                        $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
                        $_FILES['images']['error']= $files['error'][$key];
                        $_FILES['images']['size']= $files['size'][$key];
                        if (!empty($title[$key]) && $this->upload->do_upload('images')) {
                            $file = $this->upload->data();
                            $values = array(
                                'url'           => $this->CoreZ_IT->url_check($title[$key], 'attached'),
                                'title'         => $title[$key],
                                'category_url'  => $url,
                                'file_ext'      => $file['file_ext'],
                                'file'          => $file['file_name']
                            );
                            $this->CoreZ_IT->insert('attached', $values);
                        } 
                    }
                    echo '  
                            <script language="javascript">
                                window.location = "'.site_url().'categories/all";
                            </script></body>
                            </html>';
                    
                }
                
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');

                $data['title'] = array(
                    'class' => 'form-control',
                    'name'  => 'title',
                    'type'  => 'text',
                );
                $data['attachedName'] = array(
                    'name'        => 'attachedName[]',
                    'class'       => 'form-control',
                    'placeholder' => 'File Title'
                );
                $data['page_title'] = 'Create Category';
                $this->CoreZ_IT->_render_backend('add', $data);
            
        }
        function edit($url){
            $data['category'] = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
                if(empty($data['category'])){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                    redirect('categories/all', 'refresh');
                }
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            if ($this->form_validation->run() == true)
                {
                    $values = array(
                        'title'         => $this->input->post('title'),
                        'type'          => $this->input->post('type'),
                        'status'        => 1
                    );
                    $this->CoreZ_IT->update('categories', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully Updated');
                    
                    echo '
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

                            </head>
                            <body>

                            <img id="upload" style="position: absolute;"  src="'.site_url().'uploads/loader-icons/128x128/Preloader_8.gif" alt="loading">
                            <script>
                                    var x = $(window).width();
                                    var y = $(window).height();
                                    $("#upload").css("left",(x)/2-32);
                                    $("#upload").css("top",(y/2)-32);
                            </script>
                            ';
                    $files = $_FILES['attached'];
                    $config['upload_path']      = './uploads/attached/';
                    $config['allowed_types']    = '*';
                    $config['max_size']         = '20480';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    $title = $this->input->post('attachedName');
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images']['name']= $files['name'][$key];
                        $_FILES['images']['type']= $files['type'][$key];
                        $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
                        $_FILES['images']['error']= $files['error'][$key];
                        $_FILES['images']['size']= $files['size'][$key];
                        if (!empty($title[$key]) && $this->upload->do_upload('images')) {
                            $file = $this->upload->data();
                            $values = array(
                                'url'           => $this->CoreZ_IT->url_check($title[$key], 'attached'),
                                'title'         => $title[$key],
                                'category_url'  => $url,
                                'file_ext'      => $file['file_ext'],
                                'file'          => $file['file_name']
                            );
                            $this->CoreZ_IT->insert('attached', $values);
                        } 
                    }
                    echo '  
                            <script language="javascript">
                                window.location = "'.site_url().'categories/all";
                            </script></body>
                            </html>';
                }
                
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');

                $data['title'] = array(
                    'class' => 'form-control',
                    'name'  => 'title',
                    'type'  => 'text',
                    'value' => $data['category']->title
                );
                $data['attachedName'] = array(
                    'name'        => 'attachedName[]',
                    'class'       => 'form-control',
                    'placeholder' => 'File Title'
                );
                $where = array(
                    'category_url'  => $url
                );
                $data['files'] = $this->CoreZ_IT->get_where('attached', $where)->result();
                $data['page_title'] = 'Create Category';
                $this->CoreZ_IT->_render_backend('edit', $data);
        }
        function activate($url = NULL){ 
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }      
                $product = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 1
                    );
                    $this->CoreZ_IT->update('categories', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully Activated.');
                }
                redirect('categories/all', 'refresh');
	}

	function deactivate($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
		$product = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 0
                    );
                    $this->CoreZ_IT->update('categories', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully De-activated.');
                }
                redirect('categories/all', 'refresh');
	}
        function delete($url){
                $data['categories'] = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
                if(empty($data['categories'])){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                    redirect('categories/all', 'refresh');
                }
                $this->CoreZ_IT->delete('categories',array('url' => $url));
                $this->session->set_flashdata('message','Category successfully deleted.');
                redirect('categories/all', 'refresh');
               
        }
}
