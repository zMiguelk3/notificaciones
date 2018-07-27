@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
      
        <p class="lead">Lista de Notificaciones Recibidas</p>
        <hr class="m-y-md">
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6 mt-3">
             <h6>Notificaciones  No Leídas</h6>
            <hr>
            <ul class="list-group" id="unreadNotifications">
                @foreach ($unreadNotifications as $unreadNotification)
                    <li class="list-group-item " >
                        <div class="row">
                            <a  class="col-9 col-sm-9" 
                                href="{{$unreadNotification->data['link']}}">
                                {{$unreadNotification->data['texto']}}
                            </a>
                            <form action="{{ route('notificaciones.update',$unreadNotification->id) }}" method="POST" class="col-2 col-sm-2">
                                @csrf
                                {{ method_field('PUT')}}
                                <button class="btn btn-danger">x</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
         <div class="col-sm-6 mt-3">
            <h6>Notificaciones  Leídas</h6>
            <hr>
            <ul class="list-group">
                @foreach ($readNotifications as $readNotification)
                    <li class="list-group-item">
                        <div class="row">
                            <p class="col-8 col-sm-8">{{$readNotification->data['texto']}}</p>

                            <form action="{{ route('notificaciones.destroy',$readNotification->id) }}" method="POST" class="col-4 col-sm-4">
                                @csrf
                                {{ method_field('delete')}}
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    <hr>
                    <small> {{ $readNotification->data['contenido'] }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
