<div>
    <div class="card">
        <h2>Login</h2>
    </div>

    <div>
        <form wire:submit="login" class="form-group mt-3">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input wire:model="email" type="email" id="form2Example1" class="form-control" />
                @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
            </div>
        
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input wire:model="password" type="password" id="form2Example2" class="form-control" />
                @error('password') <span class="alert alert-danger">{{ $message }}</span> @enderror
            </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Type compte</label>
                    <select wire:model="type_compte" type="text" name="" id="form2Example2" class="form-control">
                        <option value="">selectionnez votre statut</option>
                        <option value="enseignant">enseignant</option>
                        <option value="etudiant">etudiant</option>
                    </select>
                </div>
        

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>
        
            <!-- Register buttons -->
            <div class="text-center">
            <p>Not a member? <a href="">Register</a></p>
            </div>
        </form>
    </div>

    <div>
        <div class="card">
            <h2>Register</h2>
        </div>

        <form  wire:submit="register" class="form-group mt-3">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form2Example1">name</label>
                <input wire:model="name" type="text" id="form2Example1" class="form-control" />
                @error('name') <span class="alert alert-danger">{{ $message }}</span> @enderror
            </div>
        
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form2Example2">email</label>
                <input wire:model="email" type="email" id="form2Example2" class="form-control" />
                @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form2Example2">password</label>
                <input wire:model="password" type="password" id="form2Example2" class="form-control" />
                @error('password') <span class="alert alert-danger">{{ $message }}</span> @enderror
            </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Type compte</label>
                    <select wire:model="type_compte" type="text" name="" id="form2Example2" class="form-control">
                        <option value="">selectionnez votre statut</option>
                        <option value="enseignant">enseignant</option>
                        <option value="etudiant">etudiant</option>
                    </select>
                </div>
                <div>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
        

            <!-- Submit button -->
            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Register</button>
        
            <!-- Register buttons -->
            <div class="text-center">
            <p>Back to login page ? <a href="">Login</a></p>
            </div>
        </form>
    </div>

</div>
