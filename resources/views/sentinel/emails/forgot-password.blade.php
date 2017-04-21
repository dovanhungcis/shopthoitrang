<h1>Hello</h1>

<p>click vao links sau de reset lai mat khau
<a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">Click here!</a>
</p>