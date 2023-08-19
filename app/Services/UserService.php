<?php

namespace App\Services;
use App\Repositories\UserRepositoryInterface;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {

        if (!$request['is_enabled']) {
            $request['is_enabled'] = 0;
        }

        $mensagens = [
            'name.required' => 'O nome do usuário é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'email.required' => 'O email do usuário é obrigatório!',
            'email.email' => 'O e-mail é inválido',
            'email.unique' => 'O e-mail já existe',

            'password.required' => 'A senha do usuário é obrigatório!',
            'password.min' => 'É necessário no mínimo 5 caracteres na senha usuário!',
            'password.max' => 'É necessário no Máximo 10 caracteres na senha do usuário!',
            'password.confirmed' => 'É necessário confirmar a senha!',

            'password_confirmation.min' => 'A confirmação da senha do usuário é obrigatório!',
            'password_confirmation.required' => 'É necessário no mínimo 5 caracteres na senha usuário para confirmar!',

            'type.required' => 'O tipo do usuário é obrigatório!',
            'type.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'type.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'is_enabled.required' => 'O is_enabled do usuário é obrigatório!',

        ];

        $data = $request->validate([
            'employee_id' => 'int|nullable',
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|string|min:5',
            'type' => 'required|string|min:2',
            'is_enabled' => 'required|boolean',

        ], $mensagens);

        $data['password'] = Hash::make($data['password']);

        return $this->repo->store($data);
    }

    public function users()
    {
        return $this->repo->users();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
        if (!$request['is_enabled']) {
            $request['is_enabled'] = 0;
        }

        $mensagens = [
            'name.required' => 'O nome do usuário é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'email.required' => 'O email do usuário é obrigatório!',
            'email.email' => 'O e-mail é inválido',
            'email.unique' => 'O e-mail já existe',

            'type.required' => 'O tipo do usuário é obrigatório!',
            'type.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'type.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'is_enabled.required' => 'O is_enabled do usuário é obrigatório!',

        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email',
            'type' => 'required|string|min:5',
            'is_enabled' => 'required|boolean',

        ], $mensagens);

        // // Upload de imagem
        // $file = $data['image'];

        // if($file) {
        //     $nameFile = $file->getClientOriginalName();

        //     // Encontrar arquivo antigo para deletar
        //     $oldFile = $this->repo->get($id); // encontrar dados do usuário
        //     Storage::disk('public')->delete("$oldFile->image");

        //     $file = $file->storeAs('users', $nameFile);
        //     $data['image'] = $file;
        // }

        // dd($data);
        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }

    public function getDataUser($cpf)
    {
        return $this->repo->getDataUser($cpf);
    }
}

?>
