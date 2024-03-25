<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button class="btn btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#confirm-user-deletion">
        Delete Account
    </button>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Are you sure you want to delete your account?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                    </p>

                    <div class="mt-6">
                        <label for="password" class="form-label sr-only">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        @error('userDeletion.password')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6 d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger ml-3">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
