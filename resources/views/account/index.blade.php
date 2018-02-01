<h2>Wellcome, {{ \Illuminate\Support\Facades\Auth::user()->email }}</h2>
<hr>

<br>
@if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
    <a href="{{ route('admin') }}">To Admins panel</a><br>
@endif
<a href="{{ route('logout') }}">Out</a>