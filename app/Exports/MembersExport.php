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
        $members = Membership::selectRaw("membership_number, civil_id, name, type, email, kw_primary_contact_number, kw_area, specialization, qualification, in_district, referred_by, area, renewal_status, doj, approved_date, next_renewal_date")->where('approval_status', $this->status)->get();
        return $members->map(function ($data, $key) {
            return [
                '1' =>  $key + 1,
                '2' => $data->membership_number,
                '3' => $data->civil_id . ' ',
                '4' => $data->name,
                '5' => $data->type,
                '6' => $data->professions?->name,
                '7' => $data->email,
                '8' => $data->kw_primary_contact_number,
                '9' => $data->kw_area,
                '10' => $data->specializations?->name,
                '11' => $data->qualifications?->name,
                '12' => $data->in_district,
                '13' => $data->members?->name,
                '14' => $data->area,
                '15' => $data->renewal_status,
                '16' => $data->doj?->format('d.M.Y'),
                '17' => $data->approved_date?->format('d.M.Y'),
                '18' => $data->next_renewal_date?->format('d.M.Y'),
            ];
        });
    }

    public function headings(): array
    {
        return ['SL No', 'Membership ID', 'Civil ID', 'Name', 'Type', 'Profession', 'Email', 'Primary Contact', 'Place / Area', 'Industry / Specialization', 'Qualification', 'District', 'Referred by', 'Area', 'Renewal Status', 'Join Date', 'Approved Date', 'Next Renewal Date'];
    }

    /*public function map($data): array
    {
        return $data;
    }*/

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
    }
}
