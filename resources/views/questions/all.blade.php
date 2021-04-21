<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Votes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($questions as $question)
                <div class="bg-indigo-700 px-4 py-5 border-b rounded-t sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-white">
                        {{$question->description}}
                    </h3>
                </div>
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul class="divide-y divide-gray-200">
                        @foreach($question->answers()->get() as $answer)
                            <li>
                                <a class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-thin text-gray-700 truncate">
                                                {{$answer->description}}
                                            </p>
                                            @if($answer->is_valid)
                                                <div class="ml-2 flex-shrink-0 flex">
                                                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        correct answer
                                                    </p>
                                                </div>
                                            @endif
                                            @if(!$answer->is_valid)
                                                <div class="ml-2 flex-shrink-0 flex">
                                                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800" >
                                                        wrong answer
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
