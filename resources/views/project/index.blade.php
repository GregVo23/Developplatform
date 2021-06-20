<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
        <!--content-->
        <style>
          .tab-component {
          height: 400px;
          max-height: 400px;
          overflow: hide;
          }
    
          .tab-contents {
          height: 358px;
          overflow: auto;
          }
    
          th, tr, td {
          border: 1px solid lightgray;
          }
          td {
          padding-left: 4px;
          padding-right: 4px;
          }
    
          /**/
          .ease-in {
            transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
          }
          .ease-out {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
          }
          .ease-in-out {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
          }
    
          .transition-fastest {
            transition-duration: 75ms;
          }
          .transition-faster {
            transition-duration: 100ms;
          }
          .transition-fast {
            transition-duration: 150ms;
          }
          .transition-medium {
            transition-duration: 200ms;
          }
          .transition-slow {
            transition-duration: 300ms;
          }
          .transition-slower {
            transition-duration: 500ms;
          }
          .transition-slowest {
            transition-duration: 700ms;
          }
    
          .transition-all {
            transition-property: all;
          }
          .transition-opacity {
            transition-property: opacity;
          }
          .transition-transform {
            transition-property: transform;
          }
    
          .focus-visible.focus-visible\:underline {
            text-decoration: underline;
          }
    
          </style>
        <main
            class="flex-1 bg-transparant dark:bg-gray-900 overflow-y-auto transition
            duration-500 ease-in-out">
    
        <!--Profil + content-->
            <div class="px-2 py-6 text-gray-700 dark:text-gray-500 transition duration-500 ease-in-out">
          <!--Menu profil + links -->
          <div class="mt-1 mb-4 flex items-center justify-between">
              <!--profil-->
              <div class="inline-flex">
                  <div class="mr-5">
                      <div class="w-24 h-24 relative mb-4">
                          <div class="group w-full h-full rounded-full overflow-hidden shadow-inner text-center bg-purple table cursor-pointer">
                          @if(!empty( "{{ $user->avatar }}" ))
                            <img src="{{ $user->avatar }}" alt="profile image" style="object-fit:cover;">
                          @else
                            <span class="hidden group-hover:table-cell text-white font-bold align-middle">KR</span>
                            <i class="fas fa-user fa-6x object-cover object-center w-full h-full visible group-hover:hidden"></i>
                          @endif
                          </div>
                      </div>
                  </div>
                  <div>
                      <h2 class="text-4xl font-medium capitalize">{{ Auth::user()->firstname }}</h2>
                      <p class="text-lg font-bold">{{ Auth::user()->lastname }}</p>
                      <p class="text-lg">Level {{ Auth::user()->level }}</i></p>
                  </div>
              </div>
    
              <!--Project link-->
              <div class="items-center select-none">
                  <a href="{{ route('projects') }}">
                      <div class="flex items-center select-none">
                          <i class="far fa-handshake fa-3x"></i>
                      </div>
                      <p class="flex items-center">Mes projets</p>
                  </a>
              </div>
    
              <!--Project link-->
              <div class="items-center select-none">
                  <a href="#">
                      <div class="flex items-center select-none">
                          <i class="far fa-star fa-3x"></i>
                      </div>
                      <p class="flex items-center">Favoris</p>
                  </a>
              </div>
    
              <!--Project link-->
              <div class="items-center select-none">
                  <a href="#">
                      <div class="flex items-center select-none">
                          <i class="far fa-arrow-alt-circle-down fa-3x"></i>
                      </div>
                      <p class="flex items-center">Catégories</p>
                  </a>
              </div>
                </div>
          <!--end menu with profil-->
    
                <div class="max-w-full">
                    <div class="max-w-full">
    
                    <div class="container bg-white w-full">    

                            @if(empty($personalUserPage))
                                @include('partials.project')
                            @else
                                @include('myprofile')
                            @endif
    
                <!--Projects-->
    
                <div class="border dark:border-gray-700 transition duration-500 ease-in-out">
          </div>
    
            </div>
    
        </main>
    
        <div id="app">
    
            <div class="text-center" style="color:black; font-size:2.5em; margin-top: 35vh; transform: translateY(-40%);">
                <hello-world/>
            </div>
    
        </div>
    
    
        <div id="app2">
            <div>
                <formulaire/>
            </div>
        </div>
    
    
        <div id="app3">
            <div>
                <countries/>
            </div>
        </div>
    
    
    </x-app-layout>
    



                    <!--($projects[0]->user[0]->pivot->price)-->
                    <!--($projects[0]->category[0]->pivot)-->
