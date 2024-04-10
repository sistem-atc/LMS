<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Employee;

class EmployeeObserver
{
    public function deleted(Employee $employee): void
    {
        User::find($employee->user_id)->delete();
    }

}
