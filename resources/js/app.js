// import './bootstrap';


// // DOM elements
// const messagesList = document.getElementById('messages');
// const form = document.getElementById('chatForm');
// const messageInput = document.getElementById('message');

// const userId = window.Laravel.userId;
// const receiverId = window.Laravel.receiverId;
// const sendUrl = window.Laravel.sendMessageUrl;

// // helper to append messages
// function appendMessage(senderName, text, which) {
//     const li = document.createElement('li');
//     li.className = which === 'me' ? 'me' : 'them';
//     li.innerHTML = `<strong>${senderName}:</strong> ${escapeHtml(text)} <br><small>${new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'})}</small>`;
//     messagesList.appendChild(li);
//     messagesList.scrollTop = messagesList.scrollHeight;
// }

// function escapeHtml(unsafe) {
//     return unsafe.replace(/[&<"'>]/g, function(m) {
//         return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m];
//     });
// }

// // Listen on private channel for this authenticated user
// if (window.Echo) {
//     window.Echo.private(`chat.${userId}`)
//         .listen('MessageSent', (e) => {
//             // If event is for me, show it (receiver)
//             // e contains: sender_id, sender_name, message, created_at
//             appendMessage(e.sender_name, e.message, 'them');
//         });
// }

// // Form submit - use axios POST (ensures real POST)
// form.addEventListener('submit', async function(e) {
//     e.preventDefault();
//     const text = messageInput.value.trim();
//     if (!text) return;

//     // show immediately for sender
//     appendMessage('You', text, 'me');

//     try {
//         await window.axios.post(sendUrl, {
//             message: text,
//             receiver_id: receiverId
//         });
//         messageInput.value = '';
//     } catch (err) {
//         console.error(err);
//         alert('Message send failed. Check console for details.');
//     }
// });
import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('chatForm');
  if (!form) return;

  const box   = document.getElementById('messages');
  const input = document.getElementById('message');

  const cfg = window.Laravel || {};
  const userId = cfg.userId;
  const receiverId = cfg.receiverId;
  const sendUrl = cfg.sendMessageUrl;

  const timeStr = (t) => new Date(t || Date.now()).toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'});

  function appendMessage(name, text, who, at) {
    const div = document.createElement('div');
    div.className = 'message ' + (who === 'me' ? 'me' : 'them');
    div.innerHTML = `<strong>${name}:</strong> ${text} <small>${timeStr(at)}</small>`;
    box.appendChild(div);
    box.scrollTop = box.scrollHeight;
  }

  // Submit -> prevent default (black screen ka fix)
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const text = (input.value || '').trim();
    if (!text) return;

    // show immediately for sender
    appendMessage('You', text, 'me');

    try {
      await window.axios.post(sendUrl, { message: text, receiver_id: receiverId });
      input.value = '';
    } catch (err) {
      console.error(err);
      alert('Message send failed. Check console.');
    }
  });

  // Echo listener (NOTE: listen on ".MessageSent" because broadcastAs() use hua hai)
  if (window.Echo && userId) {
    window.Echo.private(`chat.${userId}`)
      .listen('.MessageSent', (e) => {
        // e: {sender_id, sender_name, message, created_at}
        appendMessage(e.sender_name, e.message, 'them', e.created_at);
      });
  }
});

