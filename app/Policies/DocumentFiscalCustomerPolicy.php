<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DocumentFiscalCustomer;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentFiscalCustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DocumentFiscalCustomer $documentFiscalCustomer): bool
    {
        return $user->can('view_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DocumentFiscalCustomer $documentFiscalCustomer): bool
    {
        return $user->can('update_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DocumentFiscalCustomer $documentFiscalCustomer): bool
    {
        return $user->can('delete_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, DocumentFiscalCustomer $documentFiscalCustomer): bool
    {
        return $user->can('force_delete_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, DocumentFiscalCustomer $documentFiscalCustomer): bool
    {
        return $user->can('restore_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, DocumentFiscalCustomer $documentFiscalCustomer): bool
    {
        return $user->can('replicate_operational::document::fiscal::customer');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_operational::document::fiscal::customer');
    }
}
