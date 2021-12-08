@extends('layouts.app')

@section('content')
  <div>
    <div class="card">
      <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap ">
        <div class="ml-4 mt-2">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Gemeinden
          </h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
          <a class="button primary" href="{{route('parish.add')}}">Gemeinde hinzufügen</a>
        </div>
      </div>
    </div>
    @if ($parishes)
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Titel
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Region
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach ($parishes as $parish)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$parish->title}}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <a href="{{ route('region.edit', $parish->region_id )}}" class="text-indigo-600 hover:text-indigo-900">{{$parish->region->title}}</a>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('parish.edit', $parish->id)}}" class="text-indigo-600 hover:text-indigo-900">Bearbeiten</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    @else
      <p>Keine Geminden gefunden</p>
    @endif
  </div>
@endsection
