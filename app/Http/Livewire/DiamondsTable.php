<?php

namespace App\Http\Livewire;

use App\Models\Diamond;
use App\Utils\Constants;
use Livewire\Component;
use Livewire\WithPagination;

class DiamondsTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $orderColumn = "id";
    public $sortOrder = "asc";
    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';

    public $searchTerm = "";

    public function updated()
    {
        $this->resetPage();
    }

    public function sortOrder($columnName = "")
    {
        $caretOrder = "up";
        if ($this->sortOrder == 'asc') {
            $this->sortOrder = 'desc';
            $caretOrder = "down";
        } else {
            $this->sortOrder = 'asc';
            $caretOrder = "up";
        }
        $this->sortLink = '<i class="sorticon fa-solid fa-caret-' . $caretOrder . '"></i>';

        $this->orderColumn = $columnName;

    }

    public function render()
    {
        $diamonds = Diamond::orderby($this->orderColumn, $this->sortOrder)->select('*');

        if (!empty($this->searchTerm)) {

            try {

                $diamonds->orWhere(Constants::IDENTIFIER, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::CUT, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::COLOR, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::CLARITY, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::CARAT_WEIGHT, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::POLISH, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::FANCY_COLOR_DOMINANT_COLOR, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::FANCY_COLOR_SECONDARY_COLOR, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::FANCY_COLOR_OVERTONE, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::FANCY_COLOR_INTENSITY, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::MEAS_LENGTH, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::MEAS_WIDTH, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::MEAS_DEPTH, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::DEPTH_PERCENT, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::TABLE_PERCENT, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::CULET_SIZE, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::CULET_CONDITION, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::CARAT_WEIGHT, 'like', "%" . $this->searchTerm . "%");
                $diamonds->orWhere(Constants::CUT_QUALITY, 'like', "%" . $this->searchTerm . "%");

            } catch (\Throwable $th) {
                //throw $th;
            }




        }

        $diamonds = $diamonds->paginate(20);

        return view('livewire.diamonds-table', [
            'diamonds' => $diamonds,
        ]);

    }
}
