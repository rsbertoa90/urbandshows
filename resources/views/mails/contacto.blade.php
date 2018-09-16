@extends('mails.base')

@section('content')
    <div>
        <h2>Mensaje desde: Contacto</h2>

        <ul>
            <li>Nombre: {{$name}}  </li>
            <li>Email: {{$mail}}  </li>
            <li>Asunto: {{$subject}}  </li>
            <li>Mensaje: {{$msg}}  </li>
        </ul>
    </div>
@endsection