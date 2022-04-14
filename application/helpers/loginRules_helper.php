<?php

function getLoginRules(){
    return array(
        array(
            'field' => 'user',
            'label' => 'nombre de usuario',
            'rules' => 'required'
        ),
        array(
            'field' => 'pass',
            'label' => 'contraseña de usuario',
            'rules' => 'required'
        )
    );
}