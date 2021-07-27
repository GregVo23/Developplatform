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

          <!--end menu with profil-->

              <div class="max-w-full">
                <div class="max-w-full">

                  <div class="container bg-white w-full">

                          @if(empty($personalUserPage))
                              @include('partials.project')
                          @else
                              @include('myprofile')
                          @endif

                  </div>
                </div>
              </div>
        </main>

    </x-app-layout>

