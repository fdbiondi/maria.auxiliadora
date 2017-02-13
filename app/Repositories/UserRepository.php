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
        return $this->getModel()->create(
            $this->prepareDataToSave($data)
        );
    }

    /**
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id, Array $data)
    {
        $user = $this->findOrFail($id);

        $user->fill(
            $this->prepareDataToSave($data)
        );

        if(trim($data["password"]) != "")
            $user->password = bcrypt(trim($data["password"]));

        return $user->save();
    }

    public function delete($id)
    {
        return true;
    }

    public function prepareDataToSave(Array $data) {
        return [
            'name' => trim($data["name"]),
            'last_name' => trim($data["last_name"]),
            'email' => trim($data["email"]),
            'password' => bcrypt(trim($data["password"])),
            'dni' => trim($data["dni"]),
            'address' => trim($data["address"]),
            'phone' => trim($data["phone"]),
            'city_id' => $data["city_id"],
            'role_id'=> $data["role_id"],
        ];
    }

}