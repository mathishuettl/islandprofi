
@extends('layouts.app')

@section('content')
  <div class="card">
    <form action="{{ isset($sightseeingspot) ? route('sightseeingspot.edit.submit', $sightseeingspot->id) : route('sightseeingspot.add.submit') }}" method="POST">
      @csrf
      <input type="hidden" name="type" value="App\SightseeingSpot" />

      @include('locations.base-form')

      <div class="flex">
        <div class="flex-1">
          <div class="form-group">
            <label for="title" class="label">Beschreibung</label>
            <div class="mt-1">
              <textarea name="description" id="description" class="input">{{ isset($sightseeingspot) ? $sightseeingspot->description : old('description') }}</textarea>
            </div>
          </div>
        </div>
        <div class="flex-1 ml-4">
          <div class="form-group">
            <label for="title" class="label">Kontaktinformation</label>
            <div class="mt-1">
              <textarea name="description" id="description" class="input">{{ isset($sightseeingspot) ? $sightseeingspot->description : old('description') }}</textarea>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="button primary">Speichern</button>
    </form>
  </div>

@endsection
