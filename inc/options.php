<?php
/* THEME OPTIONS */
$odin_theme_options = new Odin_Theme_Options( 
    'odin-options', // Slug/ID da página (Obrigatório)
     __( 'Opções do tema', 'rede-polos-theme' ),  // Titulo da página (Obrigatório)
    'manage_options' // Nível de permissão (Opcional) [padrão é manage_options]
);
$odin_theme_options->set_tabs(
    array(
        array(
            'id' => 'home_cfg', // ID da aba e nome da entrada no banco de dados.
            'title' => __('Home','rede-polos-theme'), // Título da aba.
        ),
       )
);
$odin_theme_options->set_fields(
    array(
        
        'home_section' => array(
            'tab'   => 'home_cfg', // Sessão da aba odin_general
            'title' => __('Configurações da página inicial','rede-polos-theme'),
            'options' => array(
                array(
                    'id' => 'banner1',
                    'label' => __( 'Banner 1', 'rede-polos-theme' ),
                    'type' => 'textarea',
                    'default' => 'Default text',
                    'description' => __( 'Descrition Example', 'rede-polos-theme' )
                ),
                array(
                    'id' => 'banner2',
                    'label' => __( 'Banner 2', 'rede-polos-theme' ),
                    'type' => 'textarea'
                )
            )
        ),



        
    )
);
