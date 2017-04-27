<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use auth;
use DB;
use Response;

class MarkController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $mark = Mark::where([['user_id', $request->userId], ['book_id', $request->bookId]])->get()->first();
            if ($mark && Auth::user()->id == $mark->user_id && $request->bookId == $mark->book_id) {
                if ($request->type == 2) {
                    if ($mark->read_status == $request->readStatus) {
                        if ($mark->read_status == 0) {
                            $mark->read_status = 1;
                        } elseif ($mark->read_status == 2) {
                            $mark->read_status = 1;
                        } else {
                            $mark->read_status = config('custom.readStatus');
                        }
                    } else {
                        $mark->read_status = 1;
                    }
                } elseif ($request->type == 3) {
                    if ($mark->read_status == $request->readStatus) {
                        if ($mark->read_status == 0) {
                            $mark->read_status = 2;
                        } elseif ($mark->read_status == 1) {
                            $mark->read_status = 2;
                        } else {
                             $mark->read_status = config('custom.readStatus');
                        }
                    } else {
                        $mark->read_status = 2;
                    }
                } else {
                    if ($mark->favorite == $request->favoriteStatus) {
                        if ($mark->favorite == 0) {
                            $mark->favorite = 1;
                        } else {
                            $mark->favorite = 0;
                        }
                    } else {
                        $mark->favorite = $request->favoriteStatus;
                    }
                }
                    $mark->update();
                    return response()->json($mark);
            } else {
                $mark = new Mark;
                $mark->user_id = Auth::user()->id;
                $mark->book_id = $request->bookId;
                if ($request->type == 1) {
                    $mark->favorite = 1;
                    $mark->read_status = config('custom.readStatus');
                } elseif ($request->type ==2) {
                    $mark->read_status = 1;
                    $mark->favorite = config('custom.favoriteStatus');
                } else {
                    $mark->readStatus = 2;
                }
                $mark->save();
                return $mark;
            }
        }
    }
}
