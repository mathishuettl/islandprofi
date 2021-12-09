<form class="flex items-end mb-4">
  <div>
    <label for="region_id" class="label">Nach Typ filtern</label>
    <div class="mt-1">
      <select name="type" id="region_id" class="input">
        @foreach ($regions as $region)
          <option value="">Alle</option>
          <option value="App\SightseeingSpot" {{ isset($_GET['type']) && $_GET['type'] === 'App\SightseeingSpot' ? 'selected' : '' }}>Sightseeing Spots</option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="button ml-4">Filtern</button>
</form>

<div class="flex">
  <div class="w-1/3">
    <google-map :locations="{{$locations}}"></google-map>
  </div>
  <div>
    <div class="flex flex-col ml-4">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nr.
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Typ
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($locations as $location)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{$location->external_id}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{$location->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{$location->niceType()}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="{{ $location->getSpotEditLink() }}" class="text-indigo-600 hover:text-indigo-900">Bearbeiten</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
