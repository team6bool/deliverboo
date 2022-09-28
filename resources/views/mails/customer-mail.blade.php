@component('mail::message')
  Gentile <strong>{{ $user->name }}</strong>,

  Il suo ordine è stato confermato, grazie per aver scelto noi!

  Per accedere al proprio account, può cliccare sul seguente pulsante:

  @component('mail::button', ['url' => route('login')])
    Accedi
  @endcomponent

  Cordiali saluti,<br>
  Team 6
@endcomponent
