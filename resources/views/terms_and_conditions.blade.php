@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        <h1>Términos y Condiciones</h1>
        <h2>{!! config('constants.companyInfo.longName') !!}</h2>
        <hr>
        <p>
            Manifiesto que Autorizo de manera voluntaria, previa, explícita, informada e inequívoca a {!! config('constants.companyInfo.longName') !!} identificada con el NIT {!! config('constants.companyInfo.nit') !!} y domiciliada en Sincelejo en la siguiente dirección {!! config('constants.companyInfo.address') !!}, como responsable del tratamiento de mis datos personales, así mismo, autorizo a los encargados, y a todas las personas naturales o jurídicas que éste designe, para tratar mis datos personales de acuerdo con su Política de Tratamiento, para los fines relacionados con su objeto social y en especial para los siguientes fines:
        </p>
        <p>
            Para comunicar a sus grupos de interés información sobre sus servicios, eventos, publicaciones y publicidad sobre temas asociados a su objeto social.
        </p>
        <p>
            Para desarrollar el objeto social de Manufactura y Comercialización de prendas de vestir, en especial, las actividades propias de Manufactura y Comercialización de prendas de vestir y administración y arrendamiento de propiedad raíz.
        </p>
        <p>
            Desarrollar el objeto social de {!! config('constants.companyInfo.longName') !!}, conforme a sus estatutos sociales, incluidas las gestiones propias de: Evaluación y análisis de riesgos – financiera y administrativa, crédito, cartera y cobranza, clientes, proveedores, talento humano, seguridad en las instalaciones, abastecimiento, servicio al cliente, tecnologías de la información.            
        </p>
        <p>
            Para el cumplimiento de las obligaciones derivadas de las relaciones contractuales existentes con sus grupos de interés
        </p>
        <p>
            Para conocer de manera prospectiva las necesidades de sus grupos de interés con el fin de innovar en la prestación de sus servicios.
        </p>
        <p>
            Para mantener contacto y comunicación constante a cerca de: Programas de fidelización, estrategias de mercadeo y publicidad, estrategias comerciales y de servicio al cliente, estrategias de crédito y cobranza, actividades propias de la administración del talento humano o relaciones laborales.
        </p>
        <p>
            Para cumplir con leyes o normatividad aplicable al negocio en Colombia y para cumplir lo dispuesto por el ordenamiento jurídico colombiano en materia laboral y de seguridad social, entre otras, aplicables a empelados, ex empleados, empleados en misión, empleados temporales, empleados actuales y candidatos a futuro empleo.            
        </p>
        <p>
            Para hacer tratamiento de los datos a través de cualquiera de nuestros canales de comunicación, incluidas las redes sociales y pagina web.
        </p>
        <p>
            Para envío de notificaciones y avisos
        </p>
        <p>
            Para crear bases de datos (incluyendo bases de datos respecto de bases de datos sensibles) para fines relacionados con el objeto social de {!! config('constants.companyInfo.longName') !!}
        </p>
        <p>
            Para crear bases de datos para fines de investigación y desarrollo de nuevos productos o servicios, así como para estudios de riesgo y demás actividades similares.
        </p>
        <p>
            Para informar sobre nuevos servicios, sedes y horarios.
        </p>
        <p>
            Conozco que mis datos personales registrados en las bases de datos son necesarios para el desarrollo del objeto social del responsable, y son, entre otros: Nombres y apellidos completos, identificación, dirección, teléfonos, correos electrónicos. En todo caso, en cualquier momento y de acuerdo con la ley 1581 de 2012, puedo revocar el consentimiento y ejercer mi derecho a la supresión de datos personales, teniendo como prioridad las obligaciones legales o contractuales si las hubiere.            
        </p>
        <p>            
            Reconozco que {!! config('constants.companyInfo.longName') !!} me informó que son facultativas las respuestas a las preguntas que me han hecho o me harán sobre datos personales sensibles y en consecuencia no he sido obligado a responderlas, así mismo se me informó que es facultativa la entrega de documentación que contenga datos personales sensibles y en consecuencia no he sido obligado a entregarla, por lo tanto autorizo expresamente para que se lleve a cabo el tratamiento de mis datos sensibles. Del mismo modo, reconozco que {!! config('constants.companyInfo.longName') !!} me informó que son facultativas las respuestas a las preguntas que me han hecho o me harán sobre datos personales de niñas, niños y adolescentes, y en consecuencia no he sido obligado a responderlas, así mismo se me informó que es facultativa la entrega de documentación que contenga datos personales de niñas, niños y adolescentes, y en consecuencia no he sido obligado a entregarla, por lo tanto autorizo expresamente para que se lleve a cabo su tratamiento. Autorizo expresamente al responsable, la transferencia internacional de información a terceros países, en caso de ser necesario para el cumplimiento del tratamiento.
        </p>
        <p>
            Me comprometo a conocer los términos y condiciones disponibles en la página web {!! env('APP_URL') !!}. Así mismo, Autorizo a {!! config('constants.companyInfo.longName') !!} para modificar o actualizar su contenido, a fin de atender reformas legislativas, políticas internas o nuevos requerimientos para la prestación u ofrecimiento de servicios o productos, dando aviso previo a través de la página web o de cualquier canal de comunicación. La presente autorización la he suministrado de forma voluntaria y es verídica.
        </p>
        <div class="text-center">
            <a href="{{ route('welcome') }}" class="btn btn-secondary">Ir al inicio</a>
        </div>
    </div>
    <hr>
    <br>
@endsection