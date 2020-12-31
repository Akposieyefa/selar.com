@extends('layouts.app')
@section('content') <br><br><br><br>
    <div class="container md:mx-auto">
        <div class="flex flex-wrap">
            <div class="md:w-10/12 md:mx-auto">
                @include('layouts._partials._alert')
                <a href="{{route('transactions.show', Auth::user()->id)}}" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                    {{ __('My Transactions') }}
                </a> <br><br>
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Initiate Transaction') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('transactions.store') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Select Wallet') }}:
                            </label>
                            <select class="text-dark-400  border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full" name="wallet_id">
                                <option class="pt-6" value="">Select from your wallets</option>
                                @foreach($data as $key => $value)
                                    <option value="{{$value->id}}" >{{$value->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Amount') }}:
                            </label>

                            <input id="amount" type="text" class="form-input w-full @error('amount')  border-red-500 @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                            @error('amount')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Account Number') }}:
                            </label>

                            <input id="account" type="text" class="form-input w-full @error('account') border-red-500 @enderror" name="account" value="{{ old('account') }}" required autocomplete="account">

                            @error('account')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Initiate Transaction') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

