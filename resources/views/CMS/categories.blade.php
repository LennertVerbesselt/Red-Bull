<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl border-r-4 border-color-yellow">
        <div class="p-6">
            <a href="{{route('overview')}}" class="text-white text-3xl font-semibold uppercase hover:text-white">Red Bull CMS</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('overview')}}" class="flex items-center text-white hover:opacity-100 opacity-75 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{route('users')}}" class="flex items-center text-white opacity-75  hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-users mr-3"></i>
                Users
            </a>
            <a href="{{route('categories')}}" class="flex items-center active-nav-link text-white  hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Categories
            </a>
            <a href="{{route('events')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar-day mr-3"></i>
                Events
            </a>
            <a href="{{route('challenges')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-trophy mr-3"></i>
                Challenges
            </a>
            <a href="{{route('posts')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-hashtag mr-3"></i>
                Posts
            </a>
        </nav>
        
    </aside>
        

        
        
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">

                <div class="w-6/12 mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Categories
                        <button class="text-xs ml-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="{{ route('view_add_category')}}"> Add Category </a>
                          </button>
                    </p>
                    
                    
                    <div class="bg-white overflow-auto"> 
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Category id
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Category
                                    </th>
                                
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$category->category_id}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$category->category_name}}</p>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        
                    </div>
                    
                </div>
            </main>
    
            
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>