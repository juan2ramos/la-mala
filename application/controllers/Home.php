<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $messageError;

    public function index()
    {
        $this->load->view('layouts/default', ['title' => 'La Mala Compañia', 'view' => 'form/index']);
    }

    public function post()
    {
        $this->load->model('users_model');
        $val = $this->validate();
        if ($val) {
            $this->insertForm($this->input->post());
            echo json_encode(['success' => true]);
        } else {
            if ($val) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'errors' => $this->messageError]);
            }
        }
    }

    function validate()
    {
        if ($this->input->post()) {
            $config = [
                ['field' => 'nombre', 'label' => 'nombre', 'rules' => 'required'],
                ['field' => 'mensaje', 'label' => 'mensaje', 'rules' => 'required'],

                ['field' => 'email', 'label' => 'email', 'rules' => 'required|valid_email|is_unique[users.email]'],
            ];
            $this->form_validation->set_message('required', '%s');
            $this->form_validation->set_message('valid_email', '%s');
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run()) {
                $this->messageError = validation_errors(' ', '**');
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

}
