<div>
    <table class="table table-striped" style="width:80%">
        
        <thead>
            <tr>
                <th>Nom</th>
                <th>Cours</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>

            <tbody>
                @foreach ($Cours as $Cour)
                <tr wire:key="{{$Cour->id}}">
                    <td>{{$Cour->nom}}</td>
                    <td>{{$Cour->cours}}</td>
                    <td>{{$Cour->created_at}}</td>
                    <td class="d-flex">
                        <svg wire:click="download({{$Cour->id}})" xmlns="http://www.w3.org/2000/svg" class="mr-2" width="16" height="16" fill="#ffa500" class="bi bi-arrow-down-circle-fill mr-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                        </svg>
                        <svg wire:click="editCours({{$Cour->id}})" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0000ff" class="bi bi-chat-left ml-2" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        </svg>
                    </td>
                </tr>
                @endforeach
            </tbody>


        @if ($editCoursId == $Cour->id)
        <form>
            <div>
                <label for="comment">Comments:</label>
                <textarea wire:model="message" class="form-control" rows="5" id="comment" name="text"></textarea>
                @error('message') <span class="alert alert-danger">{{ $message }}</span> @enderror
                <div>
                    <button wire:click.prevent="create({{$Cour->id}})" class="btn btn-primary">Commenter</button>
                    <button wire:click="cancelEditCours" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </form> 
        @else
        
        @endif

    </table>

    <div class="my-2">
        {{ $Cours->links() }}
    </div>

   @foreach ($Commentaires as $Commentaire)
   <h2>{{$Cour->nom}}</h2>
   <p>{{$Commentaire->message}}</p>
   @endforeach
   

</div>