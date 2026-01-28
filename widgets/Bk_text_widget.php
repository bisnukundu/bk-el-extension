<?php

class Bk_text_widget extends \Elementor\Widget_Base
{

    function get_name()
    {
        return "bk_text_widget";
    }
   
	public function get_title(): string {
		return esc_html__( 'BK Text Widget', 'bk_el_ext' );
	}

	public function get_icon(): string {
		return 'eicon-editor-h1';
	}

	public function get_categories(): array {
		return [ 'bk-widget' ];
	}

	public function get_keywords(): array {
		return [ 'bk', 'text-widget' ];
	}


	protected function get_upsale_data(): array {
		return [];
	}

}