<?php

namespace App\Livewire;

use App\Models\NonOptimizedEmployee;
use Livewire\Component;
use Livewire\WithPagination;

class NonOptimizedEmployeeList extends Component
{
    use WithPagination;

    public $start_date;
    public $end_date;
    public $district;
    public $division;
    public $status;
    public $search;
    public $idSort;
    public $executionTime;
    public $districts;
    public $divisions;

    public function render()
    {
        $startTime = microtime(true);

        $query = NonOptimizedEmployee::query();

        if ($this->start_date) {
            $query->where('record_date', '>=', $this->start_date);
        }
        if ($this->end_date) {
            $query->where('record_date', '<=', $this->end_date);
        }
        if ($this->district) {
            $query->where('district', $this->district);
        }
        if ($this->division) {
            $query->where('division', $this->division);
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'LIKE', "%{$this->search}%")
                  ->orWhere('title', 'LIKE', "%{$this->search}%");
            });
        }

        if ($this->idSort === 'asc' || $this->idSort === 'desc') {
            $query->orderBy('id', $this->idSort);
        } else {
            $query->orderBy('id', 'desc');
        }

        $records = $query->paginate(1000);

        $this->executionTime = round((microtime(true) - $startTime), 4); // seconds

        $this->districts = NonOptimizedEmployee::select('district')->distinct()->orderBy('district')->pluck('district');
        $this->divisions = NonOptimizedEmployee::select('division')->distinct()->orderBy('division')->pluck('division');

        return view('livewire.non-optimized-employee-list', compact('records'));
    }

}
