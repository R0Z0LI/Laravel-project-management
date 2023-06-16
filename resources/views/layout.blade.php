<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#ef3b2d',
            },
          },
        },
      }
  </script>
  <title>Project Management</title>
</head>

<body class="mb-48">
<nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo" /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
      <li>
        <span class="font-bold uppercase">
          Welcome 
        </span>
      </li>
      <li>
        <a href="/" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Dashboard</a>
      </li>
      <li>
        <a href="/users" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Users</a>
      </li>
      <li>
        <a href="/tasks" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Tasks</a>
      </li>
      <li>
        <a href="/projects" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Projects</a>
      </li>
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-door-closed"></i> Logout
          </button>
        </form>
      </li>

    </ul>
  </nav>
  @yield('content')
  
</body>

</html>