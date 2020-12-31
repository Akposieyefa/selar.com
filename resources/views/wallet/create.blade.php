@extends('layouts.app')

@section('content')<br><br><br><br>
    <div class="container md:mx-auto">
        <div class="flex flex-wrap">
            <div class="md:w-10/12 md:mx-auto">
                @include('layouts._partials._alert')
                <a href="{{route('wallets.index')}}" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                    {{ __('My Wallet') }}
                </a> <br><br>
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Create My Wallet') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('wallets.store') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Wallet Name') }}:
                            </label>

                            <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Currency') }}:
                            </label>

                            <input id="name" type="text" class="form-input w-full @error('currency')  border-red-500 @enderror" name="currency" value="{{ old('currency') }}" required autocomplete="currency" autofocus>

                            @error('currency')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Wallet Description') }}:
                            </label>

                            <input id="desc" type="text" class="form-input w-full @error('desc') border-red-500 @enderror" name="desc" value="{{ old('desc') }}" required autocomplete="desc">

                            @error('desc')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Initial Amount') }}:
                            </label>

                            <input id="amount" type="text" class="form-input w-full @error('amount') border-red-500 @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount">

                            @error('amount')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Create Wallet') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

