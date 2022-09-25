<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CZ_Controller{

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
        function index(){
            $data['teams'] = $this->CoreZ_IT->get('teams')->result();
            $data['page_title'] = 'About';
            $this->CoreZ_IT->_render_frontend('index', $data);
        }
        function edit(){
            $this->form_validation->set_rules('introduction', 'Introduction', 'required');
            $this->form_validation->set_rules('mission', 'Mission', 'required');
            $this->form_validation->set_rules('vision', 'Vision', 'required');
            $this->form_validation->set_rules('objective', 'Objective', 'required');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'introduction'  => $this->input->post('introduction'),
                    'mission'       => $this->input->post('mission'),
                    'vision'        => $this->input->post('vision'),
                    'objective'     => $this->input->post('objective')
                );
                
                $where['id'] = 1;
                $this->CoreZ_IT->update('site',$values,$where);
                $this->session->set_flashdata('message','Your Settings has been updated.');
                redirect('about/edit', 'refresh');
            }
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'About Us';
            $this->CoreZ_IT->_render_backend('about/edit', $data);
        }   
}