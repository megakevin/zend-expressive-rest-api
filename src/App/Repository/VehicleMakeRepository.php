<?php

namespace App\Repository;

class VehicleMakeRepository
{
    private $makes = [
        ['id' => 1, 'name' => 'Toyota', 'country' => 'Japan'],
        ['id' => 2, 'name' => 'Honda', 'country' => 'Japan'],
        ['id' => 3, 'name' => 'Subaru', 'country' => 'Japan'],
        ['id' => 4, 'name' => 'Ford', 'country' => 'USA']
    ];

    private $lastId = 4;

    public function getAll()
    {
        return $this->makes;
    }

    public function getById($id)
    {
        $make = array_filter(
            $this->makes, 
            function($m) use ($id) {
                return $m['id'] == $id; 
            }
        );

        if ($make) {
            return $make[0];
        } else {
            return null;
        }
    }

    public function create($data)
    {
        $newMake = [
            'id' => $this->lastId + 1,
            'name' => $data['name'],
            'country' => $data['country']
        ];

        $this->makes[] = $newMake;

        return $newMake;
    }

    public function update($id, $data)
    {
        $makeToUpdate = $this->getById($id);

        $makeToUpdate['name'] = $data['name'] ?? $makeToUpdate['name'];
        $makeToUpdate['country'] = $data['country'] ?? $makeToUpdate['country'];

        return $makeToUpdate;
    }

    public function delete($id)
    {
        $makeToDelete = $this->getById($id);

        // Imagine we delete the make from the array here

        return $makeToDelete;
    }
}
