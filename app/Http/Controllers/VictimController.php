<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class VictimController extends Controller
{
    public function upload(Request $request)
{
    $file = $request->file('file');
    $filePath = $file->store('csv', 'local');
    //dd($filePath);

    $data = array_map('str_getcsv', file(storage_path('app/' . $filePath)));

    // Remove the header row
    array_shift($data);

    // Chunk the data into smaller arrays to avoid memory issues
    $chunks = array_chunk($data, 1000);

    foreach ($chunks as $chunk) {
        $formattedData = array_map(function ($row) {
            $vulnerabilities = json_decode($row[10]);

            return [
                'uuid' => $row[1],
                'filled_da_form_id' => $row[2],
                'da_cnic' => $row[3],
                'da_occupant_name' => $row[4],
                'gender' => $row[5],
                'district' => $row[6],
                'tehsil' => $row[7],
                'union_council' => $row[8],
                'deh' => $row[9],
                'widows' => $this->getVulnerabilityValue($vulnerabilities, 'Widows'),
                'women_with_disable_husband' => $this->getVulnerabilityValue($vulnerabilities, 'Women with disable husband'),
                'divorced_abandoned_unmarried_older_dependent_on_others' => $this->getVulnerabilityValue($vulnerabilities, 'Women with households Divorced / abandoned women\n                / unmarried older women dependent on others'),
                'people_with_disability_physically_or_mentally' => $this->getVulnerabilityValue($vulnerabilities, 'People with disability (physically or mentally)'),
                'unaccompained_minors_i_e_orphans' => $this->getVulnerabilityValue($vulnerabilities, 'Unaccompained minors i.e. orphans'),
                'unaccompained_elders_over_the_age_of_60' => $this->getVulnerabilityValue($vulnerabilities, 'Unaccompained elders, over the age of 60')
            ];
        }, $chunk);

        DB::table('victims')->insert($formattedData);
    }

    Storage::delete($filePath);

    return response()->json(['message' => 'CSV data uploaded successfully.']);
}

private function getVulnerabilityValue($vulnerabilities, $label)
{
    foreach ($vulnerabilities as $vulnerability) {
        if ($vulnerability->label === $label) {
            return $vulnerability->value;
        }
    }

    return false;
}
}
