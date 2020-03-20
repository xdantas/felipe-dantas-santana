<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $data = array(
                "scripts" => array(
                        "summer.js",
                        "util.js",
                        "sweetalert.js",
                        "datatables.min.js"
                )
        );
        
        $this->load->view('template/header');
        $this->load->view('home', $data);
        $this->load->view('template/footer');
        $this->load->view('template/scripts');
        }


	public function ajax_get_categorias_data() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["input"] = array();

		$this->load->model("categorias_model");

		$id_categoria = $this->input->post("id_categoria");
		$data = $this->categorias_model->get_data($id_categoria)->result_array()[0];
		$json["input"]["id_categoria"] = $data["id_categoria"];
		$json["input"]["categoria"] = $data["categoria"];
		$json["input"]["categoria_pai"] = $data["categoria_pai"];
		$json["input"]["status"] = $data["status"];

		echo json_encode($json);
        }
        
        public function ajax_get_detalhes_data() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["input"] = array();

		$this->load->model("detalhes_model");

		$id_detalhe = $this->input->post("id_detalhe");
		$data = $this->detalhes_model->get_data($id_detalhe)->result_array()[0];
		$json["input"]["id_detalhe"] = $data["id_detalhe"];
		$json["input"]["id_item"] = $data["id_item"];
		$json["input"]["nome"] = $data["nome"];
		$json["input"]["valor"] = $data["valor"];
		$json["input"]["status_detalhe"] = $data["status_detalhe"];

		echo json_encode($json);
	}

        
        public function ajax_save_categorias() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("categorias_model");

		$data = $this->input->post();

		if (empty($data["categoria"])) {
			$json["error_list"]["#categoria"] = "Categoria é obrigatório!";
		} else {
			if ($this->categorias_model->is_duplicated("categoria", $data["categoria"], $data["id_categoria"])) {
				$json["error_list"]["#categoria"] = "Categoria já existente!";
			}
		}

		if (empty($data["categoria_pai"])) {
			$json["error_list"]["#categoria_pai"] = "Categoria_pai é obrigatório!";
		} 

		if (empty($data["status"])) {
			$json["error_list"]["#status"] = "Status é obrigatório!";
                } 
                

		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {

			if (empty($data["id_categoria"])) {
				$this->categorias_model->insert($data);
			} else {
				$id_categoria = $data["id_categoria"];
				unset($data["id_categoria"]);
				$this->categorias_model->update($id_categoria, $data);
			}
		}

		echo json_encode($json);
        }
        

        public function ajax_save_detalhes() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("detalhes_model");

		$data = $this->input->post();

		if (empty($data["id_item"])) {
			$json["error_list"]["#id_item"] = "ID do Item é obrigatório!";
		} else {
			if ($this->detalhes_model->is_duplicated("id_item", $data["id_item"], $data["id_detalhe"])) {
				$json["error_list"]["#id_item"] = "Detalhe do Item já existente!";
			}
		}

		if (empty($data["nome"])) {
			$json["error_list"]["#nome"] = "Nome é obrigatório!";
                } 
                
		$data["valor"] = floatval($data["valor"]);
		if (empty($data["valor"])) {
			$json["error_list"]["#valor"] = "Valor do produto é obrigatório!";
		} else {
			if (!($data["valor"] > 0)) {
				$json["error_list"]["#valor"] = "O valor tem que ser maior que R$ 0,00!";
			}
		}

		if (empty($data["status_detalhe"])) {
			$json["error_list"]["#status_detalhe"] = "Status é obrigatório!";
                } 
                

		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {

			if (empty($data["id_detalhe"])) {
				$this->detalhes_model->insert($data);
			} else {
				$id_detalhe = $data["id_detalhe"];
				unset($data["id_detalhe"]);
				$this->detalhes_model->update($id_detalhe, $data);
			}
		}

		echo json_encode($json);
	}

        public function ajax_list_categorias() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$this->load->model("categorias_model");
		$categorias = $this->categorias_model->get_datatable();

		$data = array();
		foreach ($categorias as $categoria) {

                        $row = array();
                        
                        $row[] = $categoria->id_categoria;

						$row[] = $categoria->categoria;

						$row[] = $categoria->categoria_pai;

                        $row[] = $categoria->status;

			$row[] = '<div style="display: inline-block;">
						<button class="btn btn-primary btn-edit-categorias" 
							id_categoria="'.$categoria->id_categoria.'">
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn btn-danger btn-del-categorias" 
                                                id_categoria="'.$categoria->id_categoria.'">
							<i class="fa fa-times"></i>
						</button>
					</div>';

			$data[] = $row;

		}

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->categorias_model->records_total(),
			"recordsFiltered" => $this->categorias_model->records_filtered(),
			"data" => $data,
		);

		echo json_encode($json);
        }

        public function ajax_list_detalhes() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$this->load->model("detalhes_model");
		$detalhes = $this->detalhes_model->get_datatable();

		$data = array();
		foreach ($detalhes as $detalhe) {

                        $row = array();
                        
                        $row[] = $detalhe->id_detalhe;

			$row[] = $detalhe->id_item;

                        $row[] = $detalhe->nome;
                        
                        $row[] = "R$ ". $detalhe->valor;

                        $row[] = $detalhe->status_detalhe;

			$row[] = '<div style="display: inline-block;">
						<button class="btn btn-primary btn-edit-detalhes" 
							id_detalhe="'.$detalhe->id_detalhe.'">
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn btn-danger btn-del-detalhes" 
                                                id_detalhe="'.$detalhe->id_detalhe.'">
							<i class="fa fa-times"></i>
						</button>
					</div>';

			$data[] = $row;

		}

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $this->detalhes_model->records_total(),
			"recordsFiltered" => $this->detalhes_model->records_filtered(),
			"data" => $data,
		);

		echo json_encode($json);
        }
        
        public function ajax_delete_categorias_data() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$this->load->model("categorias_model");
		$id_categoria = $this->input->post("id_categoria");
		$this->categorias_model->delete($id_categoria);

		echo json_encode($json);
        }
        
        public function ajax_delete_detalhes_data() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$this->load->model("detalhes_model");
		$id_detalhe = $this->input->post("id_detalhe");
		$this->detalhes_model->delete($id_detalhe);

		echo json_encode($json);
	}
}