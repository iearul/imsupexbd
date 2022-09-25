<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counters extends CZ_Controller{

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
            $data['counters'] = $this->CoreZ_IT->get_where('counters',array('id' => 1))->row();
            $data['page_title'] = 'Counters';
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            $this->CoreZ_IT->_render_backend('index', $data);
        }
        function edit($id=NULL){
            $data['counters'] = $this->CoreZ_IT->get_where('counters',array('id' => 1))->row();
            if(empty($id))
            {
                redirect('counters');
            }
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('c1name', 'Counter 1 Name', 'required');
            $this->form_validation->set_rules('c1number', 'Counter 1 Number', 'required');
            $this->form_validation->set_rules('c2name', 'Counter 2 Name', 'required');
            $this->form_validation->set_rules('c2number', 'Counter 2 Number', 'required');
            $this->form_validation->set_rules('c3name', 'Counter 3 Name', 'required');
            $this->form_validation->set_rules('c3number', 'Counter 3 Number', 'required');
            $this->form_validation->set_rules('c3name', 'Counter 4 Name', 'required');
            $this->form_validation->set_rules('c4number', 'Counter 4 Number', 'required');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'title'     => $this->input->post('title'),
                    'c1name'     => $this->input->post('c1name'),
                    'c1number'     => $this->input->post('c1number'),
                    'c2name'     => $this->input->post('c2name'),
                    'c2number'     => $this->input->post('c2number'),
                    'c3name'     => $this->input->post('c3name'),
                    'c3number'     => $this->input->post('c3number'),
                    'c4name'     => $this->input->post('c4name'),
                    'c4number'     => $this->input->post('c4number')
                );
                
                $this->CoreZ_IT->update('counters',$values,array('id' => 1));
                $this->session->set_flashdata('message','Your Counters has been updated.');
                redirect('counters', 'refresh');
            }
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'Counters';
            $this->CoreZ_IT->_render_backend('counters/edit', $data);
        }   
}