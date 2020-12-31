@if(count($errors) > 0)
    <div class="my-4 w-full sm:w-12/12 md:w-12/12 bg-red-lightest border-l-4 border-red py-2 px-4">
        <p class="font-bold">Error</p>
        <p>Something went wrong</p>
    </div>
@endif

@if($message = Session::get('success'))
    <div class="my-4 w-full sm:w-12/12 md:w-12/12 bg-green-500 border-l-4 border-green py-2 px-4">
        <p class="font-bold">Success</p>
        <p>{{$message}}</p>
    </div>
@endif

@if($message = Session::get('access-error'))
    <div class="my-4 w-full sm:w-12/12 md:w-12/12 bg-red-500 border-l-4 border-red py-2 px-4">
        <p class="font-bold">Error Reporting</p>
        <p>{{$message}}</p>
    </div>
@endif
