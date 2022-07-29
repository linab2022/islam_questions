<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Player;
use App\Models\PlayerAccount;
use Illuminate\Support\Str;

class PlayerAccountController extends BaseController
{
    public function createPlayerAccount(Request $request, $id) {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'player_email' => 'required|unique:player_accounts,player_email|email',
                'email_type' => ['required',Rule::in(['facebook','gmail'])]
            ,]);

            if ($validator->fails())
                if (Str::contains($validator->errors(), 'The player email has already been taken'))  
                {
                    $player=Player::find($id);
                    if (is_null($player))
                        return $this->SendError('Error','Player of this id is not found'); 
                    $player_account=PlayerAccount::where('player_email', $input['player_email'])->first();
                    if ($player_account->player_id==$id)
                        return $this->SendResponse($player_account, 'Player account is retrieved successfully');
                    else 
                        return $this->SendError('Error', 'This email is registered previously with different id');                            
                }  
                else
                    return $this->SendError('Validate Error', $validator->errors());              

            $player=Player::find($id);
            if (is_null($player))
                return $this->SendError('Error','Player of this id is not found'); 
            else {               
                if (is_null($player->player_account)) {
                    $player_account=PlayerAccount::Create(
                        ['player_email' => $input['player_email'],'email_type' => $input['email_type'], 'player_id' => $id]
                    );                  
                    return $this->SendResponse($player_account, 'Player account is created Successfully!');
                }
                else
                    return $this->SendError('Error','This Player was registered previously');
                }
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }   
}
