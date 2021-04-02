<x-jet-confirmation-modal wire:model="confirmDeleteModal">
    <x-slot name="title">
        Delete Site
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete your site URL? Once your site is deleted, no checks will be proceeded anymore.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmDeleteModal')" wire:loading.attr="disabled">
            Nope
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteSite" wire:loading.attr="disabled">
            Delete Site
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
