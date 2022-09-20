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

    "accepted"=> ":Attribute deve essere accettato.",
    "accepted_if"=> ":Attribute deve essere accettato quando :other è :value.",
    "active_url"=> ":Attribute non è un URL valido.",
    "after"=> ":Attribute deve essere una data successiva al :date.",
    "after_or_equal"=> ":Attribute deve essere una data successiva o uguale al :date.",
    "alpha"=> ":Attribute può contenere solo lettere.",
    "alpha_dash"=> ":Attribute può contenere solo lettere, numeri e trattini.",
    "alpha_num"=> ":Attribute può contenere solo lettere e numeri.",
    "array"=> ":Attribute deve essere un array.",
    "attached"=> ":Attribute è già associato.",
    "before"=> ":Attribute deve essere una data precedente al :date.",
    "before_or_equal"=> ":Attribute deve essere una data precedente o uguale al :date.",
    "between.array"=> ":Attribute deve avere tra :min - :max elementi.",
    "between.file"=> ":Attribute deve trovarsi tra :min - :max kilobyte.",
    "between.numeric"=> ":Attribute deve trovarsi tra :min - :max.",
    "between.string"=> ":Attribute deve trovarsi tra :min - :max caratteri.",
    "boolean"=> "Il campo :attribute deve essere vero o falso.",
    "confirmed"=> "Il campo di conferma per :attribute non coincide.",
    "current_password"=> "Password non valida.",
    "date"=> ":Attribute non è una data valida.",
    "date_equals"=> ":Attribute deve essere una data e uguale a :date.",
    "date_format"=> ":Attribute non coincide con il formato :format.",
    "declined"=> ":Attribute deve essere rifiutato.",
    "declined_if"=> ":Attribute deve essere rifiutato quando :other è :value.",
    "different"=> ":Attribute e :other devono essere differenti.",
    "digits"=> ":Attribute deve essere di :digits cifre.",
    "digits_between"=> ":Attribute deve essere tra :min e :max cifre.",
    "dimensions"=> "Le dimensioni dell'immagine di :attribute non sono valide.",
    "distinct"=> ":Attribute contiene un valore duplicato.",
    "doesnt_end_with"=> ":Attribute non può terminare con uno dei seguenti valori=> :values.",
    "doesnt_start_with"=> ":Attribute non può iniziare con uno dei seguenti valori=> :values.",
    "email"=> ":Attribute non è valido.",
    "ends_with"=> ":Attribute deve finire con uno dei seguenti valori=> :values",
    "enum"=> "Il campo :attribute non è valido.",
    "exists"=> ":Attribute selezionato non è valido.",
    "failed"=> "Credenziali non valide.",
    "file"=> ":Attribute deve essere un file.",
    "filled"=> "Il campo :attribute deve contenere un valore.",
    "gt.array"=> ":Attribute deve contenere più di :value elementi.",
    "gt.file"=> ":Attribute deve essere maggiore di :value kilobyte.",
    "gt.numeric"=> ":Attribute deve essere maggiore di :value.",
    "gt.string"=> ":Attribute deve contenere più di :value caratteri.",
    "gte.array"=> ":Attribute deve contenere un numero di elementi uguale o maggiore di :value.",
    "gte.file"=> ":Attribute deve essere uguale o maggiore di :value kilobyte.",
    "gte.numeric"=> ":Attribute deve essere uguale o maggiore di :value.",
    "gte.string"=> ":Attribute deve contenere un numero di caratteri uguale o maggiore di :value.",
    "image"=> ":Attribute deve essere un'immagine.",
    "in"=> ":Attribute selezionato non è valido.",
    "in_array"=> "Il valore del campo :attribute non esiste in :other.",
    "integer"=> ":Attribute deve essere un numero intero.",
    "ip"=> ":Attribute deve essere un indirizzo IP valido.",
    "ipv4"=> ":Attribute deve essere un indirizzo IPv4 valido.",
    "ipv6"=> ":Attribute deve essere un indirizzo IPv6 valido.",
    "json"=> ":Attribute deve essere una stringa JSON valida.",
    "lt.array"=> ":Attribute deve contenere meno di :value elementi.",
    "lt.file"=> ":Attribute deve essere minore di :value kilobyte.",
    "lt.numeric"=> ":Attribute deve essere minore di :value.",
    "lt.string"=> ":Attribute deve contenere meno di :value caratteri.",
    "lte.array"=> ":Attribute deve contenere un numero di elementi minore o uguale a :value.",
    "lte.file"=> ":Attribute deve essere minore o uguale a :value kilobyte.",
    "lte.numeric"=> ":Attribute deve essere minore o uguale a :value.",
    "lte.string"=> ":Attribute deve contenere un numero di caratteri minore o uguale a :value.",
    "mac_address"=> "Il campo :attribute deve essere un indirizzo MAC valido .",
    "max.array"=> ":Attribute non può avere più di :max elementi.",
    "max.file"=> ":Attribute non può essere superiore a :max kilobyte.",
    "max.numeric"=> ":Attribute non può essere superiore a :max.",
    "max.string"=> ":Attribute non può contenere più di :max caratteri.",
    "max_digits"=> ":Attribute non può contenere più di :max cifre.",
    "mimes"=> ":Attribute deve essere del tipo=> :values.",
    "mimetypes"=> ":Attribute deve essere del tipo=> :values.",
    "min.array"=> ":Attribute deve avere almeno :min elementi.",
    "min.file"=> ":Attribute deve essere almeno di :min kilobyte.",
    "min.numeric"=> ":Attribute deve essere almeno :min.",
    "min.string"=> ":Attribute deve contenere almeno :min caratteri.",
    "min_digits"=> ":Attribute deve contenere almeno :min cifre.",
    "multiple_of"=> ":Attribute deve essere un multiplo di :value",
    "next"=> "Successivo &raquo;",
    "not_in"=> "Il valore selezionato per :attribute non è valido.",
    "not_regex"=> "Il formato di :attribute non è valido.",
    "numeric"=> ":Attribute deve essere un numero.",
    "password"=> "Il campo :attribute non è corretto.",
    "password.letters"=> ":Attribute deve contenere almeno un carattere.",
    "password.mixed"=> ":Attribute deve contenere almeno un carattere maiuscolo ed un carattere minuscolo.",
    "password.numbers"=> ":Attribute deve contenere almeno un numero.",
    "password.symbols"=> ":Attribute deve contenere almeno un simbolo.",
    "password.uncompromised"=> ":Attribute è presente negli archivi dei dati trafugati. Per piacere scegli un valore differente per :attribute.",
    "present"=> "Il campo :attribute deve essere presente.",
    "previous"=> "&laquo; Precedente",
    "prohibited"=> ":Attribute non consentito.",
    "prohibited_if"=> ":Attribute non consentito quando :other è :value.",
    "prohibited_unless"=> ":Attribute non consentito a meno che :other sia contenuto in :values.",
    "prohibits"=> ":Attribute impedisce a :other di essere presente.",
    "regex"=> "Il formato del campo :attribute non è valido.",
    "relatable"=> ":Attribute non può essere associato a questa risorsa.",
    "required"=> "Il campo :attribute è richiesto.",
    "required_array_keys"=> "Il campo :attribute deve contenere voci per=> :values.",
    "required_if"=> "Il campo :attribute è richiesto quando :other è :value.",
    "required_if_accepted"=> "The :attribute field is required when :other is accepted.",
    "required_unless"=> "Il campo :attribute è richiesto a meno che :other sia in :values.",
    "required_with"=> "Il campo :attribute è richiesto quando :values è presente.",
    "required_with_all"=> "Il campo :attribute è richiesto quando :values sono presenti.",
    "required_without"=> "Il campo :attribute è richiesto quando :values non è presente.",
    "required_without_all"=> "Il campo :attribute è richiesto quando nessuno di :values è presente.",
    "reset"=> "La password è stata reimpostata!",
    "same"=> ":Attribute e :other devono coincidere.",
    "sent"=> "Ti abbiamo inviato una email con il link per il reset della password!",
    "size.array"=> ":Attribute deve contenere :size elementi.",
    "size.file"=> ":Attribute deve essere :size kilobyte.",
    "size.numeric"=> ":Attribute deve essere :size.",
    "size.string"=> ":Attribute deve contenere :size caratteri.",
    "starts_with"=> ":Attribute deve iniziare con uno dei seguenti=> :values",
    "string"=> ":Attribute deve essere una stringa.",
    "throttle"=> "Troppi tentativi di accesso. Riprova tra :seconds secondi.",
    "throttled"=> "Per favore, attendi prima di riprovare.",
    "timezone"=> ":Attribute deve essere una zona valida.",
    "token"=> "Questo token di reset della password non è valido.",
    "unique"=> ":Attribute è stato già utilizzato.",
    "uploaded"=> ":Attribute non è stato caricato.",
    "url"=> "Il formato del campo :attribute non è valido.",
    "user"=> "Non riusciamo a trovare un utente con questo indirizzo email.",
    "uuid"=> ":Attribute deve essere un UUID valido.",

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
