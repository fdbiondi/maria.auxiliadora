<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository extends BaseRepository
{
    protected $table = "users";
    protected $column = "last_name";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new User();
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

        if(isset($data["password"]) && $data["password"] != "")
            $user->password = $data["password"];

        if(isset($data["role_id"]))
            $user->role_id = $data["role_id"];

        return $user->save();
    }

    public function delete($id)
    {
        return true;
    }
}