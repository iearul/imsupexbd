<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CZ_Controller{

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
        function all(){
            
            $data['teams'] = $this->CoreZ_IT->get('teams')->result();
            $data['page_title'] = 'Management Team';
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            $this->CoreZ_IT->_render_backend('all', $data);
        }
        function add(){
                $this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
                $this->form_validation->set_rules('detail', 'Detail', 'required');
                if($this->form_validation->run() == true){
                    $config['upload_path']      = './uploads/gallery/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('team')){
                        $upload_data = $this->upload->data();
                        $values['photo'] = $upload_data['file_name'];
                    }
                    $values['name'] = $this->input->post('name');
                    $values['designation'] = $this->input->post('designation');
                    $values['detail'] = $this->input->post('detail');
                    $this->CoreZ_IT->insert('teams', $values);
                    $this->session->set_flashdata('message','Management Team successfully updated!');
                       redirect('team/all', 'refresh');
                }
                $data['name'] = array(
					'name' => 'name',
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['designation'] = array(
					'name' => 'designation',
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Add New Management Team';
		$this->CoreZ_IT->_render_backend('add', $data);
        }
        function edit($id){
                $data['team'] = $this->CoreZ_IT->get_where('teams',array('id' => $id))->row();
                if(empty($data['team'])){
                    $this->session->set_flashdata('message_error', 'Management Team Not Exists.');
                    redirect('team/all', 'refresh');
                }
                $this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required');
                $this->form_validation->set_rules('detail', 'Detail', 'required');
                if($this->form_validation->run() == true){
                    $config['upload_path']      = './uploads/gallery/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('team')){
                        $upload_data = $this->upload->data();
                        $values['photo'] = $upload_data['file_name'];
                        $path_to_file = 'uploads/gallery/'.$data['team']->photo;
                        if(file_exists($path_to_file))unlink($path_to_file);
                    }
                    $values['name'] = $this->input->post('name');
                    $values['designation'] = $this->input->post('designation');
                    $values['detail'] = $this->input->post('detail');
                    $this->CoreZ_IT->update('teams', $values, array('id' => $id));
                    $this->session->set_flashdata('message','Management Team successfully updated!');
                       redirect('team/all', 'refresh');
                }
                $data['name'] = array(
					'name' => 'name',
                                        'value' => $data['team']->name,
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['designation'] = array(
					'name' => 'designation',
                                        'value' => $data['team']->designation,
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Edit Management Team';
		$this->CoreZ_IT->_render_backend('edit', $data);
        }
        function delete($id){
                $data['team'] = $this->CoreZ_IT->get_where('teams',array('id' => $id))->row();
                if(empty($data['team'])){
                    $this->session->set_flashdata('message_error', 'No member Exists.');
                    redirect('team', 'refresh');
                }
                $path_to_file = 'uploads/gallery/'.$data['team']->photo;
                if(file_exists($path_to_file))unlink($path_to_file);
                $this->CoreZ_IT->delete('teams',array('id' => $id));
                $this->session->set_flashdata('message','Team member successfully deleted.');
                redirect('team/all', 'refresh');
               
        }
}


/* End of file home.php */
/* Location: pi/modules/fileupload/controllers/home.php */