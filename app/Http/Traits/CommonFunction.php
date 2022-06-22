<?php
namespace App\Http\Traits;
use Auth;
use App\Models\FamilyType;
use App\Models\User;
use App\Models\UserPartnerPreference;
use App\Models\UserDetail;
use App\Models\Occupation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
trait CommonFunction
{
    public function getPercentage($income,$manglik,$family,$occupation)
    {
        $info=User::join('user_details','user_details.user_id','users.id')
        ->join('user_partner_preferences','user_partner_preferences.user_id','user_details.user_id')
        ->select('users.first_name','users.last_name','users.email',
        'user_details.gender','user_details.annual_income','user_details.occupation','user_partner_preferences.*')
        ->where('users.id',Auth::user()->id)->first();

        // Get Partner preference of a logged user
        $partner_income_min=$info->partner_income_min;
        $partner_income_max=$info->partner_income_max;
        $partner_occupation=$info->partner_occupation;
        $partner_family=$info->partner_family;
        $partner_manglik=$info->partner_manglik;
        $percentage=0;
        if($income >= $partner_income_min)
        {
            $percentage+=20;
        }
        if($income <= $partner_income_max)
        {
            $percentage+=20;
        }
        if($occupation == $partner_occupation)
        {
            $percentage+=20;
        }
        if($family == $partner_family)
        {
            $percentage+=20;
        }
        if($manglik == $partner_manglik)
        {
            $percentage+=20;
        }
        return $percentage;
    }
}
?>