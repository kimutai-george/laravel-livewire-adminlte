<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <div class="d-flex justify-content-end mb-2">
              <button wire:click.prevent="addNewUser" class="btn btn-primary"><i class="fa fa-plus-circle" ></i> Add New User</button>
              </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($users as $user)
      <tr>
        <th scope="col">{{ $loop->iteration }}</th>
        <th scope="col">{{ $user->name }}</th>
        <th scope="col">{{ $user->email }}</th>
        <td>
          <a href="" wire:click.prevent="edit({{ $user }})">
              <i class="fa fa-edit"></i>
          </a>
          <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }})">
              <i class="fa fa-trash text-danger"></i>
          </a>
      </td>
      </tr>
      @endforeach
 
  </tbody>
</table>
              </div>
            </div>

        
            </div><!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
          <form autocomplete="off" wire:submit.prevent="{{ $showModalEdit ? 'editUser'  : 'createUser'}}">
          <div class="modal-content">
            <div class="modal-header">
              @if($showModalEdit)
              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
              @else
              <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
              @endif
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                  <label for="names" class="form-label">Names</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="names" aria-describedby="namesHelp" wire:model.defer="form.name">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
                  <div id="namesHelp" class="form-text">Enter Your Full Names</div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" id="email" aria-describedby="emailHelp" wire:model.defer="form.email">
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model.defer="form.password">
                  @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" wire:model.defer="form.password_confirmation">
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Close</button>
                   <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> 
                    @if($showModalEdit)
                    <span>Edit User</span>
                                   @else
                    <span>Create User</span>

                    @endif
                  </button>
                 </div>
            </div>
          </div>
        </form>
        </div>
      </div>
      <div class="modal fade" id="confirmatioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5>Are you sure you want to delete this User?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
              <button type="button" wire:click.prevent="deleteUser" class="btn btn-danger btn-sm"><i class="fa fa-save mr-2"></i>Delete</button>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

