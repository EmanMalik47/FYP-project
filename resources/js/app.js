import './bootstrap';


// DOM elements
const messagesList = document.getElementById('messages');
const form = document.getElementById('chatForm');
const messageInput = document.getElementById('message');

const userId = window.Laravel.userId;
const receiverId = window.Laravel.receiverId;
const sendUrl = window.Laravel.sendMessageUrl;

// helper to append messages
function appendMessage(senderName, text, which) {
    const li = document.createElement('li');
    li.className = which === 'me' ? 'me' : 'them';
    li.innerHTML = `<strong>${senderName}:</strong> ${escapeHtml(text)} <br><small>${new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'})}</small>`;
    messagesList.appendChild(li);
    messagesList.scrollTop = messagesList.scrollHeight;
}

function escapeHtml(unsafe) {
    return unsafe.replace(/[&<"'>]/g, function(m) {
        return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m];
    });
}

// Listen on private channel for this authenticated user
if (window.Echo) {
    window.Echo.private(`chat.${userId}`)
        .listen('MessageSent', (e) => {
            // If event is for me, show it (receiver)
            // e contains: sender_id, sender_name, message, created_at
            appendMessage(e.sender_name, e.message, 'them');
        });
}

// Form submit - use axios POST (ensures real POST)
form.addEventListener('submit', async function(e) {
    e.preventDefault();
    const text = messageInput.value.trim();
    if (!text) return;

    // show immediately for sender
    appendMessage('You', text, 'me');

    try {
        await window.axios.post(sendUrl, {
            message: text,
            receiver_id: receiverId
        });
        messageInput.value = '';
    } catch (err) {
        console.error(err);
        alert('Message send failed. Check console for details.');
    }
});
