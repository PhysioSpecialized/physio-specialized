<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class PerfilController extends Controller
{
    public function edit()
    {
        $usuario = Auth::user();
        
        return view('perfil.editProfile', compact('usuario'));
    }

    public function update(Request $request, $id)
    {

    try{

        $usuario = User::find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Ha ocurrido un error. No se pudo realizar la operación.');
        }

        //validar email
        $existingEmail = User::where('email', $request->input('email_opcion'))
            ->where('id', '<>', $id)
            ->first();

        if ($existingEmail) {
            return redirect()->route('perfil.edit')->with('error', 'El correo electrónico ya está registrado.');         
        }


        // Verificar si no hay cambios en los campos
        if (
            $usuario->name == $request->input('nombre_opcion') &&
            $usuario->email == $request->input('email_opcion') &&
            !$request->filled('contrasenia_nueva')
        ) {
            return redirect()->route('perfil.edit')->with('info', 'No hay cambios por hacer.');
        }


         // Definimos las reglas de validación
         $rules = [

            'nombre_opcion' => 'required',
            'email_opcion' => 'required|email|unique:users,email,'.$id.',id',

            'contrasenia_nueva' => [
                'nullable',
                'min:8', 
                function ($attribute, $value, $fail) use ($request, $usuario) {
                    // Verifica si la contraseña nueva es igual a la contraseña antigua
                    if (Hash::check($value, $usuario->password)) {
                        $fail('La contraseña nueva no puede ser igual a la contraseña antigua.');
                    }
                },
            ],
        ];

        $messages = [

            'nombre_opcion.required' => 'Debes registrar al menos un nombre',


      

            'email_opcion.required' => 'El campo "email" es obligatorio.',
            'email_opcion.unique' => 'El email ya está registrado, intenta de nuevo',
            'email_opcion.email' => 'Ingresa una dirección de email correcta.',

            'contrasenia_nueva.min' => 'La contraseña nueva debe tener al menos 8 caracteres.',


        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('perfil.edit') 
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->filled('contrasenia_nueva')) {
            if ($request->input('contrasenia_nueva') === $request->input('comprobar_contrasenia')) {
                if (Hash::check($request->input('contrasenia_antigua'), $usuario->password)) {
                    $usuario->password = bcrypt($request->input('contrasenia_nueva'));
                } else {
                    return redirect()->route('perfil.edit')->with('error', 'La contraseña actual es incorrecta.');
                }
            } else {
                return redirect()->route('perfil.edit')->with('error', 'La nueva contraseña y la confirmación no coinciden.');
            }
        }
        
        
        // Si no se proporcionó una nueva contraseña, actualizar otros datos
        $usuario->name = $request->input('nombre_opcion');
        $usuario->email = $request->input('email_opcion');
        
        $usuario->save();
        
        return redirect()->route('dashboard')->with('success', 'Información actualizada exitosamente');


    }catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Throwable $th) {
        return redirect()->route('dashboard')->with('error', 'Sucedio un error al actualizar la informaciòn');
    }
}



}
