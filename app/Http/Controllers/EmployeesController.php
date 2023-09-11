<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employees::all();

        return $employees;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'proceedings' => 'required|integer',
            'name' => 'required|string|max:150',
            'birthdate' => 'required|date',
            'rfc' => 'required|string|max:13',
            'email' => 'required|email|max:70',
            'phone' => 'required|string|max:13'
        ], [
            'proceedings.required' => 'El campo "Proceedings" es obligatorio.',
            'name.required' => 'El campo "Name" es obligatorio.',
            'name.string' => 'El campo "Name" debe ser una cadena de caracteres.',
            'name.max' => 'El campo "Name" no debe exceder los 150 caracteres de longitud.',
            'birthdate.required' => 'El campo "Birthdate" es obligatorio con formato yyyy-mm-dd.',
            'birthdate.date' => 'El campo "Birthdate" debe ser una fecha válida.',
            'rfc.required' => 'El campo "RFC" es obligatorio.',
            'rfc.string' => 'El campo "RFC" debe ser una cadena de caracteres.',
            'rfc.max' => 'El campo "RFC" no debe exceder los 13 caracteres de longitud.',
            'email.required' => 'El campo "Email" es obligatorio.',
            'email.email' => 'El campo "Email" debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo "Email" no debe exceder los 70 caracteres de longitud.',
            'phone.required' => 'El campo "Phone" es obligatorio.',
            'phone.string' => 'El campo "Phone" debe ser una cadena de caracteres.',
            'phone.max' => 'El campo "Phone" no debe exceder los 13 caracteres de longitud.'
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json([
                'errors' => $errors
            ], 422);
        }

        $employed = Employees::create([
            'proceedings' => $request->input('proceedings'),
            'name' => $request->input('name'),
            'birthdate' => $request->input('birthdate'),
            'rfc' => $request->input('rfc'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);

        return response()->json([
            'message' => 'Employed was created successfully',
            'data' => $employed
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $employed = Employees::findOrFail($id);

            $employed->delete();

            return response()->json([
                'message' => 'employed was removed'
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'message' => 'The place not found'
            ], 500);

        }
    }
}
