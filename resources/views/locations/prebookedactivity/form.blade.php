
@extends('layouts.app')

@section("heading")
  {{ isset($sightseeingspot) ? "Sightseeing Spot bearbeiten" : "Sightseeing Spot hinzufügen" }}
@endsection

@section('content')
  <div class="card">
    <form enctype="multipart/form-data" action="{{ isset($prebookedactivity) ? route('prebookedactivity.edit.submit', $prebookedactivity->id) : route('prebookedactivity.add.submit') }}" method="POST">
      @csrf
      <input type="hidden" name="type" value="App\PrebookedActivity" />

      @include('locations.base-form')

      <div class="flex">
        <div class="flex-1">
          <div class="form-group">
            <label for="ek" class="label">Einkaufspreis</label>
            <div class="mt-1">
              <input type="text" name="ek" id="ek" class="input" value="{{ isset($prebookedactivity) ? $prebookedactivity->ek : old('ek') }}">
            </div>
          </div>
        </div>
        <div class="flex-1 ml-4">
          <div class="form-group">
            <label for="vk" class="label">Verkaufspreis</label>
            <div class="mt-1">
              <input type="text" name="vk" id="vk" class="input" value="{{ isset($prebookedactivity) ? $prebookedactivity->vk : old('vk') }}">
            </div>
          </div>
        </div>
      </div>

      <div class="flex">
        <div class="flex-1">
          <div class="form-group">
            <label for="description" class="label">Beschreibung</label>
            <div class="mt-1">
              <textarea rows="6" name="description" id="description" class="input">{{ isset($prebookedactivity) ? $prebookedactivity->description : old('description') }}</textarea>
            </div>
          </div>
        </div>
        <div class="flex-1 ml-4">
          <div class="form-group">
            <label for="contact" class="label">Kontaktinformation</label>
            <div class="mt-1">
              <textarea rows="6" name="contact" id="contact" class="input">{{ isset($prebookedactivity) ? $prebookedactivity->description : old('description') }}</textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="flex">
        <div class="flex-1">
          <div class="form-group">
            <label for="information" class="label">Information</label>
            <div class="mt-1">
              <textarea rows="6" name="information" id="information" class="input">{{ isset($prebookedactivity) ? $prebookedactivity->information : old('information') }}</textarea>
            </div>
          </div>
        </div>
        <div class="flex-1 ml-4">
          <div class="form-group">
            <label for="bring" class="label">Mitzubringen</label>
            <div class="mt-1">
              <textarea rows="6" name="bring" id="bring" class="input">{{ isset($prebookedactivity) ? $prebookedactivity->bring : old('bring') }}</textarea>
            </div>
          </div>
        </div>
      </div>

      @include("locations.img-upload")
      <button type="submit" class="button primary">Speichern</button>
    </form>
  </div>

@endsection
