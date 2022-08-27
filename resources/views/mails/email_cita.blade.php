<h1 class="text-center font-bold">Has reservado una cita en BarberApps</h1>
<p class=""> Estimado: <span class="font-bold">{{auth()->user()->name}}</span></p>
<p >Has reservado estos servicios:</p>
@foreach ($citas as $cita )
<p>Servicio: {{$cita->servicios->nombre}}    Fecha: {{$cita->fecha_cita}}  Hora: {{$cita->hora_cita}}:00</p>
@endforeach