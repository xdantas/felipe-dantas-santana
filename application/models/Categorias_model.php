<?php

class Categorias_model extends CI_Model {

public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_data($id, $select = NULL) {
		if (!empty($select)) {
			$this->db->select($select);
		}
		$this->db->from("categorias");
		$this->db->where("id_categoria", $id);
		return $this->db->get();
	}

	public function insert($data) {
		$this->db->insert("categorias", $data);
	}

	public function update($id, $data) {
		$this->db->where("id_categoria", $id);
		$this->db->update("categorias", $data);
	}

	public function delete($id) {
		$this->db->where("id_categoria", $id);
		$this->db->delete("categorias");
	}

	public function is_duplicated($field, $value, $id = NULL) {
		if (!empty($id)) {
			$this->db->where("id_categoria <>", $id);
		}
		$this->db->from("categorias");
		$this->db->where($field, $value);
		return $this->db->get()->num_rows() > 0;
	}

	var $column_search = array("categoria", "categoria_pai", "status");
	var $column_order = array("id_categoria");

	private function _get_datatable() {

		$search = NULL;
		if ($this->input->post("search")) {
			$search = $this->input->post("search")["value"];
		}
		$order_column = NULL;
		$order_dir = NULL;
		$order = $this->input->post("order");
		if (isset($order)) {
			$order_column = $order[0]["column"];
			$order_dir = $order[0]["dir"];
		}

		$this->db->from("categorias");
		if (isset($search)) {
			$first = TRUE;
			foreach ($this->column_search as $field) {
				if ($first) {
					$this->db->group_start();
					$this->db->like($field, $search);
					$first = FALSE;
				} else {
					$this->db->or_like($field, $search);
				}
			}
			if (!$first) {
				$this->db->group_end();
			}
		}

		if (isset($order)) {
			$this->db->order_by($this->column_order[$order_column], $order_dir);
		}
	}

	public function get_datatable() {

		$length = $this->input->post("length");
		$start = $this->input->post("start");
		$this->_get_datatable();
		if (isset($length) && $length != -1) {
			$this->db->limit($length, $start);
		}
		return $this->db->get()->result();
	}

	public function records_filtered() {

		$this->_get_datatable();
		return $this->db->get()->num_rows();

	}

	public function records_total() {

		$this->db->from("categorias");
		return $this->db->count_all_results();

    }
}