@extends('layouts.app')

@section('content')
  <div>
    <div class="card">
      <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap ">
        <div class="ml-4 mt-2">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Sightseeing Spots
          </h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
          <a class="button primary" href="{{route('sightseeingspot.add')}}">hinzufügen</a>
        </div>
      </div>
    </div>
    @if ($sightseeingspots)

      @section("location_table_body")
        @foreach ($sightseeingspots as $sightseeingspot)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ $sightseeingspot->location->external_id }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ $sightseeingspot->location->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <a href="{{ route('region.edit', $sightseeingspot->location->parish->region->id) }}" class="text-indigo-600 hover:text-indigo-900">
                {{ $sightseeingspot->location->parish->region->title }}
              </a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              <a href="{{ route('parish.edit', $sightseeingspot->location->parish->id )}}" class="text-indigo-600 hover:text-indigo-900">
                {{ $sightseeingspot->location->parish->title }}
              </a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a href="{{route('sightseeingspot.edit', $sightseeingspot->id)}}" class="text-indigo-600 hover:text-indigo-900">Bearbeiten</a>
            </td>
          </tr>
        @endforeach
      @endsection

      @include("locations.table")
    @else
      <p>Keine Sightseeing-Spots gefunden</p>
    @endif
  </div>
@endsection
