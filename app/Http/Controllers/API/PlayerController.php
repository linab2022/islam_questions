<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Player;
use App\Models\PlayerAccount;
use Illuminate\Support\Facades\DB;

class PlayerController extends BaseController
{
    public function createNewPlayer() {
        try {
            $player = Player::create();
            return $this->SendResponse($player, 'Player is created successfully');
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }

    public function getPlayerName($id) {
        try {
            $player=Player::find($id);
            if (is_null($player))
                return $this->SendError('Error','The player of this id is not found'); 
            else 
            {
                if (is_null($player->player_name))
                    $player_name='المتسابق رقم '.$player->id;
                else
                    $player_name=$player->player_name;
                return $this->SendResponse(['player_name' => $player_name],'Player Name is retrieved Successfully!');
            }   
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }

    public function updatePlayerName(Request $request, $id) {
        try {
            $input = $request->all();
            $validator = Validator::make($input , [
                'player_name'=>'required',
            ]);
            if ($validator->fails())
                return $this->SendError('Validate Error',$validator->errors());
            
            $player=Player::find($id);
            if (is_null($player))
                return $this->SendError('Player of this id is not found');
            $player->player_name=$input['player_name'];
            $player->save();
            return $this->SendResponse(['player_name' => $player->player_name], 'Player Name is updated Successfully!');
        } catch (\Throwable $th) {
            return $this->SendError('Error',$th->getMessage());
        }
    }

    public function isRegistered($id) {
        try
        {
            $player=Player::find($id); 
            if (is_null($player))
                return $this->SendError('Error','The player of this id is not found'); 
            else
            {
                if (is_null($player->player_account)) 
                    return $this->SendResponse(['status'=>'Player is not registered'], 'Player status');
                else
                    return $this->SendResponse(['status'=>'Player is registered'], 'Player status');
            }
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }

    public function createNewPlayerWithAccount(Request $request) {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'player_name' => 'required',
                'player_email' => 'required|unique:player_accounts,player_email| email',
                'email_type' => ['required',Rule::in(['facebook','gmail'])]
            ,]);

            if ($validator->fails())
                return $this->SendError('Validate Error', $validator->errors());            
            
            $player = Player::create(['player_name' => $input['player_name']]);
            $player->player_account=PlayerAccount::Create(
                ['player_email' => $input['player_email'],'email_type' => $input['email_type'], 'player_id' => $player->id]
            );
            return $this->SendResponse($player, 'Player is created successfully');
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }

    public function increaseScore(Request $request, $id) {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'player_score' => 'required',
            ]);

            if ($validator->fails())
                return $this->SendError('Validate Error', $validator->errors());            

            $player=Player::find($id);
            if (is_null($player))
                return $this->SendError('Error','Player of this id is not found'); 
            else {
                    $player->player_score=$player->player_score+$input['player_score'];
                    $player->play_count=$player->play_count+1;
                    $player->save();  
                    return $this->SendResponse(['player_score' => $player->player_score], 'Player score is updated Successfully!');
                }
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }

    public function getPlayerScore($id) {
        try {
            $player=Player::find($id);
            if (is_null($player))
                return $this->SendError('Error','Player of this id is not found'); 
            else  
                return $this->SendResponse(['player_score' => $player->player_score], 'Player score');   
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        }
    }

    public function getLeaderboard() {
        try {
            $leaderboard= DB::table('players')
                ->select('id','player_name','player_score')
                ->orderByDesc('player_score')
                ->orderBy('id')->take(100)->get();
            foreach($leaderboard as $p)
            {    
                if (is_null($p->player_name))
                    $p->player_name='المتسابق رقم '.$p->id;
            }    
            return $this ->sendResponse($leaderboard,'Leaderboard is retrieved successfully');
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        }
    }
}
