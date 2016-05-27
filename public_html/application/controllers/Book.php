<?php

class Book extends CI_Controller {
	public function index() {
		$data = array();

		$this->load->model('books_model');
		$this->books_model->create_book_table();

		$data['books'] = $this->books_model->get_all_books();
		$data['message'] = $this->session->flashdata('msg');

		$this->load->view('header');
		$this->load->view('books-index', $data);
		$this->load->view('footer');

	}

	public function book_add() {

		$this->load->helper(array('url', 'form', 'date'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Book title', 'required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('price', 'Price', 'greater_than[0]');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('review', 'Review', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		/// Image manipulation
		$config = array(
			'upload_path' => './uploads/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 5000,
			'max_width' => 1500,
		);
		$this->load->library('upload', $config);

		if($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('books-add');
			$this->load->view('footer');
		} else {
			if($this->upload->do_upload('cover')) {
				$time = date('Y-m-d H:i:s');
				$image = $this->upload->data();
				$data = array(
					'ISBN' => $this->input->post('isbn'),
					'title' => $this->input->post('title'),
					'price' => $this->input->post('price'),
					'cover' => $image['file_name'],
					'author' => $this->input->post('author'),
					'review' => $this->input->post('review'),
					'created' => $time
				);
				$result = $this->input->post();
				$this->load->model('books_model');
				$this->books_model->save_book($data);
				$this->books_model->img_create_thumb($image['file_name']);

				$this->session->set_flashdata('msg', 'Book was saved successfully');
				$this->session->keep_flashdata('msg');

				$data['books'] = $this->books_model->get_all_books();

				redirect('/', 'auto');

			} else {
				$this->upload->display_errors();
			}
		}
	}
	public function edit_book($id) {
		
		$data = array();
		$this->load->model('books_model');
		$data['book'] = $this->books_model->load_book($id)[0];

		$this->load->helper(array('url', 'form', 'date'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Book title', 'required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('price', 'Price', 'greater_than[0]');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('review', 'Review', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		/// Image manipulation
		$config = array(
			'upload_path' => './uploads/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 5000,
			'max_width' => 1500,
		);
		$this->load->library('upload', $config);

		if($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('book-edit', $data);
			$this->load->view('footer');
		} else {
			$image = "";
			if($this->upload->do_upload('cover')) {
				$upload = $this->upload->data();
				$image = $upload['file_name'];
				$this->books_model->img_create_thumb($image);
			} else {
				$image = $data['book']->cover;
			}
			$data = array(
				'id' => $data['book']->id,
				'ISBN' => $this->input->post('isbn'),
				'title' => $this->input->post('title'),
				'price' => $this->input->post('price'),
				'cover' => $image,
				'author' => $this->input->post('author'),
				'review' => $this->input->post('review')
			);
			$result = $this->input->post();
			$this->books_model->update_book($data);
			$this->session->set_flashdata('msg', 'Book was edited successfully');
			$this->session->keep_flashdata('msg');

			$data['books'] = $this->books_model->get_all_books();

			redirect('/', 'auto');
		}
	}
	public function remove_book($id) {
		$data = array();
		$this->load->model('books_model');

		$this->books_model->remove_book($id);

		$this->session->set_flashdata('msg', 'Book was removed successfully');
		$this->session->keep_flashdata('msg');

		$data['books'] = $this->books_model->get_all_books();
		redirect('/', 'auto');
	}

	public function rest_all() {
		$this->load->model('books_model');
		$results = $this->books_model->get_all_books();
		if($results && $results > 0) {
			// "FIX: No 'Access-Control-Allow-Origin' header is present on the requested resource. in Angular"
			header('Access-Control-Allow-Origin: *');
			$this->output
		        ->set_content_type('application/json')
		        ->set_output(json_encode($results));
	    } else {
	    	$this->output = "Database is empty";
	    }	
	}

	public function rest_book($id) {
		$this->load->model('books_model');
		$results = $this->books_model->load_book($id);
		if($results && $results > 0) {
			// "FIX: No 'Access-Control-Allow-Origin' header is present on the requested resource. in Angular"
			header('Access-Control-Allow-Origin: *');
			$this->output
		        ->set_content_type('application/json')
		        ->set_output(json_encode($results));
	    } else {
	    	$this->output = "Database is empty";
	    }	
	}
}