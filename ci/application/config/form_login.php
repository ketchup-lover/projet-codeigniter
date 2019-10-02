<?php
$config=array(
'verif'=>array(
  array(
      'field' => 'login',
      'rules' => array(
          'required',
          'regex_match[/^[0-9A-Z-a-z--]+$/]',
          'htmlspecialchars'
      ),
      'errors' => array(
          'regex_match' => 'La saisie du champ %s est invalide.'
      )),
      array(
        'field' => 'pass',
        'rules' => array(
            'required',
            'regex_match[/^[0-9A-Z-a-z--]+$/]',
            'htmlspecialchars'
        ),
        'errors' => array(
            'regex_match' => 'La saisie du champ %s est invalide.'
        )),

      
      ));?>