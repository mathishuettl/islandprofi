<div class="form-group">
  <label for="{{$name}}" class="label">{{$label}}</label>
  <div class="mt-1">
    <input type="text" name="{{$name}}" id="{{$name}}" class="input" value="{{ isset($location) ? $location->$name : old($name) }}">
  </div>
</div>
