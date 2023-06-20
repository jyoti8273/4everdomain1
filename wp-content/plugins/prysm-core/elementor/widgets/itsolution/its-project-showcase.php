<?php

class its_counterbox_box extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'its_counterbox_box';
    }

    public function get_title()
    {
        return __('IT Counter Box', 'prysm');
    }

    public function get_icon()
    {
        return 'eicon-lightbox-expand';
    }

    public function get_categories()
    {
        return ['prysm-category'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'counterbox_box_content',
            [
                'label' => __('counterbox Content', 'prysm'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'project_bg',
            [
                'label' => __('Project BG', 'prysm'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'project_title',
            [
                'label' => __('Project Title', 'prysm'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'video_link',
            [
                'label' => __('Video Link', 'prysm'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();


        
        $repeater->add_control(
            'title',
            [
                'label'       => esc_html__('Title', 'prysm'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'number',
            [
                'label' => esc_html__('Counter Number', 'prysm'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'symbole',
            [
                'label' => esc_html__('Counter symbole', 'prysm'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label'       => esc_html__('Description', 'prysm'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'counter_boxs',
            [
                'label'       => __('Add Item', 'prysm'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'counter_tio_style',
            [
                'label' => esc_html__('Project Style', 'prysm'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'protitle_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__('Title Style', 'prysm'),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'protitle_color',
            [
                'label'     => esc_html__('Title Color', 'prysm'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr20-project-showcase .pr20-headline h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'protitle_typography',
                'label'          => esc_html__('Typography', 'prysm'),
                'selector'       => '{{WRAPPER}} .pr20-project-showcase .pr20-headline h3',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            'project_video_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__('Video Style', 'prysm'),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'video_bg_color',
            [
                'label'     => esc_html__('Video BG Color', 'prysm'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr20-project-showcase .pr20-video-project a' => 'background-color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'video_color',
            [
                'label'     => esc_html__('Video Color', 'prysm'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr20-project-showcase .pr20-video-project a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'counter_box_style',
            [
                'label' => esc_html__('Project Box Style', 'prysm'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'countproject_title',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__('counterbox Box Style', 'prysm'),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'prysm'),
                'selector' => '{{WRAPPER}} .pr20-project-content .pr20-project-column',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'prysm'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .pr20-project-content .pr20-project-column',
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => __('Padding', 'prysm'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pr20-project-content .pr20-project-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'content_number_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__('Number Style', 'prysm'),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'number_color',
            [
                'label'     => esc_html__('Title Color', 'prysm'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr20-project-content .pr20-project-column .pr20-headline h2, .pr20-project-content .pr20-project-column .pr20-headline span' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'number_typography',
                'label'          => esc_html__('Typography', 'prysm'),
                'selector'       => '{{WRAPPER}} .pr20-project-content .pr20-project-column .pr20-headline h2, .pr20-project-content .pr20-project-column .pr20-headline span',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            'content_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__('counterbox Style', 'prysm'),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Title Color', 'prysm'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr20-project-content .pr20-project-column .pr20-headline h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__('Typography', 'prysm'),
                'selector'       => '{{WRAPPER}} .pr20-project-content .pr20-project-column .pr20-headline h4',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );

        $this->add_control(
            '_info_content_title_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__('Info Content', 'prysm'),
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'content_color',
            [
                'label'     => esc_html__('Text Color', 'prysm'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr20-project-column .pr20-pera-txt p' => 'color: {{VALUE}} ',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'text_typography',
                'label'          => esc_html__('Typography', 'prysm'),
                'selector'       => '{{WRAPPER}} .pr20-project-column .pr20-pera-txt p',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );        
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings       = $this->get_settings_for_display();
        $project_bg          = $settings['project_bg']['url'];
        $project_title       = $settings['project_title'];
        $video_link          = $settings['video_link'];
        $counter_boxs        = $settings['counter_boxs'];

?>
        <section class="pr20-project-showcase" data-background="<?php echo esc_url($project_bg);?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="pr20-video-project">
                            <a href="<?php echo esc_url($video_link);?>"><i class="fas fa-play"></i></a>
                        </div>
                        <div class="pr20-headline text-center">
                            <h3><?php echo esc_html($project_title);?></h3>
                        </div>
                    </div>
                </div>
                <div class="pr20-project-content">
                    <div class="row">
                        <?php foreach($counter_boxs as $box):?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="pr20-project-column wow fadeInUp" data-wow-delay="0.2s">
                                <div class="pr20-number-counter pr20-headline">
                                    <h2 class="pr20-counter"><?php echo esc_attr($box['number']);?></h2><span><?php echo esc_attr($box['symbole']);?></span>
                                </div>
                                <div class="pr20-headline">
                                    <h4><?php echo esc_html($box['title']);?></h4>
                                </div>
                                <div class="pr20-pera-txt">
                                    <p><?php echo esc_html($box['description']);?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
<?php

    }
}
