<?php

class Book extends CI_Controller {
	public function index() {
		$data = array();

		$this->load->model('books_model');
		$this->books_model->create_book_table();

		$data['books'] = $this->books_model->get_all_books();

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
		$this->form_validation->set_rules('cover', 'Cover image', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('review', 'Review', 'required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('books-add');
			$this->load->view('footer');
		} else {
			$time = date('Y-m-d H:i:s');
			$data = array(
				'ISBN' => $this->input->post('isbn'),
				'title' => $this->input->post('title'),
				'price' => $this->input->post('price'),
				'cover' => $this->input->post('cover'),
				'author' => $this->input->post('author'),
				'review' => $this->input->post('review'),
				'created' => $time
			);
			$result = $this->input->post();
			$this->load->model('books_model');
			$this->books_model->save_book($data);

			$data['message'] = "Book was saved successfully";
			$data['books'] = $this->books_model->get_all_books();

			$this->load->view('header');
			$this->load->view('books-index', $data);
			$this->load->view('footer');
		}
	}
}