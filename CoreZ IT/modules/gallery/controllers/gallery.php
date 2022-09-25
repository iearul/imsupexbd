<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 Parallaxlogic Infotech.
         * @copyright   Tanveer Agmed Ivan
         * @version 	1.0.0
         * 
	 */
        function __construct()
	{
		
        }
        function index(){
            $data['page_title'] = 'Gallery';
            $data['galleries'] = $this->CoreZ_IT->get('gallery')->result();
            $this->CoreZ_IT->_render_frontend('index', $data);
        }
        function all(){
                if (!$this->ion_auth->logged_in())
                {
                        // redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $data['galleries'] = $this->CoreZ_IT->get('gallery')->result();
                $data['page_title'] = 'Gallery';
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
                $this->CoreZ_IT->_render_backend('all', $data);
        }
        function add(){
                if (!$this->ion_auth->logged_in())
                {
                        // redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $config['upload_path']      = './uploads/gallery/';
                $config['allowed_types']    = 'jpg|png';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gallery')){
                    $upload_data = $this->upload->data();
                    $values['name'] = $upload_data['file_name'];
                    $values['title'] = $this->input->post('title');
                    $values['description'] = $this->input->post('description');
                    $this->CoreZ_IT->insert('gallery', $values);
                    $this->session->set_flashdata('message','Gallery successfully added.');
                    redirect('gallery/all', 'refresh');
                }
                $data['title'] = array(
					'name' => 'title',
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Add Gallery';
		$this->CoreZ_IT->_render_backend('add', $data);
        }
        function edit($id){
                if (!$this->ion_auth->logged_in())
                {
                        // redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $data['gallery'] = $this->CoreZ_IT->get_where('gallery',array('id' => $id))->row();
                if(empty($data['gallery'])){
                    $this->session->set_flashdata('message_error', 'Gallery Not Exists.');
                    redirect('gallery/all', 'refresh');
                }
                $config['upload_path']      = './uploads/gallery/';
                $config['allowed_types']    = 'jpg|png';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gallery')){
                    $upload_data = $this->upload->data();
                    $values['name'] = $upload_data['file_name'];
                    $values['title'] = $this->input->post('title');
                    $values['description'] = $this->input->post('description');
                    $this->CoreZ_IT->update('gallery', $values, array('id' => $id));
                    $path_to_file = 'uploads/gallery/'.$data['gallery']->name;
                    if(file_exists($path_to_file))unlink($path_to_file);
                    $this->session->set_flashdata('message','Gallery successfully updated!');
                    redirect('gallery/all', 'refresh');
                }
                $data['title'] = array(
					'name' => 'title',
                                        'value' => $data['gallery']->title,
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Edit Gallery';
		$this->CoreZ_IT->_render_backend('edit', $data);
        }
        function delete($id){
                if (!$this->ion_auth->logged_in())
                {
                        // redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $data['gallery'] = $this->CoreZ_IT->get_where('gallery',array('id' => $id))->row();
                if(empty($data['gallery'])){
                    $this->session->set_flashdata('message_error', 'Gallery Not Exists.');
                    redirect('gallery/all', 'refresh');
                }
                $path_to_file = 'uploads/gallery/'.$data['gallery']->name;
                if(file_exists($path_to_file))unlink($path_to_file);
                $this->CoreZ_IT->delete('gallery',array('id' => $id));
                $this->session->set_flashdata('message','Gallery successfully deleted.');
                redirect('gallery/all', 'refresh');
               
        }
        
}

/* End of file home.php */
/* Location: pi/modules/fileupload/controllers/home.php */