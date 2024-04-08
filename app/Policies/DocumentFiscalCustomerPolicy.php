<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\DocumentFiscalCustomer;
use App\Models\User;

class DocumentFiscalCustomerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any DocumentFiscalCustomer');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DocumentFiscalCustomer $documentfiscalcustomer): bool
    {
        return $user->checkPermissionTo('view DocumentFiscalCustomer');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create DocumentFiscalCustomer');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DocumentFiscalCustomer $documentfiscalcustomer): bool
    {
        return $user->checkPermissionTo('update DocumentFiscalCustomer');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DocumentFiscalCustomer $documentfiscalcustomer): bool
    {
        return $user->checkPermissionTo('delete DocumentFiscalCustomer');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DocumentFiscalCustomer $documentfiscalcustomer): bool
    {
        return $user->checkPermissionTo('restore DocumentFiscalCustomer');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DocumentFiscalCustomer $documentfiscalcustomer): bool
    {
        return $user->checkPermissionTo('force-delete DocumentFiscalCustomer');
    }
}
