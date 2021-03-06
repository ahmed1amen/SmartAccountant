<?php

namespace App\Repositories\Admin;

use App\Models\Supervisor;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SupervisorRepository
 * @package App\Repositories\Admin
 * @version July 6, 2020, 5:37 am UTC
*/

class SupervisorRepository extends BaseRepository
{




    /**
     * @var array
     */
    protected $fieldSearchable = [
        'UserID',
        'MarketplaceOwnerID',
        'PhoneNumber'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }



    public function update($input, $id )
    {

        $query = $this->model->newQuery();
        $model = $query->findOrFail($id );
        $model->fill($input);
        $model->user->Name= $input['Name'];
        $model->user->save();
        $model->save();


        return $model;
    }

    /**
     * Create model record
     *
     * @param  array  $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);
        $model->MarketplaceOwnerID = $this->GetMyOwner();
        $model->save();

        return $model;
    }



    /**
     * Configure the Model
     **/
    public function model()
    {
        return Supervisor::class;
    }
}
