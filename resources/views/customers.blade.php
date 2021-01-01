@extends('layouts.app')
@section('content')
    <div class="flex items-center mt-10">
        <div class="md:w-11/12 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Our Customers
                </div>

                <div class="w-full p-6">
                    @if($data->count() > 0)
                            <table class="text-left m-4" style="border-collapse:collapse">
                                <thead>
                                <tr>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">No..</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Name</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Email</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Phone</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Country</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Wallet</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Date</th>
                                    <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($data as $key => $value)
                                        <tr class="hover:bg-blue-lightest">
                                            <td class="py-4 px-6 border-b border-grey-light">{{$count++}}</td>
                                            <td class="py-4 px-6 border-b border-grey-light">{{$value->name}}</td>
                                            <td class="py-4 px-6 border-b border-grey-light">{{$value->email}}</td>
                                            <td class="py-4 px-6 border-b border-grey-light">{{$value->phone}}</td>
                                            <td class="py-4 px-6 border-b border-grey-light">{{$value->country}}</td>
                                            <td class="py-4 px-6 border-b border-grey-light">{{$value->wallet->count()}}</td>
                                            <td class="py-4 px-6 border-b border-grey-light">{{$value->created_at->diffForHumans()}}</td>
                                            <td class="py-4 px-6 border-b border-grey-light text-center">
                                                <div class="container text-center mx-auto p-5">
                                                    <div class="flex justify-center rounded-lg text-lg mb-4">
                                                        <a class="bg-blue-500 text-white hover:bg-blue-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">More </a> &nbsp
                                                        <a class="bg-pink-500 text-white hover:bg-pink-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">Edit </a> &nbsp
                                                        <form action="{{route('customer-destroy', $value->id)}}" method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button onclick="return confirm('Are you sure you want to delete this...?')" class="bg-red-500 text-white hover:bg-red-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">  Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    @else
                        {{'No customer '}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

