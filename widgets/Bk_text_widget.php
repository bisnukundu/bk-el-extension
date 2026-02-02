<?php

class Bk_text_widget extends \Elementor\Widget_Base
{

	function get_name()
	{
		return "bk_text_widget";
	}

	public function get_title(): string
	{
		return esc_html__('BK Text Widget', 'bk_el_ext');
	}

	public function get_icon(): string
	{
		return 'eicon-editor-h1';
	}

	public function get_categories(): array
	{
		return ['bk-widget'];
	}

	public function get_keywords(): array
	{
		return ['bk', 'text-widget'];
	}

	public function get_style_depends()
	{
		// 	Added style handler name to use this style in this widget.
		return ['bk_text_style'];
	}


	protected function get_upsale_data(): array
	{
		return [];
	}
	function register_controls()
	{


		$this->add_content_section();
		$this->add_style_section();
	}

	function add_content_section()
	{
		$this->start_controls_section(
			'bk_text_content_section',
			[
				'label' => __("BK Text Content Section"),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);
		$this->add_control(
			'bk_text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => __("BK Text"),
				'placeholder' => __("Enter Your Text..."),
				'default' => 'bb'
			],

		);
		$this->end_controls_section();
	}

	function add_style_section()
	{
		$this->start_controls_section('bk_text_content_style', [
			'label' => __("BK Text Style"),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE
		]);

		$this->add_control(
			'bk_text_color',
			[
				'label' => __("BK Text Color"),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .bk_text' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control('bk_text_image', [
			'label' => 'BK Text Image',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'selectors' => [
				'{{WRAPPER}} div' => 'background-image: url({{URL}})'
			]
		]);

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'title_typography',
		// 		'selector' => '{{WRAPPER}} .title',
		// 	]
		// );


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => __('bk_text_typogroup'),
				'selector' => '{{WRAPPER}} .bk_text'
			]
		);

		$this->add_control(
			'text_alignment',
			[
				'label' => __('Alignment', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'plugin-name'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'plugin-name'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'plugin-name'),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __('Justify', 'plugin-name'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .bk_text' => 'text-align: {{VALUE}};',
				],
			]
		);



		$this->end_controls_section();
	}

	function render()
	{
		$settings = $this->get_settings_for_display();
		echo "<div><h1 class='bk_text'>{$settings['bk_text']}</h1></div>";
	}


}