<?php

class Book extends CI_Controller {
	public function index() {
		$this->load->model('books_model');
		$this->books_model->create_book_table();

		$this->load->view('header');
		$this->load->view('books-index');
		$this->load->view('footer');
	}

	public function book_add() {

		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Book title', 'required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('cover', 'Cover image', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		$this->form_validation->set_rules('review', 'Review', 'required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('books-add');
			$this->load->view('footer');
		} else {
			echo "Sucess";
		}
	}
}