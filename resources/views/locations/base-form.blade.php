<div class="form-group">
  <label for="parish_id" class="label">Gemeinde</label>
  <div class="mt-1">
    <select name="parish_id" id="parish_id" class="input">
      @foreach($parishes as $parish)
        <option value="{{$parish->id}}">{{$parish->title}}</option>
      @endforeach
    </select>
  </div>
</div>

@include("locations.input", ["name" => "external_id", "label" => "Nr."])
@include("locations.input", ["name" => "name", "label" => "Name"])
@include("locations.input", ["name" => "address", "label" => "Adresse"])

<div class="flex">
  <div class="w-1/4">
    @include("locations.input", ["name" => "zip", "label" => "PLZ"])
  </div>
  <div class="flex-1 ml-4">
    @include("locations.input", ["name" => "city", "label" => "Ort"])
  </div>
</div>

<div class="form-group">
  <label for="4x4_required" class="flex items-center">
    <input type="checkbox" name="4x4_required" id="4x4_required" />
    <span class="ml-4">4x4 Empfohlen</span>
  </label>
</div>

<div class="flex">
  <div class="flex-1">
    @include("locations.input", ["name" => "lat", "label" => "Latitude"])
  </div>
  <div class="flex-1 ml-4">
    @include("locations.input", ["name" => "lng", "label" => "Longitude"])
  </div>
</div>
