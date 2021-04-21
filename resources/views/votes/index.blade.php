<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{__('Votes')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="min-w-max w-full table-auto">
                <thead>
                <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Id</th>
                    <th class="py-3 px-6 text-left">{{__('Description question')}}</th>
                    <th class="py-3 px-6 text-left">{{__('Description answer')}}</th>
                    <th class="py-3 px-6 text-center">{{__('Created ago')}}</th>
                    <th class="py-3 px-6 text-center">{{__('It is correct ?')}}</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @foreach($votes as $vote)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{$vote->id}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{$vote->question()->first()->description}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{$vote->answer()->first()->description}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span
                                class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $vote->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            @if($vote->answer()->first()->is_valid)
                                Yes
                            @else
                                Not
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $votes->links() }}
        </div>
    </div>
</x-app-layout>
