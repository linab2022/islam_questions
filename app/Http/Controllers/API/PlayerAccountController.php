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
            $p_email=$input['player_email'];
            $e_type=$input['email_type'];
            $validator = Validator::make($input, [
                'player_name' =>'required',
                'player_email' => [
                    'required','email',
                    Rule::unique('player_accounts')->where(function ($query) use($p_email,$e_type) {
                    return $query->where('player_email', $p_email)->where('email_type', $e_type);
                    })],                
                'email_type' => ['required',Rule::in(['facebook','gmail'])]
            ,]);

            $player=Player::find($id);
            if (is_null($player))
                return $this->SendError('Error','Player of this id is not found');

            if ($validator->fails())        
                if (Str::contains($validator->errors(), 'The player email has already been taken')) {
                    $player_account=PlayerAccount::where('player_email', $input['player_email'])->where('email_type', $input['email_type'])->first();
                    if ($player_account->player_id==$id)
                    {
                        if (is_null($player->player_name))
                            $player_name='المتسابق رقم '.$player->id;
                        else
                            $player_name=$player->player_name;
                        return $this->SendResponse(['player_name' => $player_name,
                                                    'id' => $player_account->player_id,
                                                    'player_account' => $player_account], 'Player is retrieved successfully');
                    }
                    else 
                    {
                        //return $this->SendError('Error', 'This email is registered previously with different id');
                        if (is_null($player->player_account)) {
                            $oldplayer=Player::find($player_account->player_id);
                            if (is_null($oldplayer->player_name))
                                $player_name='المتسابق رقم '.$oldplayer->id;
                            else
                                $player_name=$oldplayer->player_name; 
                            
                            $player->delete();    
                            return $this->SendResponse(['player_name' => $player_name,
                                                        'id' => $player_account->player_id,
                                                        'player_account' => $player_account], 'Player is retrieved successfully');
                        }
                        else
                            return $this->SendError('Error','This Player was registered previously');
                    }             
                } 
                else
                    return $this->SendError('Validate Error', $validator->errors());              

                if (is_null($player->player_account)) {
                    $player_account=PlayerAccount::Create(
                        ['player_email' => $input['player_email'],'email_type' => $input['email_type'], 'player_id' => $id]
                    );   
                    $player->player_name=$input['player_name'];
                    $player->save();               
                    return $this->SendResponse(['player_name' => $input['player_name'],
                                                'id' => $player_account->player_id,
                                                'player_account' => $player_account], 'Player is created successfully');
                }
                else
                    return $this->SendError('Error','This Player was registered previously');
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }   
}
