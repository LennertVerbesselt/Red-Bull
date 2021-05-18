

    
    @include('CMS/cmsnav')
        
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">


                

                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Users
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Username
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        First Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Last Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        E-Mail
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Total Cans Scanned
                                    </th>

                                    

                                    @foreach ($categories as $category)
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            {{$category->category_name}}
                                        </th>
                                    @endforeach

                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                @php
                                    foreach ($profiles as $profile) {
                                        if ($profile->user_id === $user->id){
                                            $current_profile = $profile;
                                        };
                                    };

                                    foreach ($profile_statistics as $profile_stat) {
                                        if ($profile_stat->user_id === $user->id){
                                            $current_profile_stat = $profile_stat;
                                        };
                                    };
                                    
                                    foreach ($profile_pictures as $profile_picture) {
                                        if ($profile_picture->user_id === $user->id){
                                            $current_profile_picture = $profile_picture;
                                        };
                                    }; 
                                

                                    
                                @endphp

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-full h-full rounded-full"
                                                        src="{{$current_profile_picture->url}}"
                                                        alt="" />
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$current_profile->username}}
                                                    </p>
                                                </div>
                                                
                                            </div>
                                            <a href="{{route('view_upload_profile_picture')}}"> <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded mt-6" type="submit">Upload Profile Picture</button></a>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$current_profile->first_name}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$current_profile->last_name}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$user->email}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$current_profile_stat->total_cans_scanned}}
                                            </p>
                                        </td>
                                    

                                    @foreach ($categories as $category)
                                        @php

                                        foreach ($currency_points as $currency) {
                                            if ($currency->user_id === $user->id && $currency->category_id === $category->category_id){
                                                $current_currency = $currency;
                                            };
                                        };
                                            
                                        @endphp
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$current_currency->points}}
                                            </p>
                                        </td>
                                    @endforeach
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