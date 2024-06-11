<div>
<div class="container mb-2">
  <main>
      <div class="bg-body-tertiary p-5 rounded">
          <h1 class="text-center mb-5">Bienvenue à vous</h1>
          <p class="lead">Heureux de vous sur cette plateforme. Dailyfeed est outils qui permet d'avoir des feedbacks sur les cours rajoutés sur la plateforme. Pour commencer cliquez sur le button <strong>create +</strong>ci-dessous pour rajouter votre cours.</p>   
      </div>
    </main>
</div>

<div id="content" class="mx-auto" style="max-width:500px;">
  <div class="container content py-6 mx-auto">
      <div class="mx-auto">
          <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
              
                      @include('livewire.includes.form-input')
              </div>
          
          </div>
      </div>
  </div>



  <div wire:model.live="recherche" id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
      <div class="flex justify-center items-center">
        <!--
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
        -->
          <input type="text" placeholder="Search..."
              class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
      </div>
  </div>

  @foreach ($Cours as $Cour)
    
 
  <div id="todos-list">
      <div class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow">
          <div class="flex justify-between space-x-2">

            @if ($editCoursId == $Cour->id)
              <input wire:model="editCoursName" type="text" placeholder="Todo.."
                          class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                      
                          @error('editCoursName') <span class="alert alert-danger">{{ $message }}</span> @enderror

                          <input wire:model="editCours" type="text" placeholder="Todo.."
                          class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                      
                          @error('editCours') <span class="alert alert-danger">{{ $message }}</span> @enderror

                          <input wire:model="editCoursDescription" type="text" placeholder="Todo.."
                          class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                      
                          @error('editCoursDescription') <span class="alert alert-danger">{{ $message }}</span> @enderror
              @else

              <h3 class="text-lg text-semibold text-gray-800">{{ $Cour->nom }}</h3>
              @endif


              <div class="flex items-center space-x-2">
                    <svg wire:click="edit({{$Cour->id}})" xmlns="http://www.w3.org/2000/svg" class="mr-2" width="16" height="16" fill="#3cb371" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    <svg wire:click="delete({{$Cour->id}})" xmlns="http://www.w3.org/2000/svg" class="mr-2" width="16" height="16" fill="#ff0000" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                    </svg>
              </div>
          </div>
          <span class="text-xs text-gray-500">{{ $Cour->created_at }}</span>
          
          <div class="mt-3 text-xs text-gray-700">

            @if ($editCoursId == $Cour->id)
                           
                      <button 
                          wire:click="update({{$Cour->id}})" class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Update</button>
                      <button 
                      wire:click="cancelEdit" class="mt-3 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">Cancel</button>
            @endif
           

          </div>
      </div>
    </div>
    @endforeach 

     
    <div class="my-2">
        {{ $Cours->links() }}
    </div>

    
   