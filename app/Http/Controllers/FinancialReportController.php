<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ReportComment;
use App\Http\Traits\imageTrait;
use App\Models\FinancialReport;
use Illuminate\Support\Facades\File;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewCommentForAdminNotify;

class FinancialReportController extends Controller
{
    use imageTrait;
    public function store(Request $request, $id)
    {
        $request->validate([
            'financial_report1' => ['required'],
        ]);
        $user = User::whereId($id)->first();
        $f = FinancialReport::whereUserId($id)->first();
        // if ($f->financial) {
        //     unlink($f->financial);
        // }
        $image = $request->file('financial_report1');
        $file_name = $image->getClientOriginalName();


        // $request->user()->report()->updateOrCreate(['upload_to' => $user->id], [
        $request->user()->report()->create([
            'upload_to' => $user->id,
            'financial' => $file_name,
            'user_id' => auth()->user()->id,
        ]);

        $imageName = $request->financial_report1->getClientOriginalName();
        $request->financial_report1->move(public_path('upload_attachments/' . $user->id . '/' . 'financial_report'), $imageName);

        return redirect()->back()->with([
            'message' => 'Financial report created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function financial_report()
    {

        $financial_file = FinancialReport::where('upload_to', auth()->user()->id)->get();

        $comments = auth()->user()->report_comments()
            ->with(['report', 'user'])->get();
        // $comments = ReportComment::whereUserId(auth()->user()->id)->first();
        return view('frontend.users.financialReport', compact('comments', 'financial_file'));
    }

    public function open_file($user_id, $file_name)

    {
        $files = Storage::disk('upload_attachments')->getDriver()->getAdapter()->applyPathPrefix('upload_attachments/' . $user_id . '/financial_report//' . $file_name);
        return response()->file($files);
    }

    public function get_file($user_id, $file_name)

    {
        $contents = Storage::disk('upload_attachments')->getDriver()->getAdapter()->applyPathPrefix('upload_attachments/' . $user_id . '/visa_attachment//' . $file_name);
        return response()->download($contents);
    }

    public function destroy(Request $request, $id)
    {
        $f_file = FinancialReport::whereId($id)->first();
        if ($f_file->financial != '') {
            if (File::exists('upload_attachments/' . $f_file->upload_to . '/' . 'financial_report/' . $f_file->financial)) {
                unlink('upload_attachments/' . $f_file->upload_to . '/' . 'financial_report/' . $f_file->financial);
            }
        }

        $f_file->delete();


        return back();
    }

    public function store_report_comment(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'comment'   => 'required|min:10',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        // $f = FinancialReport::whereUserId(auth()->user()->id)->first();
        $f = FinancialReport::whereUploadTo(auth()->user()->id)->first();

        // $f_report = FinancialReport::whereId($id)->first();



        $userId = auth()->check() ? auth()->id() : null;
        $data['name']           = auth()->user()->name; //$request->name;
        $data['email']          =  auth()->user()->email; //$request->email;
        $data['comment']        = Purify::clean($request->comment);
        $data['user_id']        = $userId;
        $data['financial_report_id'] = $f->id;

        $comment = ReportComment::create($data);

        // if (auth()->guest() || auth()->id() != $user->user_id) {
        //     $user->user->notify(new NewCommentForPostOwnerNotify($comment));
        // }

        User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'editor']);
        })->each(function ($admin, $key) use ($comment) {
            $admin->notify(new NewCommentForAdminNotify($comment));
        });
        return redirect()->back()->with([
            'message' => __('Frontend/general.comment_added_successfully'),
            'alert-type' => 'success'
        ]);


        return redirect()->back()->with([
            'message' => __('Frontend/general.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    //save comment by admin and auditor
    public function show_financial_report($id)
    {
        $financialReport_id = FinancialReport::query()
            ->with('report_comments')
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->whereId($id)
            ->first();
        $comments = $financialReport_id->report_comments()
            ->with(['report', 'user'])->get();
        return view('backend.users.show_financial_report', compact('financialReport_id', 'comments'));
    }

    public function store_comment(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            //'name'      => 'required',
            //'email'     => 'required|email',
            // 'url'       => 'nullable|url',
            'comment'   => 'required|min:10',
        ]);
        if ($validation->fails()) {
            toastr()->error('There is no written comment', 'Something Wrong');
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $post = FinancialReport::whereId($id)->first();
        if ($post) {

            $userId = auth()->check() ? auth()->id() : null;
            $data['name']           = auth()->user()->name; //$request->name;
            $data['email']          =  auth()->user()->email; //$request->email;
            $data['comment']        = Purify::clean($request->comment);
            $data['financial_report_id']        = $post->id;
            $data['user_id']        = $userId;

            $comment = $post->report_comments()->create($data);

            // if (auth()->guest() || auth()->id() != $post->user_id) {
            //     $post->user->notify(new NewCommentForPostOwnerNotify($comment));
            // }

            User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'editor']);
            })->each(function ($admin, $key) use ($comment) {
                $admin->notify(new NewCommentForAdminNotify($comment));
            });
            toastr()->success(__('Frontend/general.comment_added_successfully'));
            return redirect()->back();
        }

        return redirect()->back()->with([
            'message' => __('Frontend/general.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }
}
