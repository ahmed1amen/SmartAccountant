<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
// use Musonza\Chat\Chat;
use \Chat;
use Musonza\Chat\Models\Conversation;

class ChatController extends Controller
{

    /** @var  UserRepository */
    private $userRepository;


    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }



    public function index()
    {
        $user = \App\Models\User::find(request()->participant_id);
        $chat = Chat::conversations()->between(auth()->user(), $user);
        dd($chat);
        return view('admin.Messages.chat')->with([ 'users'=>$this->userRepository->all(), 'conversations' => $conversations ]);

    }

    public function store()
    {
        $participant = \App\Models\User::find(request()->participant_id);
        $participants = [auth()->user(), $participant];
        $message = request()->message;
        $conversation = Chat::createConversation($participants);
        Chat::message($message)
            ->from(auth()->user())
            ->to($conversation)
            ->send();
        return redirect()->back()->with(['conversation' => $conversation]);
    }

    public function participants($conversationId)
    {
        $participants = Chat::conversations()->getById($conversationId)->users;
        return response($participants);
    }

    public function join(Request $request, Conversation $conversation)
    {
        Chat::conversation($conversation)->addParticipants(auth()->user());
        return true;
    }

    public function leaveConversation(Request $request, Conversation $conversation)
    {
        Chat::conversation($conversation)->removeParticipants(auth()->user());
        return true;
    }

    public function getMessages(Request $request, Conversation $conversation)
    {
        $messages = Chat::conversation($conversation)->for(auth()->user())->getMessages();

        return response($messages);
    }

    public function deleteMessages(Conversation $conversation)
    {
        Chat::conversation($conversation)->for(auth()->user())->clear();
        return response()->json(['success' => true], 200);
    }

    public function sendMessage(Request $request, Conversation $conversation)
    {
        $message = Chat::message($request->message)
            ->from(auth()->user())
            ->to($conversation)
            ->send();
        return response($message);
    }





}
