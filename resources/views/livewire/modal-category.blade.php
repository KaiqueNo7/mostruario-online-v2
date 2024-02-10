<div> 
    <x-modal :show="$show">
        <x-input-close />
        <form class="flex flex-col" wire:submit.prevent="{{ $formAction }}">  
            @csrf
            <x-input-label>Categoria:</x-input-label>
            <x-text-input type="text" name="name" wire:model="name" />
            @error('name') <x-input-error :messages="$message"></x-input-error> @enderror
            
            <x-primary-button>{{ $action }}</x-primary-button>
        </form>
    </x-modal>
</div>
