<?php

class NP_Theme_Customize
{
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     * 
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See live_preview() for more.
     *  
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     */
    public static function register($wp_customize)
    {
        $wp_customize->add_section(
            'nptheme_options',
            array(
                'title'       => __('Nicea Parafia Theme Options', 'sage'),
                'priority'    => 35,
                'capability'  => 'edit_theme_options',
                'description' => __('Allows you to customize some example settings for Nicea Parafia Theme.', 'sage'),
            )
        );

        $wp_customize->add_setting(
            'holiday_warning',
            array(
                'default'    => false,
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport'  => 'refresh',
                'sanitize_callback' => 'NP_Theme_Customize::sanitize_checkbox',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'nptheme_holiday_warning',
                array(
                    'label'          => __('Show warning about website freeze due to holidays', 'sage'),
                    'section'        => 'nptheme_options',
                    'settings'       => 'holiday_warning',
                    'type'           => 'checkbox'
                )
            )
        );
    }

    function sanitize_checkbox($checked)
    {
        return ((isset($checked) && true == $checked) ? true : false);
    }
}

add_action('customize_register', array('NP_Theme_Customize', 'register'));
