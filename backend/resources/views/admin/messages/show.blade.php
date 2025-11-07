<h2>Discussion avec {{ $user->username }}</h2>
<div class="chat-container">
    @foreach($messages as $msg)
    <div class="message-wrapper {{ $msg->from_admin ? 'admin' : 'user' }}">
        <div class="message-bubble">
            <strong>{{ $msg->from_admin ? 'Admin' : $user->username }} :</strong>
            <p>{{ $msg->content }}</p>
            <span class="timestamp">{{ $msg->created_at->format('H:i') }}</span>
        </div>
    </div>
    @endforeach
</div>

<form action="{{ route('admin.messages.reply') }}" method="POST" style="margin-top: 1rem;">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <textarea name="content" rows="3" style="width:100%;" placeholder="Votre réponse..."></textarea>
    <button type="submit">Envoyer</button>
</form>
<style>
    .chat-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 600px;
        margin: 20px auto;
        font-family: sans-serif;
        background-color: #2b5e91ff;
        padding: 20px;
    }

    .message-wrapper {
        display: flex;
    }

    .message-wrapper.user {
        justify-content: flex-start;
    }

    .message-wrapper.admin {
        justify-content: flex-end;
    }

    .message-bubble {
        background-color: #f1f1f1;
        border-radius: 12px;
        padding: 10px 15px;
        width: 90%;
        position: relative;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .message-wrapper.admin .message-bubble {
        background-color: #519ccaff;
        color: white;
    }

    .message-bubble strong {
        display: block;
        margin-bottom: 4px;
        font-size: 0.9em;
        opacity: 0.85;
    }

    .timestamp {
        display: block;
        text-align: right;
        font-size: 0.75em;
        margin-top: 5px;
        opacity: 0.6;
    }
</style>