@extends('layouts.app')

@section('content')
  <div>
    <div class="card">
      <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap ">
        <div class="ml-4 mt-2">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Prebooked Activities
          </h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
          <a class="button primary" href="{{route('prebookedactivity.add')}}">hinzufügen</a>
        </div>
      </div>
    </div>
    @if ($prebookedactivities)

      @section("location_table_body")
        @foreach ($prebookedactivities as $prebookedactivity)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ $prebookedactivity->location->external_id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ $prebookedactivity->location->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <a href="{{ route('region.edit', $prebookedactivity->location->parish->region->id) }}" class="text-indigo-600 hover:text-indigo-900">
                {{ $prebookedactivity->location->parish->region->title }}
              </a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <a href="{{ route('parish.edit', $prebookedactivity->location->parish->id )}}" class="text-indigo-600 hover:text-indigo-900">
                {{ $prebookedactivity->location->parish->title }}
              </a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a href="{{route('prebookedactivity.edit', $prebookedactivity->id)}}" class="text-indigo-600 hover:text-indigo-900">Bearbeiten</a>
            </td>
          </tr>
        @endforeach
      @endsection

      @include("locations.table")
    @else
      <p>Keine Prebooked Activities gefunden</p>
    @endif
  </div>
@endsection
