<?php 

require_once('app/Requests/BaseRequest.php');

class AuthRequest extends BaseRequest
{
    public function validateRegister($data,$checkUsers)
    {
        // print_r($checkUsers);die();
        $isPasswordEmptied = false;
        if(empty($data['email']))
        {
            $this->errors['email'] = "Email không được để trống";
        }

        foreach ($checkUsers as $checkUser) {
            if($data['email'] == $checkUser['email']) {
                $this->errors['email'] = "Email đã có người sử dụng";
            } else {
                continue;
            }

            if($data['phone_number'] == $checkUser['phone_number']) {
                $this->errors['phone_number'] = "Số điện thoại đã có người sử dụng";
            } else {
                continue;
            }
        }

        if(strlen($data['phone_number']) != 10) {
            $this->errors['phone_number'] = "Sai số điện thoại";
        }

        if(strlen($data['password']) < 8 && strlen($data['password_confirmation']) < 8) {
            $this->errors['password'] = "Password phải có 8 kí tự trở lên";
        }

        if(empty($data['password']))
        {
            $this->errors['password'] = "Password không được để trống";
            $isPasswordEmptied = true;
        }

        if(empty($data['password_confirmation']))
        {
            $this->errors['password_confirmation'] = "Password xác nhận không được để trống";
            $isPasswordEmptied = true;
        }

        if(!$isPasswordEmptied)
        {
            if($data['password'] != $data['password_confirmation'])
            {
                $this->errors['password_confirmation'] = "Password phải giống nhau";
            }
        }
        return $this->errors;
    }
}