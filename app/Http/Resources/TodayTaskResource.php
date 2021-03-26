<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodayTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            /* here you have to use $this. In other cases we use $request->id , 
            but in Resource file $request does not work. although we are receiving data as $request, 
            but we have to use $this */
            'id' => $this->id,  
            'title' => $this->title,
            'completed' => $this->completed,
            'approved' => $this->approved,
            'taskId' => $this->taskId
        ];
    }
}
