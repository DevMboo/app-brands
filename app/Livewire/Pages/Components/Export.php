<?php
namespace App\Livewire\Pages\Components;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Database\Eloquent\Collection;

use Carbon\Carbon;

class Export extends Component
{

    #[Url]
    public string $search = "";

    public string $whereBy = "name";

    public string $modelClass;

    public string $title = "";

    public string $date_ini = "";

    public string $date_end = "";

    public string $itWith = "";

    public array $aliases = [];

    public array $fk = [];

    public ?Collection $collection = null;

    public function mount(string $modelClass, array $aliases = [], string $itWith = "")
    {
        if($modelClass && !is_subclass_of($modelClass, 'Illuminate\Database\Eloquent\Model')) {
            $this->modelClass = $modelClass;
            $this->aliases = $aliases;
            $this->itWith = $itWith;
        }
    }

    #[On('search-updated')]
    public function updateSearch(string $search)
    {
        $this->search = $search;
    }

    private function validateDate(string $date)
    {
        if ($date && preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)) {
            return Carbon::createFromFormat('d/m/Y', $date)->startOfDay();
        }
        
        return null;
    }

    public function export(string $extension)
    {
        $this->collection = $this->loadCollection();

        switch (strtolower($extension)) {
            case 'csv':
                return $this->exportCsv($this->aliases);
            case 'xlsx':
                return $this->exportXlsx($this->aliases);
            case 'pdf':
                return $this->exportPdf($this->aliases);
            default:
                throw new \Exception("Formato de exportação inválido: $extension");
        }
    }

    protected function loadCollection() : Collection
    {

        $dateIni = $this->validateDate($this->date_ini);
        $dateEnd = $this->validateDate($this->date_end);

        $model = app($this->modelClass);

        $query = $model->query();

        if (!empty($this->itWith)) {
            $query->with($this->itWith);
        }

        if ($dateIni && $dateEnd) {
            $query->whereBetween('created_at', [$dateIni, $dateEnd]);
        } elseif ($dateIni) {
            $query->whereDate('created_at', '>=', $dateIni);
        } elseif ($dateEnd) {
            $query->whereDate('created_at', '<=', $dateEnd);
        }

        if ($this->search) {
            $query->where($this->whereBy, 'like', '%' . $this->search . '%');
        }

        return $query->get();
    }

    protected function dataFormatted()
    {
        return $this->collection->map(function($item) {
            $formattedItem = $item instanceof \Illuminate\Database\Eloquent\Model ? $item->toArray() : (array) $item;

            foreach ($formattedItem as $key => $value) {
                if ($value instanceof \Carbon\Carbon) {
                    $formattedItem[$key] = $value->format('d/m/Y H:i:s');
                } elseif (is_string($value) && strtotime($value)) {
                    $formattedItem[$key] = Carbon::parse($value)->format('d/m/Y H:i:s');
                }
            }

            if (!empty($this->fk) && !empty($this->itWith)) {
                foreach ($this->fk as $foreignKey => $column) {
               
                    if (isset($formattedItem[$foreignKey])) {
                        
                        $relatedValue = $formattedItem[$this->itWith][$column] ?? null;
                  
                        if ($relatedValue) {
                            $formattedItem[$foreignKey] = $relatedValue;
                        }

                        unset($formattedItem[$this->itWith]);
                    }
                }
            }

            return $formattedItem;
        });
    }

    protected function exportCsv(array $aliases)
    {

        $dataFormatted = $this->dataFormatted();

        return Excel::download(new class($dataFormatted, $aliases) implements FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
            private $collection;
            private $aliases;

            public function __construct($collection, $aliases)
            {
                $this->collection = $collection;
                $this->aliases = $aliases;
            }

            public function collection() 
            { 
                return collect($this->collection);
            }

            public function headings(): array
            {
                $first = collect($this->collection)->first();
                return array_map(function($heading) {
                    return $this->aliases[$heading] ?? ucfirst($heading);
                }, array_keys($first ? $first : []));
            }
        }, "export-".Carbon::now()->format('Y-m-d_H-i-s').".csv", \Maatwebsite\Excel\Excel::CSV);
    }

    protected function exportXlsx(array $aliases)
    {
        $dataFormatted = $this->dataFormatted();

        return Excel::download(new class($dataFormatted, $aliases) implements FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
            private $collection;
            private $aliases;

            public function __construct($collection, $aliases)
            {
                $this->collection = $collection;
                $this->aliases = $aliases;
            }

            public function collection() 
            { 
                return collect($this->collection);
            }

            public function headings(): array
            {
                $first = collect($this->collection)->first();
                return array_map(function($heading) {
                    return $this->aliases[$heading] ?? ucfirst($heading);
                }, array_keys($first ? $first : []));
            }
        }, "export-".Carbon::now()->format('Y-m-d_H-i-s').".xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }

    protected function exportPdf(array $aliases)
    {
        $dataFormatted = $this->dataFormatted();
        
        $pdf = Pdf::loadView('livewire.pages.export.export-page', [
            'data' => $dataFormatted,
            'aliases' => $aliases,
            'title' => $this->title
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "export-".Carbon::now()->format('Y-m-d_H-i-s').".pdf");
    }

    public function render()
    {
        return view('livewire.pages.components.export');
    }
}