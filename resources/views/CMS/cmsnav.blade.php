
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=400px">
    <title>Red Bull CMS</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: Berthold Akzidenz; }
        .bg-sidebar { background: #121426; }
        .bg-color { background-color: #121426; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #EB5876; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #EB5876; }
        .nav-item:hover { background: #EB5876; }
        .account-link:hover { background: #3d68ff; }
        .border-color-yellow { border-color: #FFF07C; }
    </style>
</head>
<body class=" font-family-karla flex">
    
    @if(!Auth::user() || Auth::user()->admin == 0)
    <script type="text/javascript">
        window.location = "https://red-bull.herokuapp.com";
    </script>
    @endif
    
    
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl border-r-4 border-color-yellow">
    <div class="p-6">
        <a href="{{route('overview')}}" class="text-white text-3xl font-semibold uppercase hover:text-white">Red Bull CMS</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{route('overview')}}" class=" {{ (request()->is('CMS')) ? 'active-nav-link' : '' }} flex items-center text-white py-4 pl-6 nav-item hover:opacity-100">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{route('users')}}" class="{{ (request()->is('CMS/users')) ? 'active-nav-link' : '' }} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-users mr-3"></i>
            Users
        </a>
        <a href="{{route('categories')}}" class="{{ (request()->is('CMS/categories')) ? 'active-nav-link' : '' }} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Categories
        </a>
        <a href="{{route('events')}}" class="{{ (request()->is('CMS/events')) ? 'active-nav-link' : '' }} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-calendar-day mr-3"></i>
            Events
        </a>
        <a href="{{route('challenges')}}" class="{{ (request()->is('CMS/Challenges')) ? 'active-nav-link' : '' }} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-trophy mr-3"></i>
            Challenges
        </a>
        <a href="{{route('posts')}}" class="{{ (request()->is('CMS/posts')) ? 'active-nav-link' : '' }} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-hashtag mr-3"></i>
            Posts
        </a>
        <a href="{{route('qrcodes')}}" class="{{ (request()->is('CMS/QR')) ? 'active-nav-link' : '' }} flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-qrcode mr-3"></i>
            QR Codes
        </a>
    </nav>
    
</aside>

