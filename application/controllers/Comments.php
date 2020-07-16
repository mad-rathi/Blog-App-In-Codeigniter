<?php

    class Comments extends CI_Controller {

        public function create($post_id) {
            $slug = $this->input->post('slug');
            
            $data['post'] = $this->post_model->get_posts($slug);
            $data['categories'] = $this->category_model->get_categories();
            
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('posts/view', $data);
                $this->load->view('templates/footer');
            } else {
                $this->comment_model->create_comment($post_id);
                $this->session->set_flashdata('comment_created', 'Your Comment has been posted');
                redirect('posts/' . $slug);
            }
        }

    }

?>