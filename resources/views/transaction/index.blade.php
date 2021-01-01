@extends('layouts.app')
@section('content')
    <div class="flex items-center mt-10">
        <div class="md:w-11/12 md:mx-auto">
            @include('layouts._partials._alert')
            @user
                <a href="{{route('transactions.create')}}" class="bg-green-400 text-white hover:bg-green-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">  Initiate Transaction</a> <br><br>

            @enduser
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    @user {{'My Transactions'}} @else {{"Customers Transactions"}}  @enduser
                </div>
                <div class="w-12/12 p-2">
                    @if($data->count() > 0)
                        <table class="text-left w-11/12 m-2" style="border-collapse:collapse">
                            <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">No..</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Wallet Name</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Currency</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Transactions</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>

                            @foreach($data as $key => $value)
                                <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">{{$count++}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$value->name}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$value->currency}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$value->transactions->count()}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">
                                        <div class="container text-center mx-auto p-5">
                                            <div class="flex justify-center rounded-lg text-lg mb-4">
                                                <a href="{{route('transactions.show', $value->id)}}" class="bg-blue-500 text-white hover:bg-blue-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">More</a> &nbsp
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        {{"You dont have a wallet yet create one"}}
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

