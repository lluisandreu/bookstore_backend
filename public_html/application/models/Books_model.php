<?php

class Books_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/// Create a table with fields for the books
	public function create_book_table() {
		$this->load->database();
		$this->load->dbforge();
		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'ISBN' => array(
				'type' => 'INT',
				'constraint' => 15
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'unique' => TRUE,
			),
			'price' => array(
				'type' => 'FLOAT', 
				'constraint' => 50
			),
			'cover' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'author' => array(
				'type' => 'VARCHAR',
				'constraint' => 50
			),
			'review' => array(
				'type' => 'LONGTEXT'
			),
			'created' => array(
				'type' => 'TIMESTAMP',
			),
		);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('books', TRUE);
	}

	public function save_book($book) {
		$this->db->insert('books', $book);
	}
	public function update_book($book) {
		$this->db->replace('books', $book);
	}
	public function remove_book($book_id) {
		$this->db->delete('books', array('id' => $book_id));
	}
	public function get_all_books() {
		$this->load->model('books_model');
		if ($this->db->table_exists('books')) {
			$this->db->order_by('created', 'DESC');
			$query = $this->db->get('books');
			$results = $query->result();
			foreach ($results as $result) {
				$result->cover = $this->books_model->img_styles($result->cover);
			}
			return $results;
		}
	}
	public function load_book($id) {
		$query = $this->db->get_where('books', array('id' => $id));
		return $query->result();
	}
	public function img_create_thumb($image_name) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = "./uploads/" . $image_name;
		$config['create_thumb'] = TRUE;
		$config['thumb_marker'] = "";
		$config['maintain_ratio'] = TRUE;
		$config['new_image'] = "./uploads/thumbs/" . $image_name;
		$config['width'] = 100;
		$config['height'] = 60;

		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
	public function img_styles($image_name) {
		$this->load->helper('url');
		$styles = array();
		$base = base_url();
		$styles['thumb'] = $base . 'uploads/thumbs/' . $image_name;
		$styles['original'] = $base . 'uploads/' . $image_name;
		return $styles;
	}
}