<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/output.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Dashboard Admin</title>
    {{-- <style>
       
        body {
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            transition: width 0.3s;
        }
        .sidebar:hover {
            width: 250px;
        }
        .sidebar a {
            transition: background-color 0.3s;
        }
     
    </style> --}}
</head>
<body class="bg-gray-50">
    <div class="flex">
      <aside class="w-64 bg-blue-600 shadow-lg h-screen text-white">
        <div class="p-4">
          <h1 class="text-xl font-bold">Dashboard</h1>
        </div>
        <nav class="mt-6">
          <ul>
            {{-- <li class="p-4 hover:bg-blue-300"><a href="/dashhome">Home</a></li> --}}
            <li class="p-4 hover:bg-blue-300"><a href="/dashupload">Gallery</a></li>
            <li class="p-4 hover:bg-blue-300"><a href="/dashpesan">Messages</a></li>
            <li class="p-4 hover:bg-blue-300"><a href="#">Feedback</a></li>
          </ul>
        </nav>
      </aside>
  
      <main class="flex-1 p-6">
        <header class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
          <div class="flex items-center space-x-4">
            @auth
              <a class="text-red-600 hover:underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            @endauth
          </div>
        </header>
        {{ $slot }}
      </main>
    </div>
  </body>
  
</html>
