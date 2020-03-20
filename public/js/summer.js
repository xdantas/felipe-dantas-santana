$(function(){

	const DATATABLE_PTBR = {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "(Filtrados de _MAX_ registros)",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ resultados por página",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	}

    $("#btn_add_categorias").click(function(){
		clearErrors();
		$("#form_categorias")[0].reset();
        $("#modal_categorias").modal();
    });

    $("#btn_add_detalhes").click(function(){
        $("#modal_detalhes").modal();
    });

    $("#form_categorias").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "home/ajax_save_categorias",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_save_categorias").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_categorias").modal("hide");
					swal("Sucesso!","Categoria salva com sucesso!", "success");
					dt_categorias.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});
	
	$("#form_detalhes").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "home/ajax_save_detalhes",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_save_detalhes").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_detalhes").modal("hide");
					swal("Sucesso!","Detalhe de produto salvo com sucesso!", "success");
					dt_detalhes.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
    });
    

    var dt_categorias = $("#dt_categorias").DataTable({
		"oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "home/ajax_list_categorias",
			"type": "POST",
		},
		"columnDefs": [
			{ targets: "no-sort", orderable: false },
			{ targets: "dt-center", className: "dt-center" },
        ],
		"drawCallback": function() {
			active_btn_categorias();
		}
	});
	
	var dt_detalhes = $("#dt_detalhes").DataTable({
		"oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "home/ajax_list_detalhes",
			"type": "POST",
		},
		"columnDefs": [
			{ targets: "no-sort", orderable: false },
			{ targets: "dt-center", className: "dt-center" },
        ],
		"drawCallback": function() {
			active_btn_detalhes();
		}
    });
    
    function active_btn_categorias() {
		
		$(".btn-edit-categorias").click(function(){
			$.ajax({
				type: "POST",
				url: BASE_URL + "home/ajax_get_categorias_data",
				dataType: "json",
				data: {"id_categoria": $(this).attr("id_categoria")},
				success: function(response) {
					clearErrors();
					$("#form_categorias")[0].reset();
					$.each(response["input"], function(id, value) {
						$("#"+id).val(value);
					});
                    $("#modal_categorias").modal();
				}
			})
		});

		$(".btn-del-categorias").click(function(){
			
			id_categoria = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja deletar essa categoria?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d9534f",
				confirmButtonText: "Sim",
				cancelButtonText: "Não",
				closeOnConfirm: true,
				closeOnCancel: true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "home/ajax_delete_categorias_data",
						dataType: "json",
						data: {"id_categoria": id_categoria.attr("id_categoria")},
						success: function(response) {
							swal("Sucesso!", "Categoria deletada com sucesso", "success");
							dt_categorias.ajax.reload();
						}
					})
				}
			})

		});
	}

	function active_btn_detalhes() {
		
		$(".btn-edit-detalhes").click(function(){
			$.ajax({
				type: "POST",
				url: BASE_URL + "home/ajax_get_detalhes_data",
				dataType: "json",
				data: {"id_detalhe": $(this).attr("id_detalhe")},
				success: function(response) {
					clearErrors();
					$("#form_detalhes")[0].reset();
					$.each(response["input"], function(id, value) {
						$("#"+id).val(value);
					});
                    $("#modal_detalhes").modal();
				}
			})
		});

		$(".btn-del-detalhes").click(function(){
			
			id_detalhe = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja deletar esse detalhe de um produto?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d9534f",
				confirmButtonText: "Sim",
				cancelButtonText: "Não",
				closeOnConfirm: true,
				closeOnCancel: true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "home/ajax_delete_detalhes_data",
						dataType: "json",
						data: {"id_detalhe": id_detalhe.attr("id_detalhe")},
						success: function(response) {
							swal("Sucesso!", "Detalhe de produto deletada com sucesso", "success");
							dt_detalhes.ajax.reload();
						}
					})
				}
			})

		});
	}

});