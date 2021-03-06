<?php

namespace App\Http\Transformers;

use App\Http\Transformers;
use URL;

class UserTransformer extends Transformer 
{
    public function transform($data) 
    {
        return [
            'user_id'       => $data->id,
            'user_token'    => $this->nulltoBlank($data->token),
            'device_token'  => $this->nulltoBlank($data->device_token),
            'name'          => $this->nulltoBlank($data->name),
            'email'         => $this->nulltoBlank($data->email),
            'company_name'  => $this->nulltoBlank($data->company_name),
            'mobile'        => $this->nulltoBlank($data->mobile),
            'profile_pic'   => isset($data->profile_pic) ? URL::to('/').'/uploads/user/' . $data->profile_pic : '',
            'device_type'   => $this->nulltoBlank($data->device_type),
            'address'       => $this->nulltoBlank($data->address),
            'city'          => $this->nulltoBlank($data->city),
            'state'         => $this->nulltoBlank($data->state),
            'zip'           => $this->nulltoBlank($data->zip),
            'country'       => $this->nulltoBlank($data->country),
            'notification_count' => (int) 0
        ];
    }
    
    public function getUserInfo($data) 
    {
        return [
            'userId'    => $data->id,
            'name'      => $this->nulltoBlank($data->name),
            'email'     => $this->nulltoBlank($data->email)
        ];
    }
    
    /**
     * userDetail
     * Single user detail
     * 
     * @param type $data
     * @return type
     */
    public function userDetail($data) {
        return [
            'UserId' => isset($data['id']) ? $data['id'] : "",
            'QuickBlocksId' => isset($data['quick_blocks_id']) ? $data['quick_blocks_id'] : "",
            'MobileNumber' => isset($data['mobile_number']) ? $data['mobile_number'] : "",
            'Name' => isset($data['username']) ? $data['username'] : "",
            'Specialty' => isset($data['specialty']) ? $data['specialty'] : "",
            'ProfilePhoto' => isset($data['profile_photo'])?$this->getUserImage($data['profile_photo']):""
        ];
    }

    /*
     * User Detail and it's parameters
     */
    public function singleUserDetail($data){        
        return [
            'UserId' => $data['id'],            
            'Name' => $this->nulltoBlank($data['name']),
            'Email' => $this->nulltoBlank($data['email']),
            'MobileNumber' => $this->nulltoBlank($data['mobile_number']),
        ];
    }
    
    public function transformStateCollection(array $items) {
        return array_map([$this, 'getState'], $items);
    }

    /**
     * Update User
     * 
     * @param object $data
     * @return array
     */
    public function updateUser($data)
    {
        $headerToken = request()->header('Authorization');
        $userToken   = '';

        if($headerToken)
        {
            $token      = explode(" ", $headerToken);
            $userToken  = $token[1];
        }

        return [
            'user_id'           => (int) $data->id,
            'user_token'        => $userToken,
            'device_token'      => $this->nulltoBlank($data->device_token),
            'name'              => $this->nulltoBlank($data->name),
            'email'             => $this->nulltoBlank($data->email),
            'company_name'      => $this->nulltoBlank($data->company_name),
            'mobile'            => $this->nulltoBlank($data->mobile),
            'profile_pic'       => isset($data->profile_pic) ? URL::to('/').'/uploads/user/' . $data->profile_pic : '',
            'device_type'       => $this->nulltoBlank($data->device_type),
            'address'           => $this->nulltoBlank($data->address),
            'city'              => $this->nulltoBlank($data->city),
            'state'             => $this->nulltoBlank($data->state),
            'zip'               => $this->nulltoBlank($data->zip),
            'country'           => $this->nulltoBlank($data->country),
            'notification_count' => (int) 0
        ];  
    }
}
