@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')
    
    <div class="col-md-6 offset-md-3" id="event-create-container">
        <h1>Editando: {{ $event->title }}</h1>
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Imagem do evento:</label>
                <input type="file" name="image" class="form-control-file" id="image">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>            
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado?</label>
                <select class="form-control" id="private" name="private">
                    <option value="0">Não</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras" {{ in_array('Cadeiras', $event->items) ? "checked" : "" }}> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco" {{ in_array('Palco', $event->items) ? "checked" : "" }}> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes" {{ in_array('Brindes', $event->items) ? "checked" : "" }}> Brindes
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Bar" {{ in_array('Open Bar', $event->items) ? "checked" : "" }}> Open Bar
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </form>
    </div>

@endsection
