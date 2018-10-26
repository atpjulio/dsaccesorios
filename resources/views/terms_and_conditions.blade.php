@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        <h1>Términos y Condiciones: {!! config('constants.companyInfo.longName') !!}</h1>
        <h2>Subtítulo</h2>
        <hr>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, doloremque earum nostrum numquam quo sapiente? A cumque earum harum ipsam nisi numquam qui quos, reiciendis saepe vero. Natus perspiciatis, voluptatibus. A accusamus adipisci consectetur corporis, deserunt expedita fuga hic inventore laboriosam molestiae nulla quia quo sequi tempore temporibus ullam vitae?
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, doloremque earum nostrum numquam quo sapiente? A cumque earum harum ipsam nisi numquam qui quos, reiciendis saepe vero. Natus perspiciatis, voluptatibus. A accusamus adipisci consectetur corporis, deserunt expedita fuga hic inventore laboriosam molestiae nulla quia quo sequi tempore temporibus ullam vitae?
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, doloremque earum nostrum numquam quo sapiente? A cumque earum harum ipsam nisi numquam qui quos, reiciendis saepe vero. Natus perspiciatis, voluptatibus. A accusamus adipisci consectetur corporis, deserunt expedita fuga hic inventore laboriosam molestiae nulla quia quo sequi tempore temporibus ullam vitae?
        </p>
        <div class="text-center">
            <a href="{{ route('welcome') }}" class="btn btn-secondary">Ir al inicio</a>
        </div>
    </div>
    <hr>
    <br>
@endsection