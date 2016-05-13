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
	public function get_all_books() {
		if ($this->db->table_exists('books')) {
			$this->db->order_by('created', 'DESC');
			$query = $this->db->get('books');
			return $query->result();
		}
	}
}