<?php

namespace App\Http\Controllers;

use App\Models\Remark;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Resources\Applicant\DT;
use App\Service\PDF;
use Carbon\Carbon;
// use mikehaertl\pdftk\Pdf;

class ApplicantsController extends Controller
{
    
    public function index()
    {

        if (request()->ajax()) {
            return response()->json($this->_dt());
        }

        return view('applicant.index');
    }

    public function show($id)
    {
        $applicant = Applicant::with('scholar', 'remarks')->find($id);

        return view('applicant.show', [
            'applicant' => $applicant
        ]);
    }


    public function assess(Request $request, $id)
    {
        $applicant = Applicant::with('scholar')->find($id);

        if($applicant->scholar == null){

            $scholar = Scholar::create([
                'applicant_id' => $applicant->id,
                'period' => [
                    'start' => $request->post('period_start'),
                    'end' => $request->post('period_end'),
                ],
                'amount' => $request->post('amount'),
                'status' => $request->post('status')
            ]);

        } else {
            $applicant->scholar()->update([
                'status' => $request->post('status')
            ]);
        }

        
        $remark = Remark::create([
            'applicant_id' => $applicant->id,
            'remark' => $request->post('remarks'),
            'status' => $request->post('status'),
            'user_id' => auth()->user()->id
        ]);


        return response()->json([
            'message'  => "Remark has been added.",
            'intended' => route('applicant.show', $id)
        ], 200);
    }

    public function _dt()
    {
        $applicants = Applicant::doesntHave('scholar')->get();

        $datas   = DT::collection($applicants);

        return [
            'heading' => ['#', 'Name', 'Address', 'School', 'Action'],
            'data'    => $datas,
        ];

    }

    public function print($id)
    {
        $applicant = Applicant::with('scholar', 'remarks')->findOrFail($id);

        $pdf = new PDF($applicant);

        $result = $pdf->raw();

        dd($result);




        // $pdf = new Pdf(base_path('pdf/form.pdf'));

        // $pdf->fillForm();


        // $result = $pdf->needAppearances()->flatten()->send();

    }

    



}
