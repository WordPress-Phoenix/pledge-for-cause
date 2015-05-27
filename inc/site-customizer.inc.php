<?php

add_action('customize_register', 'sc_customizer');
function sc_customizer($wp_customize){
    //Add Sections
    $wp_customize->add_section('sc_text_section', array(
        'title' => 'Text',
    ));
    $wp_customize->add_section('sc_appearance_section', array(
        'title' => 'Appearance',
    ));

    //Add Settings
    $wp_customize->add_setting('sc_font_selector', array(
        'default' => 1
    ));
    $wp_customize->add_setting('sc_hero_button', array(
        'default' => 'Give Here'
    ));
    $wp_customize->add_setting('sc_hero_header_text', array(
        'default' => 'go to customizer to change this text'
    ));
    $wp_customize->add_setting('sc_pledges_header_text', array(
        'default' => 'go to customizer to change this text'
    ));
    $wp_customize->add_setting('sc_background_image_selector'
    );

    //Add Controls
    $wp_customize->add_control('sc_font_selector', array(
        'label' => "include letter?",
        'section' => 'sc_text_section',
        'type' => 'checkbox'
    ));
    $wp_customize->add_control('sc_hero_button', array(
        'label' => "Summary sections button text",
        'section' => 'sc_text_section',
        'type' => 'text'
    ));
    $wp_customize->add_control('sc_hero_header_text', array(
        'label' => "Summary sections main text",
        'section' => 'sc_text_section',
        'type' => 'text'
    ));
    $wp_customize->add_control('sc_pledges_header_text', array(
        'label' => "Pledge section's main text",
        'section' => 'sc_text_section',
        'type' => 'text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sc_background_image_selector', array(
        'label'    => 'Background Image',
        'section'  => 'sc_appearance_section',
        'settings' => 'sc_background_image_selector',
    ) ) );
}