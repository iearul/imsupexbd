<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 Parallaxlogic Infotech.
         * @copyright   Tanveer Agmed Ivan
         * @version 	1.0.0
         * 
	 */
        function __construct()
	{
            if (!$this->ion_auth->logged_in())
            {
                    // redirect them to the login page
                    redirect('user/login', 'refresh');
            }
        }
        function index(){
            
            $data['clients'] = $this->CoreZ_IT->get('clients')->result();
            $data['page_title'] = 'Client';
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            $this->CoreZ_IT->_render_backend('index', $data);
        }
        function add(){
                $config['upload_path']      = './uploads/client/';
                $config['allowed_types']    = 'jpg|png';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('client')){
                    $upload_data = $this->upload->data();
                    $values['logo'] = $upload_data['file_name'];
                    $values['link'] = $this->input->post('link');
                    $this->CoreZ_IT->insert('clients', $values);
                    $this->session->set_flashdata('message','Slider successfully added.');
                    redirect('client', 'refresh');
                }
                $data['link'] = array(
					'name' => 'link',
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Add Client';
		$this->CoreZ_IT->_render_backend('add', $data);
        }
        function edit($id){
                $data['client'] = $this->CoreZ_IT->get_where('clients',array('id' => $id))->row();
                if(empty($data['client'])){
                    $this->session->set_flashdata('message_error', 'Client Not Exists.');
                    redirect('client', 'refresh');
                }
                $config['upload_path']      = './uploads/client/';
                $config['allowed_types']    = 'jpg|png';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('client')){
                    $upload_data = $this->upload->data();
                    $values['logo'] = $upload_data['file_name'];
                    $values['link'] = $this->input->post('link');
                    $this->CoreZ_IT->update('clients', $values, array('id' => $id));
                    $path_to_file = 'uploads/client/'.$data['client']->logo;
                    if(file_exists($path_to_file))unlink($path_to_file);
                    $this->session->set_flashdata('message','Client successfully updated!');
                    redirect('client', 'refresh');
                }
                $data['link'] = array(
					'name' => 'link',
                                        'value' => $data['client']->link,
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Edit Client';
		$this->CoreZ_IT->_render_backend('edit', $data);
        }
        function delete($id){
                $data['client'] = $this->CoreZ_IT->get_where('clients',array('id' => $id))->row();
                if(empty($data['client'])){
                    $this->session->set_flashdata('message_error', 'Client Not Exists.');
                    redirect('client', 'refresh');
                }
                $path_to_file = 'uploads/client/'.$data['client']->logo;
                if(file_exists($path_to_file))unlink($path_to_file);
                $this->CoreZ_IT->delete('clients',array('id' => $id));
                $this->session->set_flashdata('message','Client successfully deleted.');
                redirect('client', 'refresh');
               
        }
}

/* End of file home.php */
/* Location: pi/modules/fileupload/controllers/home.php */