'rson/Organization) Flat Number / Town',
TextInput::make('holding')
->numeric()
->rules(['required', 'integer']),
TextInput::make('name_of_house')
->rules(['required', 'string', 'max:50']),
TextInput::make('name_of_street')
->rules(['required', 'string', 'max:50']),
TextInput::make('number_of_street')
->numeric()
->rules(['required', 'integer']),
TextInput::make('name_of_village')
->rules(['required', 'string', 'max:50']),
