<div class="py-6" wire:poll.20s>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        	<div class="grid grid-cols-2">
        		<div>
        			<h1 class="text-2xl">Sites list to monitor</h1>
        		</div>
        		<div>
		            <x-jet-button wire:click="create()" class="float-right">
				        Add New Site URL
				    </x-jet-button>
        		</div>
        	</div>

			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-8">
        		<table class="min-w-full divide-y divide-gray-200">
          			<thead class="bg-gray-50">
            		<tr>
              			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
              			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keyword</th>
              			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              			<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last check</th>
              			<th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
            		</tr>
          			</thead>
          			<tbody class="bg-white divide-y divide-gray-200">
          			@foreach($sites as $s)
            		<tr>
              			<td class="px-6 py-4 whitespace-nowrap">
              				{{ $s->url }}
						</td>
              			<td class="px-6 py-4">
              				{{ Str::limit($s->keyword,15) }}
						</td>
              			<td class="px-6 py-4 whitespace-nowrap">
              				@if ($s->errors>0)
              					@php
              						$dead_str = '';
              						$dead_period = time()-strtotime($s->first_error_tstamp);
              						if ($dead_period<60) {
              							$dead_str = 'less then 1 min';
              						} elseif ($dead_period<60*60) {
              							$dead_str = 'for '.round($dead_period/60).' min';
              						} else {
              							$dead_str = 'more then '.floor($dead_period/60/60).' hours';
              						}
              					@endphp
	                			<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded bg-red-100 text-red-800">
	                  				Dead {{ $dead_str }}
	                			</span>
	                		@else
	                			@if (!$s->last_check_tstamp)
		                			<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded bg-gray-100 text-gray-800">
		                  				Unknown
		                			</span>
	                			@else
		                			<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded bg-green-100 text-green-800">
		                  				Live
		                			</span>
		                		@endif
	                		@endif
              			</td>
              			<td class="px-6 py-4 whitespace-nowrap">
              				@if ($s->last_check_tstamp) {{ date('H:i',strtotime($s->last_check_tstamp)) }} @else never @endif
						</td>
              			<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              				<x-jet-button class="bg-green-600" wire:click="edit({{ $s->id }})">
              					<i class="fas fa-edit"></i>
              				</x-jet-button>
              				<x-jet-button class="bg-red-600" wire:click="confirmDelete({{ $s->id }})">
              					<i class="fas fa-trash"></i>
              				</x-jet-button>
              			</td>
            		</tr>
            		@endforeach
          			</tbody>
        		</table>
      		</div>

			<div class="my-10">&nbsp;</div>
        </div>
    </div>

    @include('livewire.create-modal')
    @include('livewire.confirm-delete-modal')
</div>