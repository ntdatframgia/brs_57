<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use auth;

class MarkController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $mark = Mark::find($request->markId);
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
                    return $mark;
            } else {
                $mark = new Mark;
                if ($request->readStatus == null && $request->favoriteStatus == null) {
                    $mark->favorite = config('custom.favoriteStatus');
                    $mark->read_status = config('custom.readStatus');
                } elseif ($request->readStatus == null && $request->favoriteStatus != null) {
                    $mark->favorite = $request->favoriteStatus;
                    $mark->read_status = config('custom.readStatus');
                } elseif ($request->favoriteStatus == null && $request->readStatus != null) {
                    $mark->favorite = config('custom.favoriteStatus');
                    $mark->read_status = $request->readStatus;
                } else {
                    $mark->read_status = $request->readStatus;
                    $mark->favorite = $request->favoriteStatus;
                }
                    $mark->user_id = Auth::user()->id;
                    $mark->book_id = $request->bookId;
                    $mark->save();
                    return $mark;
            }
        }
    }
}
