<?php

namespace App\Repositories;

use App\Entities\User;
use Dotenv\Exception\ValidationException;

class UserRepository extends BaseRepository
{
    protected $table = 'users';
    protected $column = 'last_name';

    /**
     * @return \App\Entities\User
     */
    public function getModel()
    {
        return new User();
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'sometimes|required|min:6|confirmed',
            'dni' => 'required',
            'role_id' => 'required',
            'city_id' => 'required',
        ];
    }

    /**
     * @param array $data
     * @return User
     */
    public function create(Array $data)
    {
        return $this->getModel()->create([
            'name' => $data["name"],
            'last_name' => $data["last_name"],
            'email' => $data["email"],
            'password' => bcrypt($data["password"]),
            'dni' => $data["dni"],
            'address' => $data["address"],
            'phone' => $data["phone"],
            'city_id' => $data["city_id"],
            'role_id' => $data["role_id"],
        ]);
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id, Array $data)
    {
        $user = $this->findOrFail($id);

        $user->fill($data);

        if (isset($data["password"]) && $data["password"] != "") {
            $user->password = $data["password"];
        }

        if (isset($data["role_id"])) {
            $user->role_id = $data["role_id"];
        }

        return $user->save();
    }

    public function delete($id)
    {
        throw new ValidationException('NO IMPLEMENTADO', 422); //TODO
    }


    /**
     * @param String $role
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getWhereRole($role) {
        return $this->getModel()->selectRaw("users.*")
            ->join('roles', function ($join) use ($role) {
                $join->on('users.role_id', '=', 'roles.id')
                    ->where('roles.name', "$role");
                })
            ->get();
    }

    public function getStudentsWithOutRegister($year) {
        $students = $this->getModel()->selectRaw("users.*")
            ->join('roles', function ($join) {
                $join->on('users.role_id', '=', 'roles.id')
                    ->where('roles.name', 'student');
            })
            ->with('courses')
            ->get();
        
        $studentsWithOutRegister = [];

        foreach ($students as $student) {
            $register = true;

            if(isset($student->courses)) {
                foreach ($student->courses as $r) {
                    if ($r->year == $year) {
                        $register = false;
                        break;
                    }
                }
            }

            if ($register)
                $studentsWithOutRegister[] = $student;
        }

        return $studentsWithOutRegister;
    }

}