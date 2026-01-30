<?php

namespace App\Exports;

use App\Models\Api;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ApisExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
     * Get all APIs from database
     */
    public function collection()
    {
        return Api::orderBy('expiry_datetime', 'asc')->get();
    }

    /**
     * Define column headings
     */
    public function headings(): array
    {
        return [
            'Tên App',
            'Link TESTFLIGHT',
            'Link API',
            'Ngày bắt đầu',
            'Ngày hết hạn',
            'Còn lại (ngày)',
            'Trạng thái',
        ];
    }

    /**
     * Map each row
     */
    public function map($api): array
    {
        $remainingDays = $api->remaining_days;
        $status = $api->status === 'open' ? 'Đang hoạt động' : 'Đã đóng';

        // Check if expired
        if ($api->isExpired()) {
            $status = 'Đã hết hạn';
        }

        return [
            $api->name,
            $api->testflight_link ?? '',
            url('/api/' . $api->id),
            $api->start_date ? $api->start_date->format('d/m/Y') : '',
            $api->expiry_datetime ? $api->expiry_datetime->format('d/m/Y') : '',
            $remainingDays !== null ? $remainingDays : 'Không giới hạn',
            $status,
        ];
    }

    /**
     * Style the spreadsheet
     */
    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $lastColumn = 'G';

        return [
            // Header row styling
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 12,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4A90D9'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
            // All cells - add borders
            "A1:{$lastColumn}{$lastRow}" => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'CCCCCC'],
                    ],
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }
}
