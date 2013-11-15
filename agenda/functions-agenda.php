<?php

// Adiciona uma nova coluna a listagem (WP-ADMIN) de Eventos
	function nova_coluna_eventos( $eventos_columns ) {
		$new_columns['cb'] = '<input type="checkbox" />';
		$new_columns['title'] = _x('Titulo', 'column name');
		$new_columns['source'] = __('Data do Evento');
		return $new_columns;
	}
	add_filter( 'manage_edit-eventos_columns', 'nova_coluna_eventos' );
// Fim


// Content da nova coluna de listagem (WP-ADMIN) de Eventos
	function content_nova_coluna_eventos ( $column_name, $id ) {
		global $post;
		switch ($column_name) {
			case 'source':
				$data_invert = get_post_meta( $post->ID , 'agenda-event-date' , true );
				$data_explo = explode("/", $data_invert);
				echo
				'<span style="font-size:15px;">' .
				$data_explo[2]
				. "." .
				$data_explo[1]
				. "." .
				$data_explo[0]
				. '</span>';
				break;
			default:
				break;
		} // Fim switch
	}
	add_action( 'manage_eventos_posts_custom_column', 'content_nova_coluna_eventos', 10, 2 );
// Fim


// Ordena automaticamente os Eventos da Agenda de forma ascendente (ASC)
	function agenda_pre_get_posts( $query ) {
		if (is_admin()) {
	
			if (isset($query->query_vars['post_type'])) {
			   if ($query->query_vars['post_type'] == 'eventos') {
	
					$query->set('meta_key', 'agenda-event-date');
					$query->set('orderby', 'meta_value');
					$query->set('order', 'DESC');
				}
			}
		}
	}
	add_filter( 'pre_get_posts' , 'agenda_pre_get_posts' );
// Fim

?>