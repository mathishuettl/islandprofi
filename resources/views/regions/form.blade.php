
@extends('layouts.app')

@section("heading")
  {{ isset($region) ? "Region bearbeiten" : "Region hinzufügen" }}
@endsection

@section('content')
  <div class="card">
    <form action="{{ isset($region) ? route('region.edit.submit', $region->id) : route('region.add.submit') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="title" class="label">Titel</label>
        <div class="mt-1">
          <input type="text" name="title" id="title" class="input" value="{{ isset($region) ? $region->title : old('title') }}">
        </div>
      </div>

      <button type="submit" class="button primary">{{ isset($region) ? 'Region aktualisieren' : 'Region speichern'}}</button>
    </form>
  </div>

@endsection
