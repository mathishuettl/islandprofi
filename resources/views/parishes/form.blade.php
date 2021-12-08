
@extends('layouts.app')

@section("heading")
  {{ isset($parish) ? "Gemeinde bearbeiten" : "Gemeinde hinzufügen" }}
@endsection

@section('content')
  <div class="card">
    <form action="{{ isset($parish) ? route('parish.edit.submit', $parish->id) : route('parish.add.submit') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="region_id" class="label">Region</label>
        <div class="mt-1">
          <select name="region_id" id="region_id" class="input">
            @foreach ($regions as $region)
              <option value="{{ $region->id }}" {{ isset($parish) && $parish->region_id === $region->id ? "selected" : null }}>{{$region->title}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="title" class="label">Titel</label>
        <div class="mt-1">
          <input type="text" name="title" id="title" class="input" value="{{ isset($parish) ? $parish->title : old('title') }}">
        </div>
      </div>

      <button type="submit" class="button primary">{{ isset($parish) ? 'Gemeinde aktualisieren' : 'Gemeinde speichern'}}</button>
    </form>
  </div>


  @if(isset($parish))
    @include("parishes.location-table")
  @endif
@endsection
