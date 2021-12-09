<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <div id="app">
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
      <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
          <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-8 w-auto" src="{{url('/logo.png')}}" alt="Islandprofi">
          </div>
          <nav class="mt-5 flex-1 px-2 bg-white space-y-1">
            <a href="{{route('regions')}}" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
            </svg>
            Regionen
            </a>

            <a href="{{route('parishes')}}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
              </svg>
              Gemeinden
            </a>

            <a href="{{route('sightseeingspots.index')}}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
              </svg>
              Sightseeing Spots
            </a>
          </nav>
        </div>
      </div>
    </div>
    <div class="md:pl-64 flex flex-col flex-1">
      <main class="flex-1">
        <div class="py-6">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900 mb-4">@yield("heading")</h1>
          </div>
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            @if(Session::has("alert"))
              <div class="alert {{ Session::get('alert')['type'] }}">
                {{ Session::get("alert")["message"] }}
              </div>
            @endif

            @if($errors->any())
              <div class="alert danger">
                @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
                @endforeach
              </div>
            @endif

            @yield("content")
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
