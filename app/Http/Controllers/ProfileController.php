<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\imageTrait;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use imageTrait;

    public function financial_report()
    {

        return view('frontend.users.financialReport');
    }

    public function store_financial_report(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'financial_report'  => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $request->all();
        $user = auth()->user();

        if ($request->financial_report) {

            $image = $user->profile()->financial_report;

            if ($image) {
                unlink($image);
            }

            $path = $this->store_image_file2($request->financial_report, 'financial_report');

            $profile_info = $user->profile()->updateOrCreate(['user_id' => $user->id], [
                'financial_report' => $path,
            ]);
            dd($profile_info);
        }

        return redirect()->back()->with([
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        ]);
    }
}
