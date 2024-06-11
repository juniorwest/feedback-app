<?php

namespace App\Livewire;

use App\Models\Commentaire;
use App\Models\Cours;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AccessCours extends Component
{

    use WithPagination;

    protected $paginationTheme='bootstrap';

    public $editCoursId;
    public $editCoursName;

    public $message = '';
    public $cours = '';
    public Cours $coursDownload;
    public $editCommentaireId;
    public $editCommentaireMessage;

    public function rules(): array
    {
        return [
            'message' => 'string',
        ];
    }

    public function create($cours_id)
    {
        $validatedData = $this->validate();
        

        $coursID = Cours::find($cours_id);
        $coursID->commentaires()->create($validatedData);

        $this->reset();

        session()->flash('success', 'Commentaire enregistré!');

    }

    public function editCours($coursId){
        $this->editCoursId = $coursId;
        $this->editCoursName = Cours::find($coursId)->nom;
    }

    public function editCommentaire($commentaireId){
        $this->editCommentaireId = $commentaireId;
        $this->editCommentaireMessage = Commentaire::find($commentaireId)->message;
    }

    public function cancelEditCours(){
        $this->reset('editCoursId', 'editCoursName');
    }

    public function cancelEditCommentaire(){
        $this->reset('editCoursId', 'editCommentaireMessage');
    }

    public function update(){
        $validatedData = $this->validate();

        //$produit = Produit::with('images', 'category')->find($id);
        $commentaire = Commentaire::find($this->editCommentaireId)->update([
            'message' => $this->editCommentaireMessage,
        ]);

        $this->cancelEdit();

        session()->flash('success', 'Message modifié avec succès!');
    }

    public function delete(Commentaire $commentaire){
        $commentaire->delete();
    }

    
    public function view(Produit $produit){
        $selectedProduit = Produit::with('images', 'category')->find($produit->id);
        return response([
            'produit' => $selectedProduit
        ], 200);
    }

    public function getMessage(){
        return Cours::with('message')->get();
    }

    public function download($courseId)
    {
        // Fetch file data from database based on $fileId
        $course = Cours::find($courseId);

        // Check if file exists
        if (!$course) {
            session()->flash('error', "Le cours n'existe pas!");
        }

        

        // Decrypt the file cours
        $decryptedContent = decrypt($course->cours); // Assuming 'cours' stores encrypted data

        dd($decryptedContent);

        // Generate download response
        return response()->streamDownload(function () use ($decryptedContent) {
            echo $decryptedContent; // Assuming 'content' field stores the file data
        }, $course->original_name . ' .pdf');
    }

    public function render()
    {
        return view('livewire.access-cours',[
            'Cours' => Cours::paginate(2),
            'Commentaires' => Commentaire::with('cours')->get()
        ]);
    }
}
