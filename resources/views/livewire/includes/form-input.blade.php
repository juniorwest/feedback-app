<div>
    <h1 class="mb-0 h2 fw-bolder">{{__('Ajouter un nouveau cours')}}</h1>
    <p class="pt-2">{{__('Veuillez entrer votre cours en format pdf')}} &#128522;</p>
</div>

<form>
    <div class="mb-3">
        <label for="cours" class="form-label">Nom du cours</label>
        <input wire:model="nom" type="text" class="form-control" id="cours" placeholder="">
        @error('nom') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="pdfCours" class="form-label">Importer votre cours</label>
        <input wire:model="cours" type="file" class="form-control" id="pdfCours" placeholder="">
        @error('cours') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-3">
        <label for="descCours" class="form-label">Description du cours</label>
        <textarea wire:model="description" class="form-control" id="descCours" rows="3"></textarea>
        @error('description') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
    <button wire:click.prevent="create" type="submit" class="btn btn-primary">Create +</button>
    </div>
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

</form>