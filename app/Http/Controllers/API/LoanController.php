<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $loans = Loan::all();
        return response()->json($loans, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|integer|exists:books,id',
            'member_id' => 'required|integer|exists:members,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $loan = Loan::create($request->all());

        return response()->json($loan, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Loan $loan)
    {
        return response()->json($loan, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Loan $loan)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'sometimes|required|integer|exists:books,id',
            'member_id' => 'sometimes|required|integer|exists:members,id',
            'issue_date' => 'sometimes|required|date',
            'due_date' => 'sometimes|required|date',
            'return_date' => 'sometimes|nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $loan->update($request->all());

        return response()->json($loan, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return response()->json(null, 204);
    }
}

