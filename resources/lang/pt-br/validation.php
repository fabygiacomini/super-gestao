<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => 'O campo :attribute precisa ser preenchido',
    'min' => 'O campo :attribute precisa ter mais do que 3 caracteres',
    'max' => 'O campo :attribute precisa ter menos caracteres',
    'unique' => 'O :attribute já foi utilizado.',
    'email' => 'O e-mail informado é inválido',
    'integer' => 'O valor do campo :attribute precisa ser um número inteiro',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],

        'usuario' => [
            'email' => 'O campo usuário (e-mail) é obrigatório',
        ],

        'senha' => [
            'required' => 'O campo senha é obrigatório',
        ],

        'unidade_id' => [
            'exists' => 'A unidade de medida informada não existe',
        ],

        'fornecedor_id' => [
            'exists' => 'O fornecedor selecionado não existe',
        ],

        'cliente_id' => [
            'exists' => 'O cliente informado não existe',
        ],

        'produto_id' => [
            'exists' => 'O produto informado não existe',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
