<?php

namespace Modules\Iprofile\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Ihelpers\Transformers\BaseApiTransformer;
use Modules\Iprofile\Transformers\UserTransformer;

class AddressTransformer extends BaseApiTransformer
{
  public function toArray($request)
  {
  
    return [
      'id' => $this->when($this->id, $this->id),
      'firstName' => $this->when($this->first_name, $this->first_name),
      'lastName' => $this->when($this->last_name, $this->last_name),
      'company' => $this->when($this->company, $this->company),
      'address1' => $this->when($this->address_1, $this->address_1),
      'address2' => $this->when($this->address_2, $this->address_2),
      'city' => $this->when($this->city, $this->city),
      'zipCode' => $this->when($this->zip_code, $this->zip_code),
      'country' => $this->when($this->country, $this->country),
      'state' => $this->when($this->state, $this->state),
      'appSuit' => $this->when($this->app_suit, $this->app_suit),
      'type' => $this->when($this->type, $this->type),
      'createdAt' => $this->when($this->created_at, $this->created_at),
      'updatedAt' => $this->when($this->updated_at, $this->updated_at),
      'user' => new UserTransformer($this->whenLoaded('user')),
    ];
  
  }
}
