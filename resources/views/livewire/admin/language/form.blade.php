    <div>
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class=" bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'submit' }}" class="tablelist-form" autocomplete="off">

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Name</label>
                            <input type="text" wire:model="language_name" id="customername-field" class="form-control" placeholder="Enter Name" />
                            @error('language_name')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customername-field1" class="form-label">Code</label>
                            <input type="text" wire:model="language_code" id="customername-field1" class="form-control" placeholder="Enter Code" />
                            @error('language_code')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customername-field2" class="form-label">Image</label>
                            <input type="file" wire:model="image" id="customername-field2" class="form-control" data-default-file="" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg,image/svg" />
                            @error('image')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add
                                    Language</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>