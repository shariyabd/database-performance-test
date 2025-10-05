<?php

namespace App\Livewire;

use Livewire\Component;

class OptimizedEmployeesList extends Component
{

    public $search = '';
    public $department = '';
    public $status = '';

    public function render()
    {
        $employees = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'department' => 'IT', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'department' => 'HR', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@example.com', 'department' => 'Sales', 'status' => 'Inactive'],
            ['id' => 4, 'name' => 'Sarah Williams', 'email' => 'sarah@example.com', 'department' => 'IT', 'status' => 'Active'],
            ['id' => 5, 'name' => 'Tom Brown', 'email' => 'tom@example.com', 'department' => 'Marketing', 'status' => 'Active'],
        ];

        return view('livewire.employees-list', ['employees' => $employees]);
    }

}
