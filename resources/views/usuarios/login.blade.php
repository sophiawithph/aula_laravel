<div style="border:1px solid rgb(0,0,0,0.8); width:50%; margin:0 auto; text-aling:center;  ">
<h1>Login</h1>
@if (session('erro'))
<div>{{ session('erro')}}</div>
@endif

<form action="{{ url()->current()}}" method="post"  >
    @csrf
<input type="email" name="email" placeholder="email:">
<br>
<input type="password" name="password" placeholder="Senha:">
<br>
<input type="submit" value="Entrar">
</form>
</div>
