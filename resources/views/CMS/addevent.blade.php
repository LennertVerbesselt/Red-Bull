@include('CMS/cmsnav')
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Form</h1>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Add Event
                        </p>
                        <div class="leading-loose">
                            <form method="POST" action="{{ route('add_event') }}" class="p-10 bg-white rounded shadow-xl">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Event Name</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Event Name" aria-label="Name">
                                </div>

                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="message">Event Description</label>
                                    <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="Description" name="description" rows="6" required="" placeholder="Event Description" aria-label="Email"></textarea>
                                </div>

                                <div class="relative inline-block w-full text-gray-700">
                                    <label class=" block text-sm text-gray-600" for="message">Event Category</label>
                                    <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input" id="category" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                    </div>
                                  </div>

                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Admission Price</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="price" name="price" type="text" required="" placeholder="Price" aria-label="Name">
                                </div>

                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Event Location</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="location" name="location" type="text" required="" placeholder="Event Location" aria-label="Name">
                                </div>

                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Event Date/Time (y-m-d h:m:s)</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="date" name="datetime" type="text" required="" placeholder="Event Date/Time" aria-label="Name">
                                </div>

                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Available Tickets</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="availableTickets" name="availableTickets" type="text" required="" placeholder="Available Tickets" aria-label="Name">
                                </div>

                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Tickets Sold</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="ticketsSold" name="ticketsSold" type="text" required="" placeholder="Tickets Sold" aria-label="Name">
                                </div>
                                
                                <div class="mt-6">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Add Event</button>
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit"> <a href="{{route('overview')}}">Back to overview</a>  </button>
                                </div>
                            </form>
                        </div>
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