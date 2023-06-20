<?php

namespace App\Exports;

use App\Models\EmployeeEvaluation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\{WithHeadings, WithMapping, WithEvents, ShouldAutoSize};
use Maatwebsite\Excel\Events\AfterSheet;

class ReportExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmployeeEvaluation::all();
    }

    // Mapping Dara
    public function map($eval): array{

        // Choose Download Fields
        $fields = [
           $eval->id,
           $eval->employer->name,
           $eval->score,
           $eval->advice ? $eval->advice : 'Tidak Ada Komentar',
      ];

        return $fields;
    }

    // Custom Heading
    public function headings(): array
    {
        return [
            ['Daftar Hasil Penilaian Kepuasan Pelanggan'],
            [
            'No.',
            'Nama',
            'Skor',
            'Kritik/Saran',
            ]
        ];
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $event->sheet->getDelegate()->mergeCells('A1:D1');

                // Centering
                $event->sheet->getDelegate()->getStyle('B1:D1')
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // Set One Column in center
                $event->sheet->getDelegate()->getStyle('A1:A'.$event->sheet->getDelegate()->getHighestRow())
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); 
                                
                // Array For style 
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ];
                
                // Give Color in each column
                foreach(range('A','D') as $alphabet){
                    
                    for($i = 2; $i <= $event->sheet->getDelegate()->getHighestRow(); $i++){
                        $event->sheet->getDelegate()->getStyle($alphabet.$i.':'.$alphabet.$i)->applyFromArray($styleArray);
                    }
                }
            },
        ];
    }
}
