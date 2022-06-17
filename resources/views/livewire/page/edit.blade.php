<div>
    <x-slot name="header">
        <h2 class="font-semibold text-orange-500 text-2xl leading-tight">
            {{$page->name}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-4 text-gray-800 relative">
            <div class="max-w-7xl mx-auto py-4 xpy-10 xsm:px-6 xlg:px-8">
                <x-jet-form-section submit="save">
                    <x-slot name="title" class="text-white">
                        Informações da página
                    </x-slot>
                
                    <x-slot name="description">
                        Atualize as informações da página
                    </x-slot>
                
                    <x-slot name="form">
                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-5">
                            {{-- <x-jet-label for="page.name" value="Nome" /> --}}
                            <p class="text-xl font-bld">{{ $page->name }}</p>
                            {{-- <x-jet-input id="page.name" type="text" class="mt-1 block w-full" wire:model="page.name" /> --}}
                            {{-- <x-jet-input-error for="page.name" class="mt-2" /> --}}
                        </div>

                        {{-- <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="page.order" value="Ordem" />
                            <x-jet-input id="page.order" type="number" class="mt-1 block w-full" wire:model="page.order" min="0" step="1" />
                            <x-jet-input-error for="page.order" class="mt-2" />
                        </div> --}}

                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="page.tit_seo" value="SEO - Título" />
                            <x-jet-input id="page.tit_seo" type="text" class="mt-1 block w-full" wire:model="page.tit_seo" />
                            <x-jet-input-error for="page.tit_seo" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="page.desc_seo" value="SEO - Descrição" />
                            <x-admin.textarea id="page.desc_seo" class="mt-1 block w-full" wire:model="page.desc_seo" />
                            <x-jet-input-error for="page.desc_seo" class="mt-2" />
                        </div>

                        <div class="col-span-6 mt-3">
                            <x-jet-checkbox id="page.active" name="page.active" wire:model.deffer="page.active"/>
                            <span class="ml-1 text-sm">Ativo</span>
                            <p class="text-xs">Exibe no menu</p>
                        </div>
                    </x-slot>

                    <x-slot name="actions">
                        <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
                        </x-jet-action-message>
                
                        <x-jet-button wire:loading.attr="disabled" wire:click="save" >
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-form-section>

                @if ($page->slug == 'sobre-o-festival')
                    <x-jet-section-border />

                    @if ($page->text)
                        <livewire:text.edit :text="$page->text"/>
                    @else
                        <livewire:text.create :page_id="$page->id"/>
                    @endif
                @endif

                @if ($page->slug == 'home' || $page->slug == 'sobre-o-festival')
                    <x-jet-section-border />
                    
                    @if ($page->video)
                        <livewire:video.edit :video="$page->video"/>
                    @else
                        <livewire:video.create :page_id="$page->id"/>
                    @endif
                @endif

                @if ($page->slug == 'contato')
                    <x-jet-section-border />
                    <livewire:contact.edit/>
                @endif
                
            </div>
        </div>
    </div>
</div>

{{-- Usado em create e edit --}}
@push('styles')
    {{-- Quill --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    {{-- Quill --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
