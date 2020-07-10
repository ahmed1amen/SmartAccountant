<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Name'          =>  $this->Name,
            'Invoices'      =>  $this->invoices,
            'LastInvoice'   =>  $this->invoices->last(),
        ];
    }
}
