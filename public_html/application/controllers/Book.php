<?php

class Book extends CI_Controller {
	public function index() {
		$this->load->model('books_model');
		$this->books_model->create_book_table();
		echo "Books";
	}
}