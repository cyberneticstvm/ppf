<?php

namespace App\Exports;

use App\Models\Membership;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MembersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function collection()
    {
        $members = Membership::selectRaw("membership_number, name, type, email, kw_primary_contact_number, kw_area, specialization, qualification, in_district, referred_by, doj, approved_date, next_renewal_date")->where('approval_status', $this->status)->get();
        return $members->map(function ($data, $key) {
            return [
                '1' =>  $key + 1,
                '2' => $data->membership_number,
                '3' => $data->name,
                '4' => $data->type,
                '5' => $data->email,
                '6' => $data->kw_primary_contact_number,
                '7' => $data->kw_area,
                '8' => $data->specializations?->name,
                '9' => $data->qualifications?->name,
                '10' => $data->in_district,
                '11' => $data->members?->name,
                '12' => $data->doj?->format('d.M.Y'),
                '13' => $data->approved_date?->format('d.M.Y'),
                '14' => $data->next_renewal_date?->format('d.M.Y'),
            ];
        });
    }

    public function headings(): array
    {
        return ['SL No', 'Membership ID', 'Name', 'Type', 'Email', 'Primary Contact', 'Place / Area', 'Industry / Specialization', 'Qualification', 'District', 'Referred by', 'Join Date', 'Approved Date', 'Next Renewal Date'];
    }

    /*public function map($data): array
    {
        return $data;
    }*/

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:N1')->getFont()->setBold(true);
    }
}
