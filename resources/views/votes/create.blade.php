<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question') }} : {{ $question->description }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>{{__('Select the correct answer')}}</h2>

            <div class="space-y-4 ...">
                @foreach($question->answers()->get() as $answer)
                    <a href="{{route('votes.store',[$question,$answer])}}" type="button"
                       class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-purple-400 to-purple-600 transform hover:scale-110">
                        {{$answer->description}}
                    </a>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
