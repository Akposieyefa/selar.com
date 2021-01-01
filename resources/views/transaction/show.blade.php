@extends('layouts.app')
@section('content')
    <div class="flex items-center mt-10">
        <div class="md:w-11/12 md:mx-auto">
            @include('layouts._partials._alert')
            @user
                <a href="{{route('transactions.index')}}" class="bg-red-400 text-white hover:bg-red-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">  Back</a> <br><br>
            @else
                <a href="{{route('admin-transactions')}}" class="bg-red-400 text-white hover:bg-red-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">  Back</a> <br><br>
            @enduser

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    @user {{'Transactions For '}} {{$wallet->name}} @else  {{'Transactions For '}} {{$wallet->user->name}} @enduser
                </div>
                <div class="w-12/12 p-2">
                    @if($data->count() > 0)
                        <table class="text-left w-11/12 m-2" style="border-collapse:collapse">
                            <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">No..</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Amount</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Account</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Status</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Date</th>
                                <th class="py-4 px-6 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @foreach($data as $key => $value)
                                <tr class="hover:bg-blue-lightest">
                                    <td class="py-4 px-6 border-b border-grey-light">{{$count++}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$value->request_amount}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$value->account_number}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$value->status == "" ? "Pending" : "Acknowledge"}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$value->created_at->diffForHumans()}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light text-center">
                                        <div class="container text-center mx-auto p-5">
                                            <div class="flex justify-center rounded-lg text-lg mb-4">
                                                @admin
                                                    @if($value->status == "Approved")
                                                        {{$value->updated_at->diffForHumans()}}
                                                    @else

                                                    <form action="{{route('transactions.update', $value->id)}}" method="POST">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <button onclick="return confirm('Are you sure you want to approve this transaction request...?')" class="bg-green-400 text-white hover:bg-green-300  px-4 py-2 mx-0 outline-none focus:shadow-outline">  Approve</button>
                                                    </form>
                                                @endif
                                                @endadmin
                                                @user
                                                    <a href="{{route('transactions.show', $value->id)}}" class="bg-blue-500 text-white hover:bg-blue-400  px-4 py-2 mx-0 outline-none focus:shadow-outline">Print </a> &nbsp
                                                @enduser
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
