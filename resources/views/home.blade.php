@extends('layouts.app')

@section('content')
                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://www.turkticaret.net/" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <img src="{{ asset('faviconphoto.jpg') }}" alt="Turkticaret.net">   
                            Turkticaret.net
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Turkticaret Bank
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
