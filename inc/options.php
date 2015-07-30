<?php
/* metabox options */
$metabox_site = new Odin_Metabox(
    'site', // Slug/ID do Metabox (obrigatório)
    'Informações do Pólo', // Nome do Metabox  (obrigatório)
    'polos', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
    'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
    'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$metabox_site->set_fields(
    array(
        array(
            'id'          => 'site_url',
            'label'       => __( 'URL do site', 'rede-polos-theme' ),
            'type'        => 'text',
        )
    )
);