<x-jet-modal wire:model="isOpenCreateModal">
	<div class="p-6">

		<x-jet-form-section submit="store">

			<x-slot name="title">
				Adding new URL to monitor
			</x-slot>

			<x-slot name="description">
				<br>
				Please enter your site's URL for periodic check.
				<br><br>
				Additionally you can add keyword to check on loaded page. But it is not nessessary.
			</x-slot>

			<x-slot name="form">

				<!-- Name -->
				<div class="col-span-6">
					<x-jet-label for="url" value="Site URL:" />
					<x-jet-input id="url" type="url" class="mt-1 block w-full" wire:model="url" required="true" autocomplete="url" />
					<x-jet-input-error for="url" class="mt-2" />
				</div>

				<!-- Email -->
				<div class="col-span-6">
					<x-jet-label for="keyword" value="Keyword to check:" />
					<x-jet-input id="keyword" type="text" class="mt-1 block w-full" wire:model="keyword" />
					<x-jet-input-error for="keyword" class="mt-2" />
				</div>
			</x-slot>
			<x-slot name="actions">
				<x-jet-button> {{-- wire:loading.attr="disabled" --}}
					{{ __('Save') }}
				</x-jet-button>
			</x-slot>

		</x-jet-form-section>

	</div>
</x-jet-modal>
