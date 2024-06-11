<?php

namespace App\Livewire;

use App\Models\Cours;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme='bootstrap';

    public $editCoursId;
    public $editCoursName;
    public $editCours;
    public $editCoursDescription;

    public $nom = '';
    public $cours; // Declare without initial value
    public $description = '';

    public $recherche;

    public function rules(): array
    {
        return [
            'nom' => 'required|string',
            'cours' => 'required|mimes:pdf',
            'description' => 'string',
            'user_id' => Auth::user()
        ];
    }

    public function create()
    {
        $validatedData = $this->validate();

        if ($this->cours) {
            $filename = uniqid('cours_') . '.pdf'; // Generate unique filename
            $this->cours->storeAs('cours', $filename, 'public'); // Store with filename
            $validatedData['cours'] = $filename;
        }

        Cours::create($validatedData);

        $this->reset();

        session()->flash('success', 'Cours créé avec succès!');

    }

    public function edit($coursId){
        $this->editCoursId = $coursId;
        $this->editCoursName = Cours::find($coursId)->nom;
        $this->editCours = Cours::find($coursId)->cours;
        $this->editCoursDescription = Cours::find($coursId)->description;
    }

    public function cancelEdit(){
        $this->reset('editCoursId', 'editCoursName', 'editCoursDescription', 'editCours');
    }

    public function update(){
        $validatedData = $this->validate();

        //$produit = Produit::with('images', 'category')->find($id);
        $Cours = Cours::find($this->editCoursId)->update([
            'nom' => $this->editCoursName,
            'cours' => $this->editCours,
            'description' => $this->editCoursDescription
        ]);

        $this->cancelEdit();

            session()->flash('success', 'Cours modifié avec succès!');
    }

    public function delete(Cours $cours){
        $cours->delete();
    }

    /*
    public function view(Produit $produit){
        $selectedProduit = Produit::with('images', 'category')->find($produit->id);
        return response([
            'produit' => $selectedProduit
        ], 200);
    }
    */
    
    public function render()
    {
        return view('livewire.dashboard', [
            'Cours' => Cours::latest()->where('nom', 'like', "%{$this->recherche}%")->paginate(4)
        ]);
    }
}
