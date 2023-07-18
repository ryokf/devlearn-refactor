 @extends('author.layout')

 @section('body')
     <div class="relative md:ml-72 bg-blueGray-50">
         <x-author_header />
         <div class="relative bg-primary md:pt-32 pb-32 pt-12">
         </div>
         <section class="relative py-16 bg-blueGray-200 mt-24">
             <div class="container px-4 mx-auto">
                 <div class="relative flex flex-col w-full min-w-0 mb-6 -mt-64 break-words bg-white rounded-lg shadow-xl">
                     <div class="px-6">
                         <div class="flex flex-wrap justify-center">
                             <div class="flex justify-center w-full px-4 lg:w-3/12 lg:order-2">
                                 {{-- <div class="relative"> --}}
                                 <img alt="foto " src="{{ asset(auth()->user()->photo)  }}"
                                     class="absolute h-40 w-40 -m-16 -ml-20 align-middle border-none rounded-full shadow-xl lg:-ml-16 max-w-150-px" />
                                 {{-- </div> --}}
                             </div>
                             <div class="w-full px-4 lg:w-4/12 lg:order-3 lg:text-right lg:self-center">
                                 <div class="px-3 py-6 mt-32 sm:mt-0">
                                     <a href="/author/profile-edit"
                                         class="px-4 py-2 mb-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-primary rounded shadow outline-none active:bg-primary hover:shadow-md focus:outline-none sm:mr-2"
                                         type="button">
                                         Edit Profile
                                     </a>
                                 </div>
                             </div>
                             <div class="w-full px-4 lg:w-4/12 lg:order-1">
                                 <div class="flex justify-center py-4 pt-8 lg:pt-4">
                                     <div class="p-3 mr-4 text-center">
                                         <span
                                             class="block text-xl font-bold tracking-wide uppercase text-blueGray-600">10</span><span
                                             class="text-sm text-blueGray-400">Course completed</span>
                                     </div>
                                     <div class="p-3 text-center lg:mr-4">
                                         <span
                                             class="block text-xl font-bold tracking-wide uppercase text-blueGray-600">89</span><span
                                             class="text-sm text-blueGray-400">Certificate</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="mt-12 text-center">
                             <h3 class="mb-2 text-4xl font-semibold leading-normal text-blueGray-700">
                                 {{ auth()->user()->username }}
                             </h3>
                             <div class="mt-0 mb-2 text-sm font-bold leading-normal uppercase text-blueGray-400">
                                <i class="fa-solid fa-user-gear"></i>
                                 {{ auth()->user()->roles[0]['name']}}
                             </div>
                             <div class="mt-10 mb-2 text-blueGray-600">
                                 <i
                                     class="mr-2 text-lg fas fa-briefcase text-blueGray-400"></i>{{ auth()->user()->occupation }}
                             </div>
                             <div class="mb-2 text-blueGray-600">
                                 <i
                                     class="mr-2 text-lg fas fa-university text-blueGray-400"></i>{{ auth()->user()->office }}
                             </div>
                         </div>
                         <div class="py-10 mt-10 text-center border-t border-blueGray-200">
                             <div class="flex flex-wrap justify-center">
                                 <div class="w-full px-4 lg:w-9/12">
                                     <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                         {{ auth()->user()->bio ?? '-' }}
                                     </p>
                                     <a href="#pablo" class="font-normal text-primary">Show more</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>

     </body>
     <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
     <script>
         /* Make dynamic date appear */
         (function() {
             if (document.getElementById("get-current-year")) {
                 document.getElementById("get-current-year").innerHTML =
                     new Date().getFullYear();
             }
         })();
         /* Function for opning navbar on mobile */
         function toggleNavbar(collapseID) {
             document.getElementById(collapseID).classList.toggle("hidden");
             document.getElementById(collapseID).classList.toggle("block");
         }
         /* Function for dropdowns */
         function openDropdown(event, dropdownID) {
             let element = event.target;
             while (element.nodeName !== "A") {
                 element = element.parentNode;
             }
             Popper.createPopper(element, document.getElementById(dropdownID), {
                 placement: "bottom-start"
             });
             document.getElementById(dropdownID).classList.toggle("hidden");
             document.getElementById(dropdownID).classList.toggle("block");
         }
     </script>
 @endsection
