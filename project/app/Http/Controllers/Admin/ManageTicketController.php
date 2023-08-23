<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\TicketMessage;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;

class ManageTicketController extends Controller
{
    public function index($type)
    {
        
        $search = request('search');
        $tickets = SupportTicket::when($search,function($q) use($search){ 
            return $q->where('ticket_num','like',"%$search%");
        })
        ->where('user_type','seller')->with(['user'])
        ->whereHas('messages')->latest()->paginate(15);

        $messages = TicketMessage::when(request('messages'),function($q){
            return $q->where('ticket_num',request('messages'));
        })->get();  

        return view('admin.ticket.index',compact('tickets','messages','type','search'));
    }

    public function replyTicket(Request $request,$ticket_num)
    {
        $request->validate(['message'=>'required','file'=>'mimes:pdf,jpeg,jpg,png,PNG,JPG']);
        $ticket = SupportTicket::where('ticket_num',$ticket_num)->firstOrFail();

        $message = new TicketMessage();
        $message->ticket_id      = $ticket->id;
        $message->ticket_num     = $ticket->ticket_num;
        $message->user_id        = $ticket->user_id;
        $message->admin_id       = admin()->id;
        $message->user_type      = $ticket->user_type;
        $message->message        = $request->message;
       
        if($request->file){
            $message->file = MediaHelper::sellerHandleMakeFile($request->file);
        }

        $message->save();
        $ticket->status = 1;
        $ticket->save();
        return back()->with('success','Replied successfully');
    }
}
