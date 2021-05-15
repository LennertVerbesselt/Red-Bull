@include('CMS/cmsnav')

        
        
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">

                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> QR Codes
                        <button class="text-xs ml-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href=""> Generate QR Codes </a>
                          </button>
                    </p>
                    
                    
                    <div class="overflow-auto"> 
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr class="bg-color">
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Qr Code
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Qr Code id
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Qr Code Value
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Qr Code Scanned
                                    </th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataUri as $qrcode)
                                <tr>
                                    
                                    <td class="px-5 py-5 border-b border-gray-200 bg-color text-sm">                 
                                            <img src="{{$qrcode[3]}}" width="150" height="150">
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-color  text-sm">
                                        <p class="text-white whitespace-no-wrap">{{$qrcode[0]}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-color  text-sm">
                                        <p class="text-white whitespace-no-wrap">{{$qrcode[1]}}</p>
                                    </td>
                                    @if ($qrcode[2])
                                    <td class="px-5 py-5 border-b border-gray-200 bg-color  text-sm">
                                        <p class="text-white whitespace-no-wrap">True</p>
                                    </td>
                                    @else 
                                    <td class="px-5 py-5 border-b border-gray-200 bg-color  text-sm">
                                        <p class="text-white whitespace-no-wrap">False</p>
                                    </td>
                                    @endif
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