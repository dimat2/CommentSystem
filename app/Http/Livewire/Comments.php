<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $newComment;

    public $image;

    public $ticketId = 1;

    protected $listeners = [
        "fileUpload" => "handleFileUpload"
        , "ticketSelected"
    ];

    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            "newComment" => "required|max:255"
        ]);
    }

    public function addComment()
    {
        $this->validate([
            "newComment" => "required|max:255"
        ]);

        $image = $this->storeImage();

        $createdComment = Comment::create(["body" => $this->newComment, "image" => $image, "user_id" => Auth::id(), "support_ticket_id" => $this->ticketId]);

        $this->newComment = "";
        $this->image = "";

        session()->flash("msg", "Sikeres hozzászólás.");
    }

    public function storeImage()
    {
        if (!$this->image)
            return null;

        $img = ImageManagerStatic::make($this->image)->encode("jpg");

        $name = Str::random() . ".jpg";

        Storage::disk("public")->put($name, $img);

        return $name;
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);

        $comment->delete();

        Storage::disk("public")->delete($comment->image);

        session()->flash("msg", "Sikeres törlés.");
    }

    public function render()
    {
        return view('livewire.comments', [
            "comments" => Comment::where("support_ticket_id", $this->ticketId)->latest()->paginate(2)
        ]);
    }
}
