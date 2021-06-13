<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PageController extends Controller
{
    
    public function views(){
        $response = Http::withHeaders([
            'wsc-api-key' => 'jKuzVagYapnPUL3yok2Yw3tXk9iQSOaqrEdHhdN19QqfoF4o49p4gTRv9AGh3514',
            'wsc-access-key' => 'D8C0Q2dgsxXsG0hPs7ey8LQrkEC6wIYqDcMmsvqRwaz9Fh6QqLpcli0KCh9Y343e'
        ])->get('https://api.cloud.wowza.com/api/v1.4/usage/stream_targets/j53rt0tl/?from='.Carbon::now()->startOfDay());
        $response_month = Http::withHeaders([
            'wsc-api-key' => 'jKuzVagYapnPUL3yok2Yw3tXk9iQSOaqrEdHhdN19QqfoF4o49p4gTRv9AGh3514',
            'wsc-access-key' => 'D8C0Q2dgsxXsG0hPs7ey8LQrkEC6wIYqDcMmsvqRwaz9Fh6QqLpcli0KCh9Y343e'
        ])->get('https://api.cloud.wowza.com/api/v1.4/usage/stream_targets/j53rt0tl/?from='.Carbon::now()->startOfMonth()->subMonth()->startOfDay().'&to='.Carbon::now()->subMonth()->endOfMonth()->startOfDay());

      
        
        return  view('dashboard',['todayview'=>$response['stream_target']['unique_viewers'],'lastmontview' => $response_month['stream_target']['unique_viewers']]);
    }

    public function live(){
        
        return view('live');
    }

    public function viewdash(){
        $response = Http::withHeaders([
            'wsc-api-key' => 'jKuzVagYapnPUL3yok2Yw3tXk9iQSOaqrEdHhdN19QqfoF4o49p4gTRv9AGh3514',
            'wsc-access-key' => 'D8C0Q2dgsxXsG0hPs7ey8LQrkEC6wIYqDcMmsvqRwaz9Fh6QqLpcli0KCh9Y343e'
        ])->get('https://api.cloud.wowza.com/api/v1.6/usage/stream_targets/j53rt0tl/countries');
        
        return view('view',['response'=>$response]);

    }

    public function viewfilter(Request $request){
        $response = Http::withHeaders([
            'wsc-api-key' => 'jKuzVagYapnPUL3yok2Yw3tXk9iQSOaqrEdHhdN19QqfoF4o49p4gTRv9AGh3514',
            'wsc-access-key' => 'D8C0Q2dgsxXsG0hPs7ey8LQrkEC6wIYqDcMmsvqRwaz9Fh6QqLpcli0KCh9Y343e'
        ])->get('https://api.cloud.wowza.com/api/v1.6/usage/stream_targets/j53rt0tl/countries/?from='.$request->startdate.'&to='.$request->enddate);
        
        return view('view',['response'=>$response]);

    }

    public function livemain(){
        $response = Http::withHeaders([
            'Accept' => 'application/json; charset=utf-8'
        ])->get('http://87.61.80.203:8087/v2/servers/_defaultServer_/vhosts/_defaultVHost_/applications/livetv/instances');
        return view('livetest',['response1' => $response['instanceList']]);
       } 

       public function livesingle($id){
    
        return view('livesingle',['response1' => $id]);
       }
}
