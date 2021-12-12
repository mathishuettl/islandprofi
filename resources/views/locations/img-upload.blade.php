<div class="mb-4">
  <label for="images" class="button primary">
    <input id="images" name="images[]" type="file" class="hidden" multiple />
    Bilder auswählen
  </label>

  @if (isset($images))
    <uploaded-images :images="{{ json_encode($images) }}" />
  @endif
</div>
