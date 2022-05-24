

@component('mail::message')
# Your password changed {{$user_name_for_mail  }}
@component('mail::panel')
Your information chnage!
@endcomponent
 

 
@component('mail::button', ['url' => 'sagor'])
test

@endcomponent
@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent
<br>
<br>
here is the link <a href="#" target="blank"> click here</a>
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent