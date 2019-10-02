<?php
$config=array(
  'logs_login' =>array(
    array(
      'field' => 'login',
      'rules'=>array(
        'required',
        'regex_match[/^[0-9A-Z-a-z--]+$/]',
        'htmlspecialchars'
      ),
      'errors'=>array(
        'required'=>'Veuillez remplir le champ %s',
        'regex_match'=>'La saisie du champ %s est invalide.'
      )
      ),
      array(
        'field' => 'password',
        'rules'=>array(
          'required',
          'regex_match[/^[0-9A-Z-a-z--]+$/]',
          'htmlspecialchars'
        ),
        'errors'=>array(
          'required'=>'Veuillez remplir le champ %s',
          'regex_match'=>'La saisie du champ %s est invalide.'
        )
        ),
    ),
'logs' =>array(
  array(
    'field' => 'login',
    'rules'=>array(
      'required',
      'regex_match[/^[0-9A-Z-a-z--]+$/]',
      'htmlspecialchars'
    ),
    'errors'=>array(
      'required'=>'Veuillez remplir le champ %s',
      'regex_match'=>'La saisie du champ %s est invalide.'
    )
    ),
    array(
      'field' => 'password',
      'rules'=>array(
        'required',
        'regex_match[/^[0-9A-Z-a-z--]+$/]',
        'htmlspecialchars'
      ),
      'errors'=>array(
        'required'=>'Veuillez remplir le champ %s',
        'regex_match'=>'La saisie du champ %s est invalide.'
      )
      ),
      array(
        'field' => 'email',
        'rules'=>array(
          'required',
          'regex_match[/^([A-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\@[éA-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\.[a-zA-Z]{2,4})+$/]',
          'htmlspecialchars'
        ),
        'errors'=>array(
          'required'=>'Veuillez remplir le champ %s',
          'regex_match'=>'La saisie du champ %s est invalide.'
        )
        ),
  ),
'ajout'=>array(
  array(
          'field'=>'pro_ref',
          'label'=>'reference',
          'rules'=>array(
           'required',
           'regex_match[/^[0-9A-Z-a-z--]+$/]',
           'htmlspecialchars'
),
  'errors'=>array(
            'required'=>'Veuillez remplir le champ %s',
            'regex_match'=>'La saisie du champ %s est invalide.'
  )   ),   array(
         'field'=>'pro_libelle',
         'label'=>'nom',
         'rules'=>array(
           'required',
           'regex_match[/^[A-Z-a-z--]+$/]',
           'htmlspecialchars'   ),
  'errors'=>array(
            'required'=>'Veuillez remplir le champ %s',
            'regex_match'=>'La saisie du champ %s est invalide.'
  )   ),   array(
         'field'=>'pro_description',
         'label'=>'description',
         'rules'=>array(
           'required',
           'regex_match[/^[A-Z-a-z---\'-,.������ ]+$/]',
           'htmlspecialchars'   ),
  'errors'=>array(
            'required'=>'Veuillez remplir le champ %s',
            'regex_match'=>'La saisie du champ %s est invalide.'
  )   ),   array(
         'field'=>'pro_prix',
         'label'=>'prix',
         'rules'=>array(
           'required',
           'regex_match[/^[0-9-.]+$/]',
           'htmlspecialchars'   ),
  'errors'=>array(
            'required'=>'Veuillez remplir le champ %s',
            'regex_match'=>'La saisie du champ %s est invalide.'
  )   ),   array(
         'field'=>'pro_stock',
         'label'=>'stock',
         'rules'=>array(
                 'required',
                 'regex_match[/^[0-9-.]+$/]',
                 'htmlspecialchars'
         ),
         'errors'=> array(
                 'required'=> 'Veuillez remplir le champ %s.',
                 'regex_match'=>'La saisie du champ %s est invalide.'          )          ),   array(
        'field'=>'pro_couleur',
        'label'=>'couleur',
        'rules'=>array(
                 'required',
                 'regex_match[/^[A-Z-a-z--]+$/]',
                 'htmlspecialchars'         ),
        'errors'=>array(
                  'required'=>'Veuillez remplir le champ %s',
                  'regex_match'=>'La saisie du champ %s est invalide.'
        )         ), 
         
         ) );?>