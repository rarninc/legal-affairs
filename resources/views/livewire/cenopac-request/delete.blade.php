<div class="flex justify-end mt-auto ">
    <dialog id="delete_request_confirm" class="modal" wire:ignore.self>
    <div class="modal-box">
        <h3 class="font-bold text-xl">Confirm Action</h3>
        <p class="py-4">This action <strong>CANNOT</strong> be <strong>undone</strong>. Are you sure you want to <strong>DELETE</strong> this new CeNoPAC request?</strong>.</p>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn btn-outline">Cancel</button>
                <button wire:click.prevent="delete()" type="submit" class="btn btn-primary" onclick="delete_request_confirm.close()" > YES</button>
            </form>
        </div>
    </div>
    </dialog>
</div>